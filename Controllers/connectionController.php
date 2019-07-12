<?php

require 'Models/modelDb.php';
require 'Models/usersModel.php';

$_POST = array_map('strip_tags', $_POST);
$user = new Users();
$user->warfriendsPseudo = $_POST['warfriendsPseudo'];
$getInfos = $user->getInfos();
session_start();

if ($_POST['warfriendsPassword'] == $getInfos[0]['password']):

    foreach ($getInfos as $key => $value):
        foreach ($value as $secondKey => $secondValue):
            $_SESSION[$secondKey] = $secondValue;
        endforeach;
    endforeach;
endif;

var_dump($_SESSION);
