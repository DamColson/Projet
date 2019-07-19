<?php
session_start();
require '../Models/modelDb.php';
require '../Models/ArmorsModel.php';
require '../Models/usersModel.php';

$linkIndex = '../index.php';
$linkUpdate = 'updateView.php';
$linkFormView = 'formView.php';
$seeUsersInfos = 'UsersInfosView.php';
$modifyAccount = 'updateView.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView = 'formView.php';
$disconnect = '../Controllers/disconnect.php';

include '../assets/php/arrays.php';

$_POST = array_map('strip_tags',$_POST);
$armors = implode('|', $armor);
$primeArmors = implode('|', $primeArmor);

include '../assets/php/regex.php';

setlocale (LC_TIME, 'fr_FR.UTF8','fra');

function dateFr($date){
return ucfirst(strftime('%d/%m/%Y',strtotime($date)));
}

$data;

$user = new Users();
$armor = new Armors();
if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();
 
extract($_SESSION);


$user->id = (int)$id;
$user->warframePseudo=$warframePseudo;
$user->warfriendsPseudo=$warfriendsPseudo;
$user->mail=$mail;
$user->tagDiscord=$tagDiscord;

$getInfos = $user->getInfos();

if($_POST):
    if (!empty($_POST['oldPassword']) && $_POST['oldPassword'] != $_SESSION['password']):
        $errorInModif['oldPassword'] = 0;
        $data = 'failure';
    endif;
    if (!empty($_POST['newPassword']) && !preg_match($regexPassword, $_POST['newPassword'])):
        $errorInModif['newPassword'] = 0;
        $data = 'failure';
    endif;
    if (!empty($_POST['confirmNewPassword']) && $_POST['confirmNewPassword'] != $_POST['newPassword']):
        $errorInModif['confirmNewPassword'] = 0;
        $data = 'failure';
    endif;
    if($errorInModif == $modifValidation && !empty($_POST['submitModifButton'])):
        $user->password = $_POST['newPassword'];
        $user->updateUsersPassword();
        $_SESSION['password'] = $user->password;
    endif;
    
    if(isset($_POST['submitDeleteButton'])):
        if($_POST['deletePassword'] == $_SESSION['password']):
            $user->deleteUsers();
            session_destroy();
            header('Location:../index.php');
        endif;
    endif;
   
endif;
    
echo $data;
