<?php
session_start();
require '../Controllers/UsersInfosController.php';

?>

<!DOCTYPE html>
<html lang="fr">


    <?php
    include 'headView.php';

    $armor = new Armors();
    $armor->id = (int) $_SESSION['id_Armors'];
    $getName = $armor->getArmorsName();
 
    ?>
    <body class="font-family-germania">
        <?php
        include 'headerView.php';
        ?>
        <div class="rem"></div>

        <div class="container">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#infos" class="nav-link active" data-toggle="tab" role="tab">Informations du compte</a>
                </li>
                <li class="nav-item">
                    <a id="tab-D" href="#syndicateView" class="nav-link" data-toggle="tab" role="tab">Voir mes syndicats</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#passwordChange" class="nav-link" data-toggle="tab" role="tab">Changer de mot de passe</a>
                </li>
                <li class="nav-item">
                    <a id="tab-C" href="#deleteAccount" class="nav-link" data-toggle="tab" role="tab">Supprimer mon compte</a>
                </li>
                
            </ul>


            <div id="content" class="tab-content" role="tablist">
                <div id="infos" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <!-- Note: `data-parent` removed from here -->
                            <a data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                Informations du compte
                            </a>
                        </h5>
                    </div>

                    <!-- Note: New place of `data-parent` -->
                    <div id="collapse-A" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body bg-dark">
                            <div class="bg-light w-75 mx-auto rounded">

                                <div class="rem"></div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Pseudo Warfriends :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $_SESSION['warfriendsPseudo'] ?>
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Pseudo Warframe :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $_SESSION['warframePseudo'] ?>
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Date de naissance :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= dateFr($_SESSION['birthday']) ?> 
                                    </div>
                                    <div class="col-lg-3"></div>
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Adresse mail :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $_SESSION['mail'] ?> 
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Tag Discord :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $_SESSION['tagDiscord'] ?> 
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>
                                
                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Armure favorite :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $getName[0]['name'] ?> 
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="rem"></div>

                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="updateView.php" class="mx-auto"><button type="button" class="btn btn-dark text-light">Modifier mes infos</button></a>
                                </div>

                                <div class="rem"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="syndicateView" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                    <div class="card-header" role="tab" id="heading-D">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-D" aria-expanded="false" aria-controls="collapse-D">
                                Voir mes syndicats
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-D" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="heading-D">
                        <div class="card-body bg-dark">
                            <div class="bg-light w-75 mx-auto rounded">

                                <div class="rem"></div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                        <img class="img-fluid" src="../assets/Images/smallsteelicon.png" /> Steel Meridian :
                                    </div>
                                       
                                </div>                          
                                <div class="col-lg-12 text-center h5"><?=($_SESSION['meridianRank']=='<2')?'Votre rang chez Steel Meridian est inférieur à 2':'Votre rang chez Steel Meridian est : ' . $_SESSION['meridianRank']?></div> 
                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                        <img class="img-fluid" src="../assets/Images/smallarbitericon.png" /> Arbiter Of Hexis :
                                    </div>
                                        
                                </div>                   
                                <div class="col-lg-12 text-center h5"><?=($_SESSION['arbiterRank']=='<2')?'Votre rang chez Arbiter Of Hexis est inférieur à 2':'Votre rang chez Arbiter Of Hexis est : ' . $_SESSION['arbiterRank']?></div>
                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                        <img class="img-fluid" src="../assets/Images/smallcephalonicon.png" /> Cephalon Suda :
                                    </div>
                                        
                                </div>
                                <div class="col-lg-12 text-center h5"><?=($_SESSION['cephalonRank']=='<2')?'Votre rang chez Cephalon Suda est inférieur à 2':'Votre rang chez Cephalon Suda est : ' . $_SESSION['cephalonRank']?></div>
                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                        <img class="img-fluid" src="../assets/Images/smallredveilicon.png" /> The Red Veil : 
                                    </div>
                                        
                                </div>
                                    <div class="col-lg-12 text-center h5"><?=($_SESSION['redVeilRank']=='<2')?'Votre rang chez Red Veil est inférieur à 2':'Votre rang chez Red Veil est : ' . $_SESSION['redVeilRank']?></div>
                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                        <img class="img-fluid" src="../assets/Images/smallperrinsequenceicon.png" /> Perrin Sequence :
                                    </div>
                                        
                                </div>
                                <div class="col-lg-12 text-center h5"><?=($_SESSION['perrinRank']=='<2')?'Votre rang chez The Perrin Sequence est inférieur à 2':'Votre rang chez The Perrin Sequence est : ' . $_SESSION['perrinRank']?></div>    
                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-left">
                                        <img class="img-fluid" src="../assets/Images/smalllokaicon.png" /> The New Loka :
                                    </div>
                                        
                                </div>
                                <div class="col-lg-12 text-center h5"><?=($_SESSION['lokaRank']=='<2')?'Votre rang chez New Loka est inférieur à 2':'Votre rang chez New Loka est : ' . $_SESSION['lokaRank']?></div>
                                <div class="rem"></div>

                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="updateView.php" class="mx-auto"><button type="button" class="btn btn-dark text-light">Modifier mes infos</button></a>
                                </div>

                                <div class="rem"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="passwordChange" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Changer de mot de passe
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" data-parent="#content" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <form method="POST" class="bg-dark w-100 mx-auto" action="UsersInfosView.php">
                                
                                <fieldset class="bg-dark text-light mb-3">
                                    <div class="rem"></div>
                                    <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="oldPassword">Mot de passe à modifier : </label>
                                            <input type="password" class="form-control" id="oldPassword" name="oldPassword" value="" required />
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                        
                                        <div class="row no-gutters w-100">
                                            <div class="text-danger mx-auto" id="oldPasswordError"></div>
                                        </div>

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="newPassword">Nouveau mot de passe : </label>
                                            <input type="password" class="form-control" id="newPassword" name="newPassword" required />
                                        </div>
                                        <div class="form-group col-lg-3"></div>

                                        <div class="row no-gutters w-100">
                                            <div class="text-danger mx-auto" id="newPasswordError"></div>
                                        </div>

                                        <div class="form-group col-lg-3"></div>                   
                                        <div class="form-group col-lg-6">
                                            <label for="confirmNewPassword">Confirmer votre nouveau mot de passe : </label>
                                            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required/>
                                        </div>
                                        <div class="form-group col-lg-3"></div>

                                        <div class="row no-gutters w-100">
                                            <div class="text-danger mx-auto" id="confirmNewPasswordError"></div>
                                        </div>                                                                    
                                    </div>
                                    
                                </fieldset>

                                <div class="align-items-center justify-content-center d-flex">
                                    <button name="submitModifButton" id="submitModifButton" value="submitOn" type="submit" class="btn btn-light text-dark mb-3">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="deleteAccount" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                    <div class="card-header" role="tab" id="heading-C">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
                                Supprimer mon compte
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-C" class="collapse" role="tabpanel" data-parent="#content" aria-labelledby="heading-C">
                        <div class="card-body">
                            <form method="POST" class="bg-dark w-100 mx-auto" action="UsersInfosView.php">
                                
                                <fieldset class="bg-dark text-light mb-3">
                                    <div class="rem"></div>
                                    <p class="text-danger font-weight-bold h4 text-center">ATTENTION!!!! Vous vous apprêtez à supprimer votre compte sur warfriends. Êtes-vous certain de vouloir supprimer votre compte ? Ceci entrainera la perte de toutes vos données sur le site. Pour supprimer votre compte entrez votre mot de passe ci-dessous</p>
                                    <div class="rem"></div>
                                    <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="deletePassword">Mot de passe : </label>
                                            <input type="password" class="form-control" id="deletePassword" name="deletePassword" value="" required />
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                    </div>
                                </fieldset>
                                <div class="align-items-center justify-content-center d-flex">
                                    <button name="submitDeleteButton" id="submitDeleteButton" value="submitOn" type="submit" class="btn btn-light text-dark mb-3">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/scripts/modifPasswordAjax.js"></script>
</body>

</html>