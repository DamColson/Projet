<?php
session_start();
require_once 'Controllers/connectionController.php';
require_once 'Controllers/indexController.php';
?>
<!DOCTYPE html>
<html lang="fr">


    <?php
    include 'headView.php';
    
    ?>

    <body class="font-family-Michroma">
        
        <video autoplay loop poster="../Images/warframe7.jpg" id="bgvid">
            <source src="../assets/Videos/<?= $getName[0]['name'] ?>.webm" type="video/webm">
            <source src="../assets/Videos/<?= $getName[0]['name'] ?>.mp4" type="video/mp4">
        </video>
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
                    <button type="button" class="btn btn-secondary mr-2" id="closeConnection" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="connectionButton" class="btn btn-light text-dark ml-2" id="connectionButton"value="connectionOn">Connexion</button>
                </div>
            </form>
            <?php  
            if (!empty($_SESSION) && !empty($_POST['connectionButton'])):

        ?><script>Swal.fire({
                    title: 'Bonjour <?=$_SESSION['warfriendsPseudo']?>.',
                    text: 'Connexion réussie',
                    type: 'success',
                    confirmButtonText: 'Fermer'
                });
//                setTimeout(function () {
//                    
//       document.location.href='index.php'; //will redirect to your blog page (an ex: blog.html)
//    }, 2000); //will call the function after 2 secs.
//                
   
                    
       </script><?php
          
    endif;
    
    ?>
            <div class="rem"></div>
        </div>
        <div class="rem"></div>
        <div class="h1 text-center text-dark bg-light-opac w-50 mx-auto rounded">Nos derniers Inscrits</div>
        <div class="rem"></div>
        <div class="row no-gutters">
    <?php


foreach($lastTwelve as $key=>$value):
    
    $user = new Users();
    $user->id = (int)$value['id'];
    $user->warfriendsPseudo = $value['warfriendsPseudo'];
    $lastTwelvesRank = $user->getLastTwelvesRanks();
    
?><div class="col-xl-3 col-12">
    <div id="accordion<?=$key?>">   
  <div class="card mx-auto bg-light-opac" style="width: 18rem;">
            
                
             
            <div class="card-body">
                <h5 class="card-title text-center"><?= $user->warfriendsPseudo ?></h5>
            </div>
       <div id="heading<?=$key?>">     
      <h5 class="mb-0 text-center">
        <button class="btn btn-link text-dark syndicateHomeButton" id="<?=$key?>" data-toggle="collapse" data-target="<?='#collapse'.$key?>" aria-expanded="true" aria-controls="collapse<?=$key?>">
          Syndicats <i class="fas fa-sort-down fa-2x"></i>
        </button>
      </h5>
       </div>
      <div id="<?='collapse'.$key?>" class="collapse" aria-labelledby="heading<?=$key?>" data-parent="#accordion<?=$key?>">
            <ul class="list-group list-group-flush bg-light-opac">
                <?php foreach($lastTwelvesRank as $secondKey=>$secondValue):
                    
                    ?><li class="list-group-item bg-dark-opac text-light"><img class="img-fluid" src="assets/Images/<?= $secondValue['image'] ?>" /><?= 'rang : ' . $secondValue['rank'] ?></li>
                    <?php
                endforeach;
                ?>
            </ul>
            <div class="card-body">
               
            </div>
                </div>
               <div class="rem"></div>
               <div class="text-center bg-dark-opac  <?='smallSyndicate' . $key?>">
                <?php foreach($lastTwelvesRank as $thirdKey=>$thirdValue):
                   ?><img class="img-fluid w-25" src="assets/Images/<?= $thirdValue['image'] ?>" /><?php
                endforeach;?>
               </div>
        </div>
        <div class="rem"></div>
    </div>
</div>
        
    
<?php
endforeach;

?>
</div>

        <?php include 'View/footerView.php';?>



        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>

</html>