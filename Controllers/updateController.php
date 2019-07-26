<?php
require '../Models/modelDb.php';
require '../Models/ArmorsModel.php';
require '../Models/usersModel.php';
require '../Models/SyndicateDetailsModel.php';

session_start();
$linkIndex = '../index.php';
$linkUpdate = 'updateView.php';
$linkFormView = 'formView.php';
$seeUsersInfos = 'UsersInfosView.php';
$modifyAccount = 'updateView.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView = 'formView.php';
$disconnect = '../Controllers/disconnect.php';
$searchView = 'searchView.php';

include '../assets/php/arrays.php';

$_POST = array_map('strip_tags',$_POST);

$armors = implode('|', $armor);
$primeArmors = implode('|', $primeArmor);

include '../assets/php/regex.php';

setlocale (LC_TIME, 'fr_FR.UTF8','fra');

function dateFr($date){
return strftime('%d/%m/%Y',strtotime($date));
}

$user = new Users();
$syndicateDetail = new SyndicateDetails();
$armor = new Armors();
if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

extract($_SESSION);


$user->id = (int)$id;
$user->warframePseudo=$warframePseudo;
$user->warfriendsPseudo=$warfriendsPseudo;
$user->mail=$mail;
$user->tagDiscord=$tagDiscord;

$data;

if($_POST):
    

    if(!empty($_POST['newDiscord']) && !preg_match($regexDiscord,$_POST['newDiscord'])):
        $errorInUpdateInfos['discord'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newDiscord'])):
        $user->tagDiscord = $_POST['newDiscord'];
        $user->updateUsersDiscordTags();
        $_SESSION['tagDiscord'] = $user->tagDiscord;
    endif;
    
    if(!empty($_POST['newMail']) && !preg_match($regexMail,$_POST['newMail'])):
        $errorInUpdateInfos['discord'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newMail'])):
        $user->mail = $_POST['newMail'];
        $user->updateUsersMails();
        $_SESSION['mail'] = $user->mail;
    endif;
    
    if(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newPseudo'])):
        $user->warfriendsPseudo = $_POST['newPseudo'];
        $user->updateUsersWarfriendsPseudos();
        $_SESSION['warfriendsPseudo'] = $user->warfriendsPseudo;
    endif;
    
    if(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newWarframePseudo'])):
        $user->warframePseudo = $_POST['newWarframePseudo'];
        $user->updateUsersWarframePseudos();
        $_SESSION['warframePseudo'] = $user->warframePseudo;
    endif;
    
    if(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newFavArmor'])):
        $user->id_wfd_Armors = (int)$_POST['newFavArmor'];
        $user->updateUsersFavArmors();
        $_SESSION['id_wfd_Armors'] = $user->id_wfd_Armors;
    endif;
    
    if(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newShowDiscord'])):
        $user->showDiscord = $_POST['newShowDiscord'];
        $user->updateShowDiscord();
        $_SESSION['showDiscord'] = $user->showDiscord;
    endif;
    
    if(!empty($_POST['submitUpdateInfosButton']) && !empty($_POST['newShowMail'])):
        $user->showMail = $_POST['newShowMail'];
        $user->updateShowMail();
        $_SESSION['showMail'] = $user->showMail;
    endif;
    
   if (!empty($_POST['meridianRank']) && !preg_match($regexSyndicateRank, $_POST['meridianRank'])):
        $errorInUpdateSyndicateRank['meridianRank'] = 0;
   elseif(!empty($_POST['meridianRank']) && !empty($_POST['submitUpdateRankButton'])):
        $syndicateDetail->rank = $_POST['meridianRank'];
        $syndicateDetail->id_wfd_UsersInfos = (int)$user->id;
        $syndicateDetail->id_wfd_Syndicate = 1;
        $syndicateDetail->updateSyndicateDetails();
        $_SESSION['meridianRank'] = $syndicateDetail->rank;
        
    endif;

    if (!empty($_POST['arbiterRank']) && !preg_match($regexSyndicateRank, $_POST['arbiterRank'])):
        $errorInUpdateSyndicateRank['arbiterRank'] = 0;
    elseif(!empty($_POST['arbiterRank']) && !empty($_POST['submitUpdateRankButton'])):
        $syndicateDetail->rank = $_POST['arbiterRank'];
        $syndicateDetail->id_wfd_UsersInfos = (int)$user->id;
        $syndicateDetail->id_wfd_Syndicate = 2;
        $syndicateDetail->updateSyndicateDetails();
        $_SESSION['arbiterRank'] = $syndicateDetail->rank;
    endif;

    if (!empty($_POST['cephalonRank']) && !preg_match($regexSyndicateRank, $_POST['cephalonRank'])):
        $errorInUpdateSyndicateRank['cephalonRank'] = 0;
    elseif(!empty($_POST['cephalonRank']) && !empty($_POST['submitUpdateRankButton'])):
        $syndicateDetail->rank = $_POST['cephalonRank'];
        $syndicateDetail->id_wfd_UsersInfos = (int)$user->id;
        $syndicateDetail->id_wfd_Syndicate = 3;
        $syndicateDetail->updateSyndicateDetails();
        $_SESSION['cephalonRank'] = $syndicateDetail->rank;
    endif;

    if (!empty($_POST['perrinRank']) && !preg_match($regexSyndicateRank, $_POST['perrinRank'])):
        $errorInUpdateSyndicateRank['perrinRank'] = 0;
    elseif(!empty($_POST['perrinRank']) && !empty($_POST['submitUpdateRankButton'])):
        $syndicateDetail->rank = $_POST['perrinRank'];
        $syndicateDetail->id_wfd_UsersInfos = (int)$user->id;
        $syndicateDetail->id_wfd_Syndicate = 4;
        $syndicateDetail->updateSyndicateDetails();
        $_SESSION['perrinRank'] = $syndicateDetail->rank;
    endif;

    if (!empty($_POST['redVeilRank']) && !preg_match($regexSyndicateRank, $_POST['redVeilRank'])):
        $errorInUpdateSyndicateRank['redVeilRank'] = 0;
    elseif(!empty($_POST['redVeilRank']) && !empty($_POST['submitUpdateRankButton'])):
        $syndicateDetail->rank = $_POST['redVeilRank'];
        $syndicateDetail->id_wfd_UsersInfos = (int)$user->id;
        $syndicateDetail->id_wfd_Syndicate = 5;
        $syndicateDetail->updateSyndicateDetails();
        $_SESSION['redVeilRank'] = $syndicateDetail->rank;
    endif;

    if (!empty($_POST['lokaRank']) && !preg_match($regexSyndicateRank, $_POST['lokaRank'])):
        $errorInUpdateSyndicateRank['lokaRank'] = 0;
    elseif(!empty($_POST['lokaRank']) && !empty($_POST['submitUpdateRankButton'])):
        $syndicateDetail->rank = $_POST['lokaRank'];
        $syndicateDetail->id_wfd_UsersInfos = (int)$user->id;
        $syndicateDetail->id_wfd_Syndicate = 6;
        $syndicateDetail->updateSyndicateDetails();
        $_SESSION['lokaRank'] = $syndicateDetail->rank;
    endif;
    
endif;

echo $data;

    
