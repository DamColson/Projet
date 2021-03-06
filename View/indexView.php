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
        include 'connectionView.php';
        ?>
        <div class="wrapper">
            <div class="rem"></div>

            <div class="rem"></div>


            <div class="container-fluid" id="content">
                <div class="h1 text-center text-dark bg-light-opac lastSubscriberWidth mx-auto rounded">Nos derniers Inscrits</div>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">



                    </div>
                </nav>
                <div class="row no-gutters" id="main">

                    <?php
                    foreach ($lastTwelve as $key => $value):

                        $user = new Users();
                        $user->id = (int) $value['id'];
                        $user->warfriendsPseudo = $value['warfriendsPseudo'];
                        $user->mail = $value['mail'];
                        $user->tagDiscord = $value['tagDiscord'];
                        $user->showDiscord = $value['showDiscord'];
                        $user->showMail = $value['showMail'];

                        $lastTwelvesRank = $user->getLastTwelvesRanks();
                        ?><div class="col-xl-4 col-12">
                            <div id="accordion<?= $key ?>">   
                                <div class="card mx-auto bg-light-opac" style="width: 18rem;">



                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?= $user->warfriendsPseudo ?></h5>
                                    </div>
                                    <div id="heading<?= $key ?>">     
                                        <h5 class="mb-0 text-center">
                                            <button class="btn btn-link text-dark syndicateHomeButton" id="<?= $key ?>" data-toggle="collapse" data-target="<?= '#collapse' . $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                                Syndicats <i class="fas fa-sort-down fa-2x"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="<?= 'collapse' . $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>" data-parent="#accordion<?= $key ?>">
                                        <ul class="list-group list-group-flush bg-light-opac">
                                            <?php foreach ($lastTwelvesRank as $secondKey => $secondValue):
                                                ?><li class="list-group-item bg-dark-opac text-light"><img class="img-fluid" src="assets/Images/<?= $secondValue['image'] ?>" /><?= 'rang : ' . $secondValue['rank'] ?></li>
                                                <?php
                                            endforeach;
                                            ?>
                                        </ul>
                                        <div class="card-body">

                                        </div>
                                    </div>

                                    <!-- test deuxieme accordeon -->

                                    <div class="<?= (empty($_SESSION)) ? 'd-none' : '' ?>" id="heading<?= $key . '' . $key ?>">     
                                        <h5 class="mb-0 text-center">
                                            <button class="btn btn-link text-dark contactButton" id="<?= $key . '' . $key ?>" data-toggle="collapse" data-target="<?= '#collapse' . $key . '' . $key ?>" aria-expanded="true" aria-controls="collapse<?= $key . '' . $key ?>">
                                                Contact <i class="fas fa-sort-down fa-2x"></i>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="<?= 'collapse' . $key . '' . $key ?>" class="<?= (empty($_SESSION)) ? 'd-none' : '' ?> collapse" aria-labelledby="heading<?= $key . '' . $key ?>" data-parent="#accordion<?= $key ?>">
                                        <ul class="list-group list-group-flush bg-light-opac">
                                            <li class="text-center list-group-item bg-dark-opac text-light"><?= (empty($_SESSION)) ? 'Connectez vous pour acceder à ces données !' : (($user->showMail == 'Yes') ? '<a class="text-light" href="mailto:' . $user->mail . '"><u>' . $user->mail . '</u></a>' : 'Ce membre ne souhaite pas partager son email' ) ?></li>
                                            <li class="text-center list-group-item bg-dark-opac text-light"><?= (empty($_SESSION)) ? 'Connectez vous pour acceder à ces données !' : (($user->showDiscord == 'Yes') ? $user->tagDiscord : 'Ce membre ne souhaite pas partager son discord') ?></li>
                                        </ul>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                    <div class="rem"></div>
                                    <div class="text-center bg-dark-opac  <?= 'smallSyndicate' . $key ?>">
                                        <?php foreach ($lastTwelvesRank as $thirdKey => $thirdValue):
                                            ?><img class="img-fluid w-25" src="assets/Images/<?= $thirdValue['image'] ?>" /><?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="rem"></div>
                            </div>

                        </div>


                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <button type="button" id="sideListCollapse" class="btn btn-dark"><i class="fas fa-plus mr-2"></i>Plus d'inscrits</button>
            <div id="sideList" class="active text-center">
                <div class="text-light" id="sideListContent">
                    <?php
                    foreach ($lastSixOffsetSix as $key => $value):
                        $user->warfriendsPseudo = $value['warfriendsPseudo'];
                        $user->id = (int) $value['id'];
                        $lastTwelvesRank = $user->getLastTwelvesRanks();
                        ?>
                        <div class="bg-dark-opac text-center mx-auto mb-1 mt-1">
                            <p class="text-dark bg-light-opac text-center h4 "><?= $user->warfriendsPseudo ?></p>
                                <?php                        
                            foreach ($lastTwelvesRank as $thirdKey => $thirdValue):
                                ?><img class="img-fluid smallImgWidth" src="assets/Images/<?= $thirdValue['image'] ?>" />
                            <?php endforeach; ?>
                        </div>
                      <?php
                    endforeach;
                    ?> 
                </div>


            </div>
        </div>




        <?php include 'View/footerView.php'; ?>



        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
        <script src="../assets/scripts/bootstrap.min.js"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>

</html>