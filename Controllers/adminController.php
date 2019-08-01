<?php
session_start();

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/AdminModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

//Si la personne qui tente d'atteindre cette page admin n'est pas admin, il sera redirigé vers une page d'erreur
if(!isset($_SESSION['adminPseudo'])):
    header('Location:error.php');
endif;

//Strip tags sur chaque élément du POST pour eviter les injections.

$_POST = array_map('strip_tags',$_POST);

//Liste des liens nécessaires.

$linkIndex = '../index.php';
$disconnect = '../Controllers/disconnect.php';
$adminLink = 'adminView.php';
$errorLink = 'error.php';
$frameLink = 'frameManagment.php';
$syndicateLink = 'syndicateManagment.php';
$memberLink = 'memberManagment.php';

//Instanciation de class admin, user et armor.

$admin = new Admin();
$user = new Users();
$armor = new Armors();

//Génération de la vidéo background, si la personne est connectée, on affichera sa frame, si personne n'est connecté, une frame aléatoire sera choisie.

if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();