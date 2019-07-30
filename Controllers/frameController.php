<?php
session_start();
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


$name;

$_GET = array_map('strip_tags', $_GET);
$_POST = array_map('strip_tags', $_POST);

include '../assets/php/arrays.php';

$newFrame = new Armors();
extract($_GET);

if(!empty($_GET)):
   $newFrame->name = $frameSearch;
   $newFrame->getFrameIds();
   $_SESSION['idSearchedFrame'] = $newFrame->id;
   $_SESSION['nameSearchedFrame'] = $newFrame->name;
   
endif;
extract($_POST);

if(isset($newFrameName)):
    $newFrame->name = $newFrameName;
    $newFrame->updateFrame();
    $id = $newFrame->id;
    $name = $newFrame->name;
endif;

    
if(isset($createNewFrame)):
    $newFrame->name = $createNewFrame;
    $newFrame->addArmor();
endif;


if(isset($deleteFrame)):
    
    if($_SESSION['nameSearchedFrame'] == $deleteFrame):
        
        $newFrame->id =$_SESSION['idSearchedFrame'];
       $newFrame->deleteFrame();
    endif;
endif;
