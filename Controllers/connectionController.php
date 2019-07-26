<?php

require_once 'Models/modelDb.php';
require_once 'Models/usersModel.php';
require_once 'Models/SyndicateDetailsModel.php';

include 'assets/php/arrays.php';

$linkIndex = 'index.php';
$linkAccount = 'View/UsersInfosView.php';
$linkFormView ='View/formView.php';
$disconnect = 'Controllers/disconnect.php';
$searchView = 'View/searchView.php';

$_POST = array_map('strip_tags', $_POST);
$user = new Users();
$syndicateDetail = new SyndicateDetails();
$user->warfriendsPseudo = $_POST['warfriendsPseudo'];
$user->getUserIds();
$getInfos = $user->getInfos();
$syndicateDetail->id_wfd_UsersInfos = $user->id;
$getSyndicateInfos = $syndicateDetail->getSyndicateInfos();

session_start();

if ($_POST['warfriendsPassword'] == $getInfos[0]['password']):

    foreach ($getInfos as $key => $value):
        foreach ($value as $secondKey => $secondValue):
            $_SESSION[$secondKey] = $secondValue;
        endforeach;
    endforeach;
    
    foreach ($getSyndicateInfos as $key=>$value):
        
            $_SESSION[$syndicateRankName[$key]] = $getSyndicateInfos[$key]['rank'];
        
    endforeach;
    

    
endif;

