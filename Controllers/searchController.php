<?php
session_start;

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateModel.php';

//Liste des liens nécessaires.

$linkIndex = '../index.php';
$linkUpdate = 'updateView.php';
$linkFormView = 'formView.php';
$seeUsersInfos = 'UsersInfosView.php';
$modifyAccount = 'updateView.php';
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

//Instanciation de classe

$user = new Users();

//Hydratation de l'attribut search avec le contenu de la recherche.

$user->search = $_GET['searchBar'];

//Pagination : nombre de resultat par page, numéro de la page actuelle.

$warfriendsPerPage=6;
$page = (!empty($_GET['page'])) ? $_GET['page'] : 1;

//Appel de lam méthode research qui cherchera dans la base de données en fonction de la recherche choisie.

$search = $user->research();

//Instanciation de classe.

$armor = new Armors();

//Génération de la vidéo background, si la personne est connectée, on affichera sa frame, si personne n'est connecté, une frame aléatoire sera choisie.

if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

//Nombre d'éléments correspondant à la recherche et nombre de pages.( nombre total d'éléments que divise le nombre d'éléments par page, resultat arrondit au supérieur.

$searchedWarfriendsQuantity = sizeOf($user->researchCount());
$pageQuantity = ceil($searchedWarfriendsQuantity/$warfriendsPerPage);

