<?php
require '../Models/modelDb.php';
require '../Models/ArmorsModel.php';
require '../Models/usersModel.php';
require '../Models/AdminModel.php';

session_start();
$linkIndex = '../index.php';
$disconnect = '../Controllers/disconnect.php';
$adminLink = 'adminView.php';
$errorLink = 'error.php';
$frameLink = 'frameManagment.php';
$syndicateLink = 'syndicateManagment.php';
$memberLink = 'memberManagment.php';

$admin = new Admin();
$user = new Users();
$armor = new Armors();
if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

extract($_POST);

if($_POST):
    $admin->pseudo = $adminPseudo;
    $admin->password = password_hash($adminPassword,PASSWORD_BCRYPT);
    $admin->addAdmins();
endif;