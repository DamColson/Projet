<?php
session_start();

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';
require_once '../Models/AdminModel.php';

//Liste des liens nécessaires.

$linkIndex = '../index.php';
$linkUpdate = 'updateView.php';
$linkFormView = 'formView.php';
$seeUsersInfos = 'UsersInfosView.php';
$modifyAccount = 'updateView.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView = 'formView.php';
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
return ucfirst(strftime('%d/%m/%Y',strtotime($date)));
}

//Variable utilisée pour ajax, ajax va récupérer sa valeur lorsque l'on fera un echo $data.

$data;

//Instanciation de trois nouvelles classes, une utilisateur une pour les frames et une pour l'admin.

$user = new Users();
$armor = new Armors();
$admin = new Admin();

//Génération de la vidéo background, si la personne est connectée, on affichera sa frame, si personne n'est connecté, une frame aléatoire sera choisie.

if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

//Extraction de $_SESSION pour gain de temps.

extract($_SESSION);

//Hydratation de $user avec le contenu de la session.

$user->id = (int)$id;
$user->warframePseudo=$warframePseudo;
$user->warfriendsPseudo=$warfriendsPseudo;
$user->mail=$mail;
$user->tagDiscord=$tagDiscord;

//Appel de la méthode getInfos qui va récuperer toutes les informations d'un utilisateur en fonction de son pseudo Warfriends ( via $user->warfriendsPseudo ).

$getInfos = $user->getInfos();

//Hydratation de $admin

$admin->pseudo = $user->warfriendsPseudo;

//Extraction de $_POST.

extract($_POST);

//Formulaire de modification de password, si le post n'est pas vide, alors il va vérifier que le pass actuel est le bon et le modifier sous reserve que l'utilisateur entre un password valide et le confirme.

if(!empty($_POST)):
    if (!empty($oldPassword) && !password_verify($oldPassword, $password)):
        $errorInModif['oldPassword'] = 0; //Tableau des erreurs, si le password_verify n'est pas bon, une erreur est ajoutée au tableau d'erreur.
        $data = 'failure';// Valeur récupérée par ajax en cas d'erreur
    endif;
    if (!empty($newPassword) && !preg_match($regexPassword, $newPassword)):
        $errorInModif['newPassword'] = 0;
        $data = 'failure';
    endif;
    if (!empty($confirmNewPassword) && $confirmNewPassword != $newPassword):
        $errorInModif['confirmNewPassword'] = 0;
        $data = 'failure';
    endif;
    if($errorInModif == $modifValidation && !empty($submitModifButton)): //Si il n'y a pas d'erreur et que le formulaire a été envoyé.
        $user->password = password_hash($newPassword,PASSWORD_BCRYPT);//On hydrate le password de l'utilisateur avec une version hashée du password entrée dansle formulaire ( hash BCRYPT)
        $user->updateUsersPassword();//Mise à jour du password dans la base de donnée
        $password = $user->password;//Mise à jour des informations de session
        if(isset($adminPseudo)):
            $admin->password = password_hash($newPassword,PASSWORD_BCRYPT);
            $admin->updateAdminPassword();
            
        endif;
    endif;
    //Formulaire de suppression de compte
    if(isset($submitDeleteButton))://Si le formulaire de suppression a été envoyé.
        if(password_verify($deletePassword,$password))://Vérification du mot de passe.
            $user->deleteUsers();//En cas de succès,appel d'une méthode qui supprimera les données liées à cet utilisateur dans toutes les tables de la bdd
            session_destroy();//Fermeture de session
            header('Location:../index.php');//Redirection vers la page d'accueil.
        endif;
    endif;
   
endif;
    //Affichage de $data que va récupérer ajax
echo $data;
