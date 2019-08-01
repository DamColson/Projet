<?php

session_start();

//Lors du click sur déconnection,destruction de la session en cours et redirection sur la page d'accueil

if($_POST['disconnect'] == 'disconnect'):
    session_destroy();
    header('Location:../index.php');
endif;