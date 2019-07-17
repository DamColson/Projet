<?php

session_start();

if($_POST['disconnect'] == 'disconnect'):
    session_destroy();
    header('Location:../index.php');
endif;