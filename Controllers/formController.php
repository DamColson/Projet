<?php
require '../Models/modelDb.php';
require '../Models/usersModel.php';

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView ='formView.php';
$disconnect = '../Controllers/disconnect.php';

include '../assets/php/arrays.php';

$_POST = array_map('strip_tags',$_POST);
$armors = implode('|', $armor);
$primeArmors = implode('|', $primeArmor);

include '../assets/php/regex.php';

setlocale (LC_TIME, 'fr_FR.UTF8','fra');

function dateFr($date){
return strftime('%d/%m/%Y',strtotime($date));
}



$data;



if($_POST):
    
    $user = new Users();
    
    $actualdate =  new DateTime();
    $birthdate = new DateTime($_POST['birthday']);
    $age = floor(($actualdate->getTimestamp() - $birthdate->getTimestamp()));
    $ageEighteen = (3600*24)*((18*365)+4);
    
    $user->warframePseudo = $_POST['warframePseudo'];
    $user->warfriendsPseudo = $_POST['pseudo'];

    if(!empty($_POST['birthday']) && !preg_match($regexBirthday,dateFR($_POST['birthday']))):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['birthday']) && $age<$ageEighteen):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->birthday = $_POST['birthday'];
    endif;
    
    
    if(!empty($_POST['discord']) && !preg_match($regexDiscord,$_POST['discord'])):
        $errorInForm['discord'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->tagDiscord = $_POST['discord'];    
    endif; 
    
    if(!empty($_POST['mail']) && !preg_match($regexMail,$_POST['mail'])):
       $errorInForm['mail'] = 0;
       $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->mail = $_POST['mail'];   
    endif;
    
    if(!empty($_POST['password']) && !preg_match($regexPassword,$_POST['password'])):
       $errorInForm['password'] = 0;
       $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->password = $_POST['password'];   
    endif;

    if(!empty($_POST['confirmPassword']) && $_POST['confirmPassword'] != $_POST['password']):
        $errorInForm['confirmPassword'] = 0;
        $data = 'failure';
        
    endif;

    if(!empty($_POST['favArmor']) && !preg_match($regexArmors,$_POST['favArmor'])):
        $errorInForm['favArmor'] = 0; 
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->id_wfd_Armors = $_POST['favArmor'];
    endif;
    
    echo $data;
    
    if($errorInForm == $formValidation):
        $user->addUsers();
        header('Location:../index.php');
    endif;
    

endif;

     


?>