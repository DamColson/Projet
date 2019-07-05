<?php

include '../assets/php/arrays.php';

$_POST = array_map('strip_tags',$_POST);
$armors = implode('|', $armor);
$primeArmors = implode('|', $primeArmor);

include '../assets/php/regex.php';

setlocale (LC_TIME, 'fr_FR.UTF8','fra');

function dateFr($date){
return ucfirst(strftime('%A %d %B %Y, %H:%M:%S',strtotime($date)));
}

if($_POST):
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
    if(preg_match($regexBirthday,dateFR($_POST['birthdate']))):
       $errorInForm['birthday'] = 1; 
    endif;
endif;
?>