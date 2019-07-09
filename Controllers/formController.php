<?php

include '../assets/php/arrays.php';

$_POST = array_map('strip_tags',$_POST);
$armors = implode('|', $armor);
$primeArmors = implode('|', $primeArmor);

include '../assets/php/regex.php';

setlocale (LC_TIME, 'fr_FR.UTF8','fra');

function dateFr($date){
return strftime('%d/%m/%Y',strtotime($date));
}

$data;

    if(!empty($_POST['birthday']) && !preg_match($regexBirthday,dateFR($_POST['birthday']))):
        $errorInForm['birthday'] = 0;
        $data = 'failure';
    endif;
    
    if(!empty($_POST['discord']) && !preg_match($regexDiscord,$_POST['discord'])):
        $errorInForm['discord'] = 0;
        $data = 'failure';
    endif; 
    
    if(!empty($_POST['mail']) && !preg_match($regexMail,$_POST['mail'])):
       $errorInForm['mail'] = 0;
       $data = 'failure';
    endif;
    
    
    
    if(!empty($_POST['password']) && !preg_match($regexPassword,$_POST['password'])):
       $errorInForm['password'] = 0;
       $data = 'failure';
    endif;
    
    
    
    if(!empty($_POST['confirmPassword']) && $_POST['confirmPassword'] != $_POST['password']):
        $errorInForm['confirmPassword'] = 0;
        $data = 'failure';
    endif;
    
    
    if(!empty($_POST['favArmor']) && !preg_match($regexArmors,$_POST['favArmor'])):
        $errorInForm['favArmor'] = 0; 
        $data = 'failure';
    endif;
    
  
    if($_POST['steelMeridianRadio'] == 'on'):
        if(!empty($_POST['steelMeridianRank']) && !preg_match($regexSyndicateRank,$_POST['steelMeridianRank'])):
            $errorInForm['StMe'] = 0;
            $data = 'failure';
        endif;
    endif;
    
   
    
    if($_POST['arbiterRadio'] == 'on'):
        if(!empty($_POST['arbiterRank']) && !preg_match($regexSyndicateRank,$_POST['arbiterRank'])):
            $errorInForm['AoH'] = 0;
            $data = 'failure';
        else:
            $data = 'success';
        endif; 
    endif;
    

    
    if($_POST['cephalonRadio'] == 'on'):
        if(!empty($_POST['cephalonRank']) && !preg_match($regexSyndicateRank,$_POST['cephalonRank'])):
            $errorInForm['CeSu'] = 0;
            $data = 'failure';
        endif;
    endif;
    
    
    
    if($_POST['perrinRadio'] == 'on'):
        if(!empty($_POST['perrinRank']) && !preg_match($regexSyndicateRank,$_POST['perrinRank'])):
            $errorInForm['ThPeSe'] = 0; 
            $data = 'failure';
        endif;
    endif;
    

    
    if($_POST['redVeilRadio'] == 'on'):
        if(!empty($_POST['redVeilRank']) && !preg_match($regexSyndicateRank,$_POST['redVeilRank'])):
            $errorInForm['ReVe'] = 0; 
            $data = 'failure';
        endif;
    endif;
    
   
    
    if($_POST['newLokaRadio'] == 'on'):
        if(!empty($_POST['newLokaRank']) && !preg_match($regexSyndicateRank,$_POST['newLokaRank'])):
            $errorInForm['NeLo'] = 0; 
            $data = 'failure';
        endif;
    endif;

   echo $data;
    


     


?>