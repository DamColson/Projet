<?php

session_start();

//Vérifie si chaque model a déjà été inclut une fois, si c'est le cas il ne l'inclut pas de nouveau, dans le cas contraire, il l'inclut.

require_once 'Models/modelDb.php';
require_once 'Models/usersModel.php';
require_once 'Models/SyndicateDetailsModel.php';
require_once 'Models/AdminModel.php';
require_once 'Models/ArmorsModel.php';
require_once 'Models/SyndicateModel.php';

//Inclusion des tableaux sur lesquels boucler.

include 'assets/php/arrays.php';

//Liste des liens nécessaires

$linkIndex = 'index.php';
$linkAccount = 'View/UsersInfosView.php';
$linkFormView = 'View/formView.php';
$disconnect = 'Controllers/disconnect.php';
$searchView = 'View/searchView.php';
$legal = 'View/legal.php';
$adminLink = 'View/adminView.php';
$errorLink = 'View/error.php';

//Strip tags sur chaque élément du POST pour eviter les injections

$_POST = array_map('strip_tags', $_POST);

//Instanciation de classe utilisateurs, syndicateDetail et admin.

$user = new Users();
$syndicateDetail = new SyndicateDetails();
$admin = new Admin();

//Extraction de $_POST.

extract($_POST);

//Hydratation de $user avec le password entré dans le formulaire de connection, 
//puis récupération de l'id stockée dans la bdd et hydratation de l'id ( directement dans laméthode )..

$user->warfriendsPseudo = $warfriendsPseudo;
$user->getUserIds();
$getInfos = $user->getInfos();

//Hydratation de $syndicateDetail avec l'attribut id de $user, 
//puis récupération des rangs de ses syndicats ( s'ils existent ) via lamethode getSyndicateInfos.

$syndicateDetail->id_wfd_UsersInfos = $user->id;
$getSyndicateInfos = $syndicateDetail->getSyndicateInfos();

//Hydratation de $admin avec le pseudo entré dans le formulaire de connection, 
//puis récupération des infos en fonction de ce pseudo.

$admin->pseudo = $warfriendsPseudo;
$getAdminPass = $admin->getInfos();

// Ma clé privée

$secret = "6LeEprMUAAAAAOLbq9E9d5aI60mvPUPy4dMHN_Ei";

// Paramètre renvoyé par le recaptcha

$response = $_POST['g-recaptcha-response'];

// On récupère l'IP de l'utilisateur

$remoteip = $_SERVER['REMOTE_ADDR'];

$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip;

$decode = json_decode(file_get_contents($api_url), true);

//Vérification de la validité du password entrée dans le formulaire de connection.
if (password_verify($warfriendsPassword, $getInfos[0]['password'])):
    if ($decode['success'] == true):
        foreach ($getInfos as $key => $value):
            foreach ($value as $secondKey => $secondValue):
                $_SESSION[$secondKey] = $secondValue; //Insertion des données concernant le membre de la bdd dans la superglobale $_SESSION
            endforeach;
        endforeach;

        foreach ($getSyndicateInfos as $key => $value):

            $_SESSION[$syndicateRankName[$key]] = $getSyndicateInfos[$key]['rank']; //Insertion des rangs de chaque syndicats pour ce membre dans $_SESSION

        endforeach;

        //Si des données admins existent pour le membre connecté,insertion du pseudo du membre dans la superglobale $_SESSION sous la clé adminPseudo. 
        //Cette dernière lui débloquera l'accès à la console admin.

        if (!empty($getAdminPass)):
            foreach ($getAdminPass as $key => $value):
                $_SESSION['adminPseudo'] = $value['pseudo'];
            endforeach;
        endif;
    endif;
endif;
