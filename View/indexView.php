<?php
require 'Controllers/connectionController.php';
$linkIndex = 'index.php';
$linkAccount = 'View/accountView.php';
$linkFormView ='View/formView.php'; 
?>
<!DOCTYPE html>
<html lang="fr">


   <?php
   include 'headView.php';
   ?>

<body class="font-family-germania">
    <?php
    include 'headerView.php';
    ?>
    <div class="bg-light-opac" id="connectionDiv">
            <div>
                <p class="h2 font-weight-bold text-center" >Connexion</p>
            </div>
            <form id="connexionForm" action="../index.php" method="post">
            
                
                    <fieldset class="text-center row no-gutters">
                        <div class="form-group col-lg-3"></div>
                        <div class="form-group col-lg-6">
                            <label for="warfriendsPseudo">Pseudo Warfriends : </label>
                            <input class="form-control" type="text" name="warfriendsPseudo" id="warfriendsPseudo" required/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                        <div class="rem"></div>
                        <div class="form-group col-lg-3"></div>
                        <div class="form-group col-lg-6">
                            <label for="warfriendsPassword">Mot de passe :</label>
                            <input class="form-control" type="password" name="warfriendsPassword" id="warfriendsPassword" required/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                    </fieldset>
                
           
            <div class="align-items-center justify-content-center d-flex">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-light text-dark ml-2" id="connexionButton">Connexion</button>
            </div>
            </form>
        </div>
    
<!--        <div class="container-fluid" id="divHomeText">
          <p class="h3 font-weight-bold text-danger font-family-germania" id="homePageText">Find friends. Exchange. Get stronger.</p>
        </div>-->
<!--            <video width="auto" height="auto" autoplay="" loop="" muted="">
                <source type="video/mp4" src="assets/Videos/Nidus.mp4" />
                <source type="video/webm" src="assets/Videos/Nidus.webm" />
            </video>-->

 
    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/scripts/Projet.js"></script>
  </body>

</html>