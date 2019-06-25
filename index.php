<?php
include 'file.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Germania+One" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/ProjetHomePage.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
  <title>warFriends</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
<!--        <div class="container-fluid" id="divHomeText">
          <p class="h3 font-weight-bold text-danger font-family-germania" id="homePageText">Find friends. Exchange. Get stronger.</p>
        </div>-->
<video width="auto" height="auto" autoplay="" loop="" muted="">
                <source type="video/mp4" src="https://n9e5v4d8.ssl.hwcdn.net/uploads/warframes/videos/Nyx.mp4" />
                <source type="video/webm" src="https://n9e5v4d8.ssl.hwcdn.net/uploads/warframes/videos/Nyx.webm" />
            </video>

  <!-- Modal -->
<div class="modal fade font-family-germania text-light" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <p class="modal-title h4 font-weight-bold" id="ModalTitle">Connexion</p>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="connexionForm" action="index.php" method="post">
          <fieldset class="text-center">
            <div><label for="mail">Adresse Mail : </label><input type="email" name="mail" id="mail" required/></div>
            <div class="rem"></div>
            <div>
            <label for="password">Mot de passe :</label><input type="password" id="password" required/>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-light text-dark" form="connexionForm">Connexion</button>
      </div>
      <a href="form.php" class="text-light text-center h6 font-weight-bold">Ou bien inscrivez vous</a>
    </div>
  </div>
</div>
      <p id="mainContent">
</p>
    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/scripts/Projet.js"></script>
  </body>

</html>