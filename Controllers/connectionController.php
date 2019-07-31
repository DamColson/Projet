<?php

require_once 'Models/modelDb.php';
require_once 'Models/usersModel.php';
require_once 'Models/SyndicateDetailsModel.php';
require_once 'Models/AdminModel.php';
require_once 'Models/ArmorsModel.php';
require_once 'Models/SyndicateModel.php';


include 'assets/php/arrays.php';

$linkIndex = 'index.php';
$linkAccount = 'View/UsersInfosView.php';
$linkFormView ='View/formView.php';
$disconnect = 'Controllers/disconnect.php';
$searchView = 'View/searchView.php';
$legal = 'View/legal.php';
$adminLink = 'View/adminView.php';
$errorLink = 'View/error.php';

$_POST = array_map('strip_tags', $_POST);

$user = new Users();
$syndicateDetail = new SyndicateDetails();
$admin = new Admin();

$user->warfriendsPseudo = $_POST['warfriendsPseudo'];
$user->getUserIds();
$getInfos = $user->getInfos();

$syndicateDetail->id_wfd_UsersInfos = $user->id;
$getSyndicateInfos = $syndicateDetail->getSyndicateInfos();

$admin->pseudo = $_POST['warfriendsPseudo'];
$getAdminPass = $admin->getInfos();

session_start();

if (password_verify($_POST['warfriendsPassword'],$getInfos[0]['password'])):

    foreach ($getInfos as $key => $value):
        foreach ($value as $secondKey => $secondValue):
            $_SESSION[$secondKey] = $secondValue;
        endforeach;
    endforeach;
    
    foreach ($getSyndicateInfos as $key=>$value):
        
            $_SESSION[$syndicateRankName[$key]] = $getSyndicateInfos[$key]['rank'];
        
    endforeach;
    
    
   if(!empty($getAdminPass)):
       foreach($getAdminPass as $key=>$value):
       $_SESSION['adminPseudo'] = $value['pseudo'];
       endforeach;
   endif;
    
endif;
