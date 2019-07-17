<?php
session_start();
require '../Controllers/updateController.php';
?>
<!DOCTYPE html>
<html lang="fr">


    <?php
    include 'headView.php';
    ?>
    <body class="font-family-germania">
        <?php
        include 'headerView.php';
        
        
        var_dump($_SESSION);
        var_dump($user);
        var_dump($syndicateDetail);
        
        ?>

        <div class="rem"></div>

        <div class="container">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#updatePersonalInfos" class="nav-link active" data-toggle="tab" role="tab">Modifier mes informations personnelles</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#updateSyndicate" class="nav-link" data-toggle="tab" role="tab">Mettre à jour mes syndicats</a>
                </li>
            </ul>


            <div id="content" class="tab-content" role="tablist">
                <div id="updatePersonalInfos" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">

                            <a data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                Modifier mes informations personnelles
                            </a>
                        </h5>
                    </div>


                    <div id="collapse-A" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <form method="POST" class="bg-dark w-100 mx-auto" action="updateView.php" id="updateForm">
                                <p class="h3 text-light mb-3 text-center">Vos informations personnelles</p>
                                <fieldset class="bg-dark text-light mb-3">
                                    <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="newPseudo">Pseudo : </label>
                                            <input type="text" class="form-control" id="newPseudo" name="newPseudo" value="<?= $_SESSION['warfriendsPseudo'] ?>" required />
                                        </div>
                                        <div class="form-group col-lg-3"></div>

                                        <div class="form-group col-lg-3"></div>                   
                                        <div class="form-group col-lg-6">
                                            <label for="newDiscord">Tag Discord : </label>
                                            <input type="text" class="form-control" id="newDiscord" name="newDiscord" value="<?= $_SESSION['tagDiscord'] ?>" />
                                        </div>
                                        <div class="form-group col-lg-3"></div>

                                        <div class="row no-gutters w-100">
                                            <div class="text-danger mx-auto" id="newDiscordError"></div>
                                        </div>

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="newMail">Email : </label>
                                            <input type="mail" class="form-control" id="newMail" name="newMail" value="<?= $_SESSION['mail'] ?>"/>
                                        </div>
                                        <div class="form-group col-lg-3"></div>

                                        <div class="row no-gutters w-100">
                                            <div class="text-danger mx-auto" id="newMailError"></div>
                                        </div>

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-11 col-lg-6">
                                            <label for="newWarframePseudo">Votre pseudo Warframe : </label>
                                            <input type="text" class="form-control" id="newWarframePseudo" name="newWarframePseudo" value="<?= $_SESSION['warframePseudo'] ?>"  />
                                        </div>
                                        <div class="form-group col-lg-3"></div>

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-11 col-lg-6">
                                            <label for="newFavArmor">Quelle est votre armure favorite : </label>
                                            <select class="form-control" id="newFavArmor" name="newFavArmor">
                                                <option value="All" selected>Aucune en particulier</option>
                                                <optgroup label="Armures classiques">
                                                    <?php
                                                    foreach ($armor as $key => $armorName):
                                                        ?><option value ="<?= $key ?>" <?= ($_SESSION['id_Armors'] == $key) ? 'selected' : ''; ?>><?= $armorName ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                                </optgroup>
                                                <optgroup label="Armures primes">
                                                    <?php
                                                    foreach ($primeArmor as $key => $armorName):
                                                        ?><option value ="<?= $key ?>" <?= ($_SESSION['id_Armors'] == $key) ? 'selected' : ''; ?>><?= $armorName ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                    </div>

                                </fieldset>

                                <div class="align-items-center justify-content-center d-flex">
                                    <a href="UsersInfosView.php"><button type="button" class="btn btn-light text-dark mr-3 mb-3">Retour</button></a>
                                    <button name="submitUpdateInfosButton" id="submitUpdateInfosButton" value="submitOn" type="submit" class="btn btn-light text-dark mb-3">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="updateSyndicate" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Mettre à jour mes syndicats
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="rem"></div>
                            <form method="POST" class="mx-auto bg-dark" action="updateView.php" id="updateSyndicatesForm">

                                <div class="rem"></div>
                                <div class="bg-light w-75 mx-auto rounded">

                                    <div class="rem"></div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallsteelicon.png" /> Steel Meridian : 
                                            <select class="form-control" id="meridianRank" name="meridianRank">
                                                <option value="" selected disabled></option>
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><option value ="<?=$value?>"><?= $value ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </select>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>                          

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallarbitericon.png" /> Arbiter Of Hexis :
                                            <select class="form-control" id="arbiterRank" name="arbiterRank">
                                                <option value="" selected disabled></option>
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><option value ="<?=$value?>"><?= $value ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </select>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>                   

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallcephalonicon.png" /> Cephalon Suda :
                                            <select class="form-control" id="cephalonRank" name="cephalonRank">
                                                <option value="" selected disabled></option>
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><option value ="<?=$value?>"><?= $value ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </select>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallredveilicon.png" /> The Red Veil :
                                            <select class="form-control" id="redVeilRank" name="redVeilRank">
                                                <option value="" selected disabled></option>
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><option value ="<?=$value?>"><?= $value ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </select>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallperrinsequenceicon.png" /> Perrin Sequence :
                                            <select class="form-control" id="perrinRank" name="perrinRank">
                                                <option value="" selected disabled></option>
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><option value ="<?=$value?>"><?= $value ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </select>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smalllokaicon.png" /> The New Loka :
                                            <select class="form-control" id="lokaRank" name="lokaRank">
                                                <option value="" selected disabled></option>
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><option value ="<?=$value?>"><?= $value ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </select>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="rem"></div>
                                    
                                    <div class="align-items-center justify-content-center d-flex">
                                        
                                        <a href="UsersInfosView.php"><button type="button" class="btn btn-dark text-light mr-3 mb-3">Retour</button></a>
                                    
                                        <button name="submitUpdateRankButton" id="submitUpdateRankButton" value="submitOn" type="submit" class="btn btn-dark text-light mb-3">Valider</button>
                                    </div>

                                    <div class="rem"></div>
                                </div>
                                <div class="rem"></div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/updatePersonnalInfos.js"></script>
    </body>    
</html>