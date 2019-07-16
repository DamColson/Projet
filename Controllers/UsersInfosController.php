<?php

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

foreach ($_SESSION as $key=>$value):
    $user->$key = $value;
endforeach;

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
endif;
    
echo $data;
