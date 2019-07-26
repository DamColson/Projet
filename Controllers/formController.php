<?php
require_once '../Models/modelDb.php';
require_once '../Models/usersModel.php';
require_once '../Models/ArmorsModel.php';
require_once '../Models/SyndicateDetailsModel.php';

$linkIndex = '../index.php';
$linkAccount = 'UsersInfosView.php';
$linkFormView ='formView.php';
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

$armor = new Armors();
if(isset($_SESSION['id_wfd_Armors'])):
$armor->id = (int) $_SESSION['id_wfd_Armors'];
else:
$armor->id = $rand = rand(1,64);
endif;
$getName = $armor->getArmorsName();

$data;



if($_POST):
    
    $user = new Users();
    
    $actualdate =  new DateTime();
    $birthdate = new DateTime($_POST['birthday']);
    $age = floor(($actualdate->getTimestamp() - $birthdate->getTimestamp()));
    $ageEighteen = (3600*24)*((18*365)+4);
    
    $user->warframePseudo = $_POST['warframePseudo'];
    $user->warfriendsPseudo = $_POST['pseudo'];

    if(!empty($_POST['birthday']) && !preg_match($regexBirthday,dateFR($_POST['birthday']))):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['birthday']) && $age<$ageEighteen):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->birthday = $_POST['birthday'];
    endif;
    
    
    if(!empty($_POST['discord']) && !preg_match($regexDiscord,$_POST['discord'])):
        $errorInForm['discord'] = 0;
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->tagDiscord = $_POST['discord'];    
    endif; 
    
    if(!empty($_POST['mail']) && !preg_match($regexMail,$_POST['mail'])):
       $errorInForm['mail'] = 0;
       $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->mail = $_POST['mail'];   
    endif;
    
    if(!empty($_POST['password']) && !preg_match($regexPassword,$_POST['password'])):
       $errorInForm['password'] = 0;
       $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])):
        $user->password = $_POST['password'];   
    endif;

    if(!empty($_POST['confirmPassword']) && $_POST['confirmPassword'] != $_POST['password']):
        $errorInForm['confirmPassword'] = 0;
        $data = 'failure';
        
    endif;

    if(!empty($_POST['favArmor']) && !preg_match($regexArmors,$_POST['favArmor'])):
        $errorInForm['favArmor'] = 0; 
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])): 
        $user->id_wfd_Armors = $_POST['favArmor'];
    endif;
    
    if(!empty($_POST['showDiscord']) && !preg_match($regexShow,$_POST['showDiscord'])):
        $errorInForm['showDiscord'] = 0; 
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])): 
        $user->showDiscord = $_POST['showDiscord'];
    endif;
    
    if(!empty($_POST['showMail']) && !preg_match($regexShow,$_POST['showMail'])):
        $errorInForm['showMail'] = 0; 
        $data = 'failure';
    elseif(!empty($_POST['submitFormButton'])): 
        $user->showMail = $_POST['showMail'];
    endif;
  
    
    if($errorInForm == $formValidation):
        $user->addUsers();     
    endif;
   echo $data;
    
    
endif;

     
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

?>