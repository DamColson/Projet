<?php


$warframe = new Armors();
$allFrame = $warframe->getAllFrame();
$frame;

foreach($allFrame as $key=>$value):
     $frame[$value['id']] = $value['name'];
endforeach;


$updateRank = ['Moins de 2','2','3','4','5'];
$syndicateRankName =['meridianRank','arbiterRank','cephalonRank','perrinRank','redVeilRank','lokaRank'];
$errorInForm = ['birthday'=>1,'discord'=>1,'mail'=>1,'password'=>1,'confirmPassword'=>1,'favArmor'=>1,'showDiscord'=>1,'showMail'=>1];
$formValidation =['birthday'=>1,'discord'=>1,'mail'=>1,'password'=>1,'confirmPassword'=>1,'favArmor'=>1,'showDiscord'=>1,'showMail'=>1];

$errorInModif = ['oldPassword'=>1,'newPassword'=>1,'confirmNewPassword'=>1];
$modifValidation = ['oldPassword'=>1,'newPassword'=>1,'confirmNewPassword'=>1];

$errorInUpdateSyndicateRank = ['meridianRank'=>1,'arbiterRank'=>1,'cephalonRank'=>1,'perrinRank'=>1,'redVeilRank'=>1,'lokaRank'=>1];
$updateSyndicateRankValidate = ['meridianRank'=>1,'arbiterRank'=>1,'cephalonRank'=>1,'perrinRank'=>1,'redVeilRank'=>1,'lokaRank'=>1];

$errorInUpdateInfos = ['newDiscord'=>1,'newMail'=>1];
$updateInfosValidation = ['newDiscord'=>1,'newMail'=>1];
?>