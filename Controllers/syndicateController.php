<?php
session_start();

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

//Page accessible uniquement pour les admins, si la personne connectée n'est pas un admin, elle sera redirigée vers une page d'erreur.

if(!isset($_SESSION['adminPseudo'])):
    header('Location:error.php');
endif;

//Liste des liens nécessaires.

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView ='formView.php';
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

$newSyndicate = new Syndicate();

//Extraction de GET.

extract($_GET);

//Si le select du formulaire n'est pas vide, l'attribut id de $newSyndicate est hydraté, la méthode getSyndicateInfosById est appelée et les données de SESSION sont mises à jours.

if(!empty($syndicateSearchSelect)):
    
   $newSyndicate->id = $syndicateSearchSelect;
   
   $getSyndicateInfo = $newSyndicate->getSyndicateInfosById();
   

   $_SESSION['idSearchedSyndicate'] = $newSyndicate->id;
   $_SESSION['nameSearchedSyndicate'] = $newSyndicate->name;
   $_SESSION['imageSearchedSyndicate'] = $newSyndicate->image;
   
//Pareil que précédement mais pour l'input, non pas pour le select. 

elseif(!empty($syndicateSearchInput)):
    $newSyndicate->name = $syndicateSearchInput;
   
   $getSyndicateInfo = $newSyndicate->getSyndicateInfosByName();
   

   $_SESSION['idSearchedSyndicate'] = $newSyndicate->id;
   $_SESSION['nameSearchedSyndicate'] = $newSyndicate->name;
   $_SESSION['imageSearchedSyndicate'] = $newSyndicate->image;
   
endif;

//Extraction de POST et SESSION

extract($_POST);
extract($_SESSION);

//Update des données du syndicat recherché.

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

//Ajout d'un nouveau syndicat (nom et image ) de la bdd.

if(isset($createNewSyndicateName) && isset($createNewSyndicateImage)):
    $newSyndicate->name = $createNewSyndicateName;
    $newSyndicate->image = $createNewSyndicateImage;
    $newSyndicate->addSyndicates();
    header('Location:syndicateManagment.php?syndicateSearch=' . $idSearchedSyndicate);
endif;

//Délétion d'un syndicat de la bdd.

if(isset($deleteSyndicate)):
    
    if($nameSearchedSyndicate == $deleteSyndicate):
        $newSyndicate->id = $_SESSION['idSearchedSyndicate'];
        $newSyndicate->deleteSyndicate();
        header('Location:syndicateManagment.php');
    endif;
endif;
