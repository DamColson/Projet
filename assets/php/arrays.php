<?php

//instanciation d'un objet, puis appel d'une méthode qui renverra tout les noms et id des frames.

$warframe = new Armors();
$allFrames = $warframe->getAllFrame();

//tableau associatif vide dans lequel sera stocké les noms des frames liés à leur id.

$frame;

foreach($allFrames as $key=>$value):
     $frame[$value['id']] = $value['name'];
endforeach;

//instanciation d'un objet puis appel d'une méthode qui renverra tout les noms et id des syndicats.

$getSyndicate = new Syndicate();
$allSyndicates = $getSyndicate->getAllSyndicates();

//tableau associatif vide dans lequel sera stockée les noms des syndicats liés à leur id.

$syndicateArray;

foreach($allSyndicates as $key=>$value):
    $syndicateArray[$value['id']] = $value['name'];
endforeach;

//instanciation d'un objet puis appel d'une méthode qui renverra toute les données des utilisateurs.

$getUserPseudo = new Users();
$allUsers = $getUserPseudo->getAllUsers();

//tableau associatif vide dans lequel sera stockée les pseudos des utilisateurs liés à leur id.

$usersArray;

foreach($allUsers as $key=>$value):
    $usersArray[$value['id']] = $value['warfriendsPseudo'];
endforeach;

//tableaux utilisés pour les select.

$updateRank = ['Moins de 2','2','3','4','5'];
$syndicateRankName =['meridianRank','arbiterRank','cephalonRank','perrinRank','redVeilRank','lokaRank'];

//tableaux d'erreur pour l'inscription d'un utilisateur

$errorInForm = ['birthday'=>1,'discord'=>1,'mail'=>1,'password'=>1,'confirmPassword'=>1,'favArmor'=>1,'showDiscord'=>1,'showMail'=>1];
$formValidation =['birthday'=>1,'discord'=>1,'mail'=>1,'password'=>1,'confirmPassword'=>1,'favArmor'=>1,'showDiscord'=>1,'showMail'=>1];

//tableaux d'erreur pour la modification de password.

$errorInModif = ['oldPassword'=>1,'newPassword'=>1,'confirmNewPassword'=>1];
$modifValidation = ['oldPassword'=>1,'newPassword'=>1,'confirmNewPassword'=>1];

//tableaux d'erreur pour la modification des rangs de syndicats.

$errorInUpdateSyndicateRank = ['meridianRank'=>1,'arbiterRank'=>1,'cephalonRank'=>1,'perrinRank'=>1,'redVeilRank'=>1,'lokaRank'=>1];
$updateSyndicateRankValidate = ['meridianRank'=>1,'arbiterRank'=>1,'cephalonRank'=>1,'perrinRank'=>1,'redVeilRank'=>1,'lokaRank'=>1];

//tableaux d'erreur pour la modification du discord et du mail.

$errorInUpdateInfos = ['newDiscord'=>1,'newMail'=>1];
$updateInfosValidation = ['newDiscord'=>1,'newMail'=>1];
?>