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

$newFrame = new Armors();

//Extraction du get.

extract($_GET);

//Si le select du formulaire n'est pas vide, l'attribut id de $newFrame est hydraté, 
//la méthode getArmorsName est appelée (récupère le nom de la frame en fonction de son id, 
//et les données de SESSION sont mises à jours/

if (!empty($frameSearchSelect)):

    $newFrame->id = $frameSearchSelect;
    $newFrame->getArmorsName();
    $_SESSION['idSearchedFrame'] = $newFrame->id;
    $_SESSION['nameSearchedFrame'] = $newFrame->name;

//Pareil que précédement mais pour l'input, non pas pour le select.
    
elseif (!empty($frameSearchInput)):
    $newFrame->name = $frameSearchInput;
    $newFrame->getFrameIds();
    $_SESSION['idSearchedFrame'] = $newFrame->id;
    $_SESSION['nameSearchedFrame'] = $newFrame->name;

endif;

//Extraction du POST.

extract($_POST);

//Update du nom de la frame dans la bdd si l'input newFrameName est set.

if (isset($newFrameName)):
    $newFrame->name = $newFrameName;
    $newFrame->updateFrame();

endif;

//Si l'input createNewFrame est set, ajoutera le contenu de l'input comme nouvelle frame dans la bdd.

if (isset($createNewFrame)):
    $newFrame->name = $createNewFrame;
    $newFrame->addArmor();
endif;

//Si l'input deleteFrame est set et si le nom de frame renseignée est entré dans l'input nameSearchedFrame, 
//alors la frame en question sera supprimée de la bdd.

if (isset($deleteFrame)):

    if ($_SESSION['nameSearchedFrame'] == $deleteFrame):

        $newFrame->id = $_SESSION['idSearchedFrame'];
        $newFrame->deleteFrame();
    endif;
endif;
