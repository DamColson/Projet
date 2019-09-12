<?php
session_start();
require '../Controllers/UsersInfosController.php';
?>

<!DOCTYPE html>
<html lang="fr">


    <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Michroma&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="../assets/css/error.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://kit.fontawesome.com/eaadffbb2b.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <title>warFriends</title>
</head>
    <body class="font-family-Michroma">


        <?php
        include 'headerView.php';
        include 'connectionView.php';
        ?>
        <div class="rem"></div>

        <div class="container text-center">
            <img class="img-fluid" src="../assets/Images/warning.jpg" />
            <div class="errorMessage">Vous n'avez pas les autorisations nécessaires pour accéder à cette page !</div>
        </div>

        <div class="rem"></div>
        <?php include 'footerView.php'; ?>
        
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
        <script src="../assets/scripts/bootstrap.min.js"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>
</html>