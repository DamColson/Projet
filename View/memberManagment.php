<?php
session_start();
require_once '../Controllers/adminController.php';
require_once '../Controllers/disconnect.php';
require_once '../Controllers/memberController.php';
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
        include 'adminHeaderView.php';
        ?>
        <div class="rem"></div>

        <form class="text-center" action="memberManagment.php" method="GET">
            <fieldset class="w-75 mx-auto">
                <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label class="text-light" for="memberSearchSelect">Chercher un membre : </label>
                        <select class="form-control" name="memberSearchSelect" id="memberSearchSelect">
                            <option value="" disabled selected></option>
                            <?php
                            foreach ($usersArray as $key => $memberName):
                                ?><option value ="<?= $key ?>"><?= $memberName ?></option>
                                <?php
                            endforeach;
                            ?> 

                        </select>
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="rem"></div>

                    <div class=" col-lg-3"></div>
                    <div class="h3 font-weight-bold text-light text-center col-lg-6"> OU </div>
                    <div class=" col-lg-3"></div>

                    <div class="rem"></div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">

                        <label class="text-light" for="memberSearchInput">Via son pseudo warfriends : </label>
                        <input class="form-control" type="search" name="memberSearchInput" id="memberSearchInput" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <button class="btn btn-outline-success my-2 my-sm-0 mb-3 text-light" type="submit">Recherche</button>
                </div>
            </fieldset>
                    </form>

                    <div class="rem"></div>

                    <div class="container">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a id="tab-A" href="#memberInfos" class="nav-link active" data-toggle="tab" role="tab">Informations du membre</a>
                            </li>

                            <li class="nav-item">
                                <a id="tab-B" href="#memberDeletion" class="nav-link" data-toggle="tab" role="tab">Supprimer le membre</a>
                            </li>


                        </ul>


                        <div id="content" class="tab-content" role="tablist">
                            <div id="memberInfos" class="card accordCard tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                                <div class="card-header accordCardHeader" role="tab" id="heading-A">
                                    <h5 class="mb-0">
                                        <!-- Note: `data-parent` removed from here -->
                                        <a class="text-dark" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                            Informations du membre
                                        </a>
                                    </h5>
                                </div>

                                <!-- Note: New place of `data-parent` -->
                                <div id="collapse-A" class="collapse accordCarcCollapse show" data-parent="#content" role="tabpanel" aria-labelledby="heading-A">
                                    <div class="card-body accordCardBody">
                                        <div class="mx-auto rounded">

                                            <div class="rem"></div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Id du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newUser->id ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Pseudo Warfriends du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newUser->warfriendsPseudo ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Pseudo Warframe du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newUser->warframePseudo ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Date de naissance du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newUser->birthday ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Email du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newUser->mail ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Tag discord du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newUser->tagDiscord ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                                    Warframe favorite du membre :
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>

                                            <div class="text-dark row no-gutters">
                                                <div class="col-lg-3"></div>
                                                <div class="col-12 col-lg-6 h5 text-center">
                                                    <?= $newWarframe->name ?>
                                                </div>
                                                <div class="col-lg-3"></div>    
                                            </div>





                                            <div class="rem"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div id="memberDeletion" class="card accordCard tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                                <div class="card-header accordCardHeader" role="tab" id="heading-B">
                                    <h5 class="mb-0">
                                        <a class="collapsed text-dark" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                            Supprimer le membre
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-B" class="collapse accordCardCollapse" data-parent="#content" role="tabpanel" aria-labelledby="heading-B">
                                    <div class="card-body accordCardBody">
                                        <form method="POST" class="w-100 mx-auto" action="memberManagment.php">

                                            <fieldset class="dark mb-3">
                                                <div class="rem"></div>
                                                <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                                                    <div class="form-group col-lg-3"></div>
                                                    <div class="form-group col-lg-6">
                                                        <label for="deleteMember">Veuillez retaper le pseudo Warfriends du membre  : </label>
                                                        <input type="text" class="form-control" id="deleteMember" name="deleteMember" value="" required />
                                                    </div>
                                                    <div class="form-group col-lg-3"></div>                                    

                                                </div>

                                            </fieldset>

                                            <div class="align-items-center justify-content-center d-flex">
                                                <button id="submitDeleteMemberButton" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Envoyer</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="rem"></div>
                    <?php include 'footerView.php'; ?>



                    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    <script src="../assets/scripts/modifPasswordAjax.js"></script>
                    </body>

                    </html>