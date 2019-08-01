<?php
session_start();

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/SyndicateDetailsModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

//Liste des liens nécessaires.

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView ='formView.php';
$disconnect = '../Controllers/disconnect.php';
$searchView = 'searchView.php';
$legal = 'legal.php';
$adminLink = 'adminView.php';
$errorLink = 'error.php';

//Inclusion des tableaux sur lesquels boucler.

include '../assets/php/arrays.php';

//Strip tags sur chaque élément du POST pour eviter les injections.

$_POST = array_map('strip_tags',$_POST);

//Inclusion des regex

include '../assets/php/regex.php';

//Fonction permettant de formater une date en date française.

setlocale (LC_TIME, 'fr_FR.UTF8','fra');

function dateFr($date){
return strftime('%d/%m/%Y',strtotime($date));
}

//Instanciation de la classe Armors.

$armor = new Armors();

//Génération de la vidéo background, si la personne est connectée, on affichera sa frame, si personne n'est connecté, une frame aléatoire sera choisie.

if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

//Variable utilisée pour ajax, ajax va récupérer sa valeur lorsque l'on fera un echo $data.

$data;

//Extraction du post

extract($_POST);

//Si le post n'est pas vide, alors une série de vérification regex sera lancée

if(!empty($_POST)):
    
    //instanciation de la classe Users.
    
    $user = new Users();
    
    //Variables et calculs permettant de vérifier la majorité d'un utilisateur

    $actualdate =  new DateTime();
    $birthdate = new DateTime($_POST['birthday']);
    $age = floor(($actualdate->getTimestamp() - $birthdate->getTimestamp()));
    $ageEighteen = (3600*24)*((18*365)+4);
    
    //Hydratation des pseudo warframe et warfriends qui ne nécessite pas de vérifications
    
    $user->warframePseudo = $warframePseudo;
    $user->warfriendsPseudo = $pseudo;
    
    //Appel de la méthode checkPseudoPrésence qui vérifiera si le pseudo entré dans le formulaire est déjà présent ou pas dans la bdd, puis s'il est déjà présent, renvoie de failure pour ajax qui affichera une erreur.
      
    $pseudoPresence = $user->checkPseudoPresence();
  
    if($pseudoPresence[0]['pseudoPresence'] == 1):
        $data = 'failure';
    endif;
    
    //Condition qui vérifiera la validité de la date de naissance, format et majorité.    
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($birthday) && !preg_match($regexBirthday,dateFR($birthday))):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    elseif(!empty($birthday) && $age<$ageEighteen):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    //Si le formulaire est envoyé, alors l'attribut birthday de $user est hydrater avec le contenu du post.
    elseif(!empty($submitFormButton)):
        $user->birthday = $birthday;
    endif;
    
    //Condition qui vérifiera la validité du tag discord.    
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($discord) && !preg_match($regexDiscord,$discord)):
        $errorInForm['discord'] = 0;
        $data = 'failure';
    //Si leformulaire est envoyé, hydratation de l'attribut tagDiscord avec le contenu du post puis vérification de la présence ou non du tag entré.
    elseif(!empty($_POST['submitFormButton'])):
        $user->tagDiscord = $discord;
        $discordPresence = $user->checkDiscordPresence();
    //Si le post pour discord n'est pas vide et que la regex est validée, hydratation de tagDiscord puis vérification de présence. 
    elseif(!empty($discord) && preg_match($regexDiscord,$discord)):
        $user->tagDiscord = $discord;
        $discordPresence = $user->checkDiscordPresence();
        //Si déjà présent => failure pour ajax et erreur dans le tableau d'erreur.
        if($discordPresence[0]['discordPresence'] == 1):
            $errorInForm['discord'] = 0;
            $data = 'failure';
        endif;
    endif; 
        
    //Condition qui vérifiera la validité du mail.
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($mail) && !preg_match($regexMail,$mail)):
       $errorInForm['mail'] = 0;
       $data = 'failure';
    //Si leformulaire est envoyé, hydratation de l'attribut mail avec le contenu du post puis vérification de la présence ou non du mail entré.
    elseif(!empty($submitFormButton)):
        $user->mail = $mail;
        $mailPresence = $user->checkMailPresence();
    //Si le post pour mail n'est pas vide et que la regex est validée, hydratation de mail puis vérification de présence.
    elseif(!empty($mail) && preg_match($regexMail,$mail)):
        $user->mail = $mail;
        $mailPresence = $user->checkMailPresence();
        //Si déjà présent => failure pour ajax et erreur dans le tableau d'erreur.
        if($mailPresence[0]['mailPresence'] == 1):
            $errorInForm['mail'] = 0;
            $data = 'failure';
        endif;
    endif;
    
    
    //Condition qui vérifiera la validité du mot de passe.
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($password) && !preg_match($regexPassword,$password)):
       $errorInForm['password'] = 0;
       $data = 'failure';
    //Si leformulaire est envoyé, hydratation de l'attribut password avec le contenu crypté du post.   
    elseif(!empty($submitFormButton)):
        $user->password = password_hash($password,PASSWORD_BCRYPT);   
    endif;
    
    //Condition qui vérifiera que la confirmation du mot de passe correspond bien au mot de passe.
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($confirmPassword) && $confirmPassword != $password):
        $errorInForm['confirmPassword'] = 0;
        $data = 'failure';        
    endif;
    
    //Condition qui vérifiera la validité de la frame favorite du joueur.
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($_POST['favArmor']) && !preg_match($regexArmors,$_POST['favArmor'])):
        $errorInForm['favArmor'] = 0; 
        $data = 'failure';
    //Si le formulaire est envoyé, hydratation de l'attribut id_wfdArmors avec le contenu du post. 
    elseif(!empty($_POST['submitFormButton'])): 
        $user->id_wfd_Armors = $favArmor;
    endif;
    
    //Condition qui vérifiera la volonté ou non du joueur d'afficher ses informations de contact.
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.  
    if(!empty($showDiscord) && !preg_match($regexShow,$showDiscord)):
        $errorInForm['showDiscord'] = 0; 
        $data = 'failure';
    //Si le formulaire est envoyé, hydratation de l'attribut showDiscord avec le contenu du post. 
    elseif(!empty($submitFormButton)): 
        $user->showDiscord = $showDiscord;
    endif;
    
    //Condition qui vérifiera la volonté ou non du joueur d'afficher ses informations de contact.
    //En cas d'erreur une erreur est ajouté au tableau recensant les erreurs et failure sera envoyé a ajax.
    if(!empty($showMail) && !preg_match($regexShow,$showMail)):
        $errorInForm['showMail'] = 0; 
        $data = 'failure';
    //Si le formulaire est envoyé, hydratation de l'attribut showMail avec le contenu du post.
    elseif(!empty($submitFormButton)): 
        $user->showMail = $showMail;
    endif;
    
    //Si il n'y a aucune erreur et que ni lepseudo warfriends, nilemail ni le tag discord ne se trouve dans la bdd,alors, l'utilisateur et ses infos sont ajoutés à la bdd et ce dernier pourra se connecter.
    
    if($errorInForm == $formValidation && $pseudoPresence[0]['pseudoPresence'] == 0 && $discordPresence[0]['discordPresence'] == 0 && $mailPresence[0]['mailPresence'] == 0):
        $user->addUsers();
    endif;
    
    //Envoie de la valeur de $data à ajax.
    
    echo $data;
    
    
endif;

?>