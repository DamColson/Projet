<?php
require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView ='formView.php';
$disconnect = '../Controllers/disconnect.php';
$searchView = 'searchView.php';
$legal = 'legal.php';
$adminLink = 'adminView.php';
$errorLink = 'error.php';

$_GET = array_map('strip_tags', $_GET);
$_POST = array_map('strip_tags', $_POST);

include '../assets/php/arrays.php';

$newFrame = new Armors();

if(!empty($_GET)):
   $newFrame->name = $_GET['frameSearch'];
   $newFrame->getFrameIds();
   
endif;

if(!empty($_POST)):
    $newFrame->name = $_POST['newFrameName'];
    $newFrame->updateFrame();
endif;
