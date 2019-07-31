<?php
session_start();
require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

if(!isset($_SESSION['adminPseudo'])):
    header('Location:error.php');
endif;

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

$newSyndicate = new Syndicate();

extract($_GET);

if(!empty($syndicateSearchSelect)):
    
   $newSyndicate->id = $syndicateSearchSelect;
   
   $getSyndicateInfo = $newSyndicate->getSyndicateInfosById();
   

   $_SESSION['idSearchedSyndicate'] = $newSyndicate->id;
   $_SESSION['nameSearchedSyndicate'] = $newSyndicate->name;
   $_SESSION['imageSearchedSyndicate'] = $newSyndicate->image;
   
   
elseif(!empty($syndicateSearchInput)):
    $newSyndicate->name = $syndicateSearchInput;
   
   $getSyndicateInfo = $newSyndicate->getSyndicateInfosByName();
   

   $_SESSION['idSearchedSyndicate'] = $newSyndicate->id;
   $_SESSION['nameSearchedSyndicate'] = $newSyndicate->name;
   $_SESSION['imageSearchedSyndicate'] = $newSyndicate->image;
   
endif;


extract($_POST);
extract($_SESSION);

if(isset($newSyndicateName) && !empty($newSyndicateName)):
    $newSyndicate->id = $idSearchedSyndicate;
    $newSyndicate->name = $newSyndicateName;
    $newSyndicate->updateSyndicatesName();
    header('Location:syndicateManagment.php?syndicateSearch=' . $idSearchedSyndicate);
endif;

if(isset($newSyndicateImage) && !empty($newSyndicateImage)):
    $newSyndicate->id = $idSearchedSyndicate;
    $newSyndicate->image = $newSyndicateImage;
    $newSyndicate->updateSyndicatesImage();
    header('Location:syndicateManagment.php?syndicateSearch=' . $idSearchedSyndicate);
endif;



if(isset($createNewSyndicateName) && isset($createNewSyndicateImage)):
    $newSyndicate->name = $createNewSyndicateName;
    $newSyndicate->image = $createNewSyndicateImage;
    $newSyndicate->addSyndicates();
    header('Location:syndicateManagment.php?syndicateSearch=' . $idSearchedSyndicate);
endif;


if(isset($deleteSyndicate)):
    
    if($nameSearchedSyndicate == $deleteSyndicate):
        $newSyndicate->id = $_SESSION['idSearchedSyndicate'];
        $newSyndicate->deleteSyndicate();
        header('Location:syndicateManagment.php');
    endif;
endif;
