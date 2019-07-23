<?php

require_once 'Models/modelDb.php';
require_once 'Models/usersModel.php';
require_once 'Models/SyndicateDetailsModel.php';
require_once 'Models/SyndicateModel.php';
require_once 'Models/ArmorsModel.php';


$syndicate = new Syndicate();



$lastTwelve = $user->getLastTwelve();

$armor = new Armors();
if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

?>