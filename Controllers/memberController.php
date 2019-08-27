<?php

session_start();

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

//Page accessible uniquement pour les admins, si la personne connectée n'est pas un admin, elle sera redirigée vers une page d'erreur.

if (!isset($_SESSION['adminPseudo'])):
    header('Location:error.php');
endif;

//Liste des liens nécessaires.

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView = 'formView.php';
$disconnect = '../Controllers/disconnect.php';
$searchView = 'searchView.php';
$legal = 'legal.php';
$adminLink = 'adminView.php';
$errorLink = 'error.php';

//Strip tags sur chaque élément du POST et du GET pour eviter les injections.

$_GET = array_map('strip_tags', $_GET);
$_POST = array_map('strip_tags', $_POST);

//Inclusion des tableaux sur lesquels boucler.

include '../assets/php/arrays.php';

//Instanciation de classe.

$newUser = new Users();
$newWarframe = new Armors();

//Extraction du GET.

extract($_GET);

//Si le select du formulaire n'est pas vide, l'attribut id de $newUser est hydraté, plusieurs méthodes sont appelées et les données de SESSION sont mises à jours.

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

//Pareil que précédement mais pour l'input, non pas pour le select.
    
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

//Extraction du POST et de SESSION

extract($_POST);
extract($_SESSION);

//Deletion de membre puis redirection.

if(isset($deleteMember)):    
    if($warfriendsSearchedMember == $deleteMember):
        $newUser->id = $_SESSION['idSearchedMember'];
        $newUser->deleteUsers();
        header('Location:memberManagment.php');
    endif;
endif;
