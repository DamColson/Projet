<?php
$linkIndex = '../index.php';
$linkaccount = 'accountView.php';
$linkFormView = 'formView.php';
$seeUsersInfos = 'UsersInfosView.php';
$modifyAccount = 'updateView.php';
session_start();
var_dump($_SESSION);
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
        <div class="rem"></div>
        
        <div class="dropdown row no-gutters bg-light-opac rounded headRow align-items-center justify-content-center"> 
            <p class="mx-auto text-dark h2">Fireloup</p>

            <a class="dropdown-toggle text-light nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-user-cog fa-2x text-muted mr-3"></i></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?= $seeUsersInfos ?>">Mon Compte</a>
                <a class="dropdown-item" href="<?= $modifyAccount ?>">Modifier mes infos</a>
                <a class="dropdown-item" href="#">Déconnexion</a>
            </div>
        </div>
        
        <div class="rem"></div>
        
        <div class="bg-light-opac rounded">
            <div class="text-dark row no-gutters">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-6 font-weight-bold h5">
                    Pseudo Warfriends :
                </div>
                <div class="col-lg-3"></div>    
            </div>

            <div class="text-dark row no-gutters">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-4 h5 text-center">
                    Fireloup
                </div>
                <div class="col-lg-5"></div>    
            </div>
        </div>
        
        <div class="rem"></div>
        
        <div class="bg-light-opac rounded">
            <div class="text-dark row no-gutters">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-6 font-weight-bold h5">
                    Pseudo Warframe :
                </div>
                <div class="col-lg-3"></div>    
            </div>

            <div class="text-dark row no-gutters">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-4 h5 text-center">
                    Fireloup
                </div>
                <div class="col-lg-5"></div>    
            </div>
        </div>

        <div class="rem"></div>

        <div class="bg-light-opac rounded">
            <div class="text-dark row no-gutters">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-6 font-weight-bold h5">
                    Armure Favorite :
                </div>
                <div class="col-lg-3"></div>    
            </div>

            <div class="text-dark row no-gutters">
                <div class="col-lg-3"></div>
                <div class="col-12 col-lg-4 h5 text-center">
                    Mag
                </div>
                <div class="col-lg-5"></div>    
            </div>
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