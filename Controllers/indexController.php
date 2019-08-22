<?php

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once 'Models/modelDb.php';
require_once 'Models/usersModel.php';
require_once 'Models/SyndicateDetailsModel.php';
require_once 'Models/SyndicateModel.php';
require_once 'Models/ArmorsModel.php';

//Instanciation de classe.

$syndicate = new Syndicate();

//Appel de méthode pour récupérer les derniers inscrits.

$lastTwelve = $user->getLastTwelve();
$lastSixOffsetSix = $user->getLastSixOffsetSix();

//Instanctiation de classe.

$armor = new Armors();

//Génération de la vidéo background, si la personne est connectée, on affichera sa frame, si personne n'est connecté, une frame aléatoire sera choisie.

if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

?>