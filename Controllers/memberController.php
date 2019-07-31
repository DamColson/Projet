<?php

session_start();
require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

if (!isset($_SESSION['adminPseudo'])):
    header('Location:error.php');
endif;

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView = 'formView.php';
$disconnect = '../Controllers/disconnect.php';
$searchView = 'searchView.php';
$legal = 'legal.php';
$adminLink = 'adminView.php';
$errorLink = 'error.php';



$_GET = array_map('strip_tags', $_GET);
$_POST = array_map('strip_tags', $_POST);

include '../assets/php/arrays.php';

$newUser = new Users();
$newWarframe = new Armors();
extract($_GET);

if (!empty($memberSearchSelect)):
    $newUser->id = $memberSearchSelect;

    $getMemberInfo = $newUser->getInfosById();

    $newWarframe->id = $newUser->id_wfd_Armors;
    $getWarframeName = $newWarframe->getArmorsName();
    $newWarframe->name = $getWarframeName[0]['name'];


    $_SESSION['idSearchedMember'] = $newUser->id;
    $_SESSION['warfriendsSearchedMember'] = $newUser->warfriendsPseudo;
    $_SESSION['warframeSearchedMember'] = $newUser->warframePseudo;
    $_SESSION['birthdaySearchMember'] = $newUser->birthday;
    $_SESSION['mailSearchMember'] = $newUser->mail;
    $_SESSION['discordSearchMember'] = $newUser->tagDiscord;
    $_SESSION['favFrameIdSearchMember'] = $newUser->id_wfd_Armors;
    $_SESSION['favFrameNameSearchMember'] = $newWarframe->name;
    
    
elseif (!empty($memberSearchInput)):
    
    $newUser->warfriendsPseudo = $memberSearchInput;

    $getMemberInfo = $newUser->getInfos();

    $newWarframe->id = $newUser->id_wfd_Armors;
    $getWarframeName = $newWarframe->getArmorsName();
    $newWarframe->name = $getWarframeName[0]['name'];
    
    $_SESSION['idSearchedMember'] = $newUser->id;
    $_SESSION['warfriendsSearchedMember'] = $newUser->warfriendsPseudo;
    $_SESSION['warframeSearchedMember'] = $newUser->warframePseudo;
    $_SESSION['birthdaySearchMember'] = $newUser->birthday;
    $_SESSION['mailSearchMember'] = $newUser->mail;
    $_SESSION['discordSearchMember'] = $newUser->tagDiscord;
    $_SESSION['favFrameIdSearchMember'] = $newUser->id_wfd_Armors;
    $_SESSION['favFrameNameSearchMember'] = $newWarframe->name;
   
endif;


extract($_POST);
extract($_SESSION);



if(isset($deleteMember)):
    
    if($warfriendsSearchedMember == $deleteMember):
        $newUser->id = $_SESSION['idSearchedMember'];
        $newUser->deleteUsers();
        header('Location:memberManagment.php');
    endif;
endif;
