<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Germania+One" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/form.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title>warFriendsForm</title>
    </head>

<?php

$error = 0;
include 'regex.php';

if(isset($_POST['pseudo']) && isset($_POST['discord']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['warframePseudo']) && isset($_POST['steelMeridianRadio']) && isset($_POST['arbiterRadio']) && isset($_POST['cephalonRadio']) && isset($_POST['perrinRadio']) && isset($_POST['redVeilRadio']) && isset($_POST['newLokaRadio'])):

    if(!preg_match($regexDiscord,$_POST['discord'])):
        $error++;
    endif;
    if(!preg_match($regexMail,$_POST['mail'])):
        $error++;
    endif;
    if(!preg_match($regexPassword,$_POST['password'])):
        $error++;
    endif;
    if($_POST['password'] != $_POST['confirmPassword']):
        $error++;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['steelMeridianRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST('steelMeridianStanding'))):
            if($_POST['steelMeridianRank'] == 2 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['steelMeridianRank'] == 3 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['steelMeridianRank'] == 4 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['steelMeridianRank'] == 5 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['arbiterRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST['arbiterStanding'])):
            if($_POST['arbiterRank'] == 2 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['arbiterRank'] == 3 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['arbiterRank'] == 4 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['arbiterRank'] == 5 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['cephalonRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST('cephalonStanding'))):
            if($_POST['cephalonRank'] == 2 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['cephalonRank'] == 3 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['cephalonRank'] == 4 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['cephalonRank'] == 5 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['perrinRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST['perrinStanding'])):
            if($_POST['perrinRank'] == 2 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['perrinRank'] == 3 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['perrinRank'] == 4 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['perrinRank'] == 5 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['redVeilRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST['redVeilStanding'])):
            if($_POST['redVeilRank'] == 2 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['redVeilRank'] == 3 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['redVeilRank'] == 4 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['redVeilRank'] == 5 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['newLokaRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST('newLokaStanding'))):
            if($_POST['newLokaRank'] == 2 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['newLokaRank'] == 3 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['newLokaRank'] == 4 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['newLokaRank'] == 5 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if($error == 0):
    ?><p class="text-light"><?= 'coucou'; ?></p>
    <?php
    var_dump($_POST);
    else:
    ?><p class="text-light"><?= $error; ?></p>
    <?php
    var_dump($_POST);
endif;
    else:
        echo 'Veuillez remplir le formulaire dans son intégralité';
    ?>
    
<?php
if($error == 0):
    ?><p class="text-light"><?= 'coucou'; ?></p>
    <?php
    var_dump($_POST);
    else:
    ?><p class="text-light"><?= $error; ?></p>
    <?php
    var_dump($_POST);
endif;
endif;?>