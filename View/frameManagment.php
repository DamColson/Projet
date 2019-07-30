<?php
session_start();
require_once '../Controllers/adminController.php';
require_once '../Controllers/disconnect.php';
require_once '../Controllers/frameController.php';
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
        
        <form class="text-center" action="frameManagment.php" method="GET">
            <label class="text-light" for="frameSearch">Chercher une frame : </label>
            <input type="search" name="frameSearch" id="frameSearch" />
            <button class="btn text-light" type="submit"><i class="fas fa-search"></i></button>
        </form>
        
        <div class="rem"></div>
        
        <div class="container">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#infos" class="nav-link active" data-toggle="tab" role="tab">Informations de la frame</a>
                </li>
                <li class="nav-item">
                    <a id="tab-D" href="#syndicateView" class="nav-link" data-toggle="tab" role="tab">Modifier la frame</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#passwordChange" class="nav-link" data-toggle="tab" role="tab">Supprimer la frame</a>
                </li>
                <li class="nav-item">
                    <a id="tab-C" href="#deleteAccount" class="nav-link" data-toggle="tab" role="tab">Ajouter une nouvelle frame</a>
                </li>
                
            </ul>

 
            <div id="content" class="tab-content" role="tablist">
                <div id="infos" class="card accordCard tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header accordCardHeader" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <!-- Note: `data-parent` removed from here -->
                            <a class="text-dark" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                Informations de la frame
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
                                        Id de la frame :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $newFrame->id ?>
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 font-weight-bold h5 text-center">
                                        Nom de la frame :
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                <div class="text-dark row no-gutters">
                                    <div class="col-lg-3"></div>
                                    <div class="col-12 col-lg-6 h5 text-center">
                                        <?= $newFrame->name ?>
                                    </div>
                                    <div class="col-lg-3"></div>    
                                </div>

                                

                                <div class="rem"></div>

                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="updateView.php" class="mx-auto"><button type="button" class="btn btn-outline-success my-2 my-sm-0">Modifier mes infos</button></a>
                                </div>

                                <div class="rem"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="syndicateView" class="card accordCard tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                    <div class="card-header accordCardHeader" role="tab" id="heading-D">
                        <h5 class="mb-0">
                            <a class="collapsed text-dark" data-toggle="collapse" href="#collapse-D" aria-expanded="false" aria-controls="collapse-D">
                                Modifier la frame
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-D" class="collapse accordCardCollapse" role="tabpanel" data-parent="#content" aria-labelledby="heading-D">
                        <div class="card-body accordCardBody">
                            <form method="POST" class="w-100 mx-auto" action="frameManagment.php?frameSearch=<?= $newFrame->name ?>">
                                
                                <fieldset class="text-dark mb-3">
                                    <div class="rem"></div>
                                    
                                    
                                    <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="newFrameName">Nom de la frame : </label>
                                            <input type="text" class="form-control" id="newFrameName" name="newFrameName" value="<?= $newFrame->name ?>" required />
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                    </div>
                                </fieldset>
                                <div class="align-items-center justify-content-center d-flex">
                                    <button name="submitUpdateFrameButton" id="submitUpdateFrameButton" value="submitOn" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div id="passwordChange" class="card accordCard tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header accordCardHeader" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed text-dark" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Supprimer la frame
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse accordCardCollapse" data-parent="#content" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body accordCardBody">
                            <form method="POST" class="w-100 mx-auto" action="UsersInfosView.php">
                                
                                <fieldset class="dark mb-3">
                                    <div class="rem"></div>
                                    <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

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
                                    <button name="submitDeleteFrameButton" id="submitDeleteFrameButton" value="submitOn" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Envoyer</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div id="deleteAccount" class="card accordCard tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                    <div class="card-header accordCardHeader" role="tab" id="heading-C">
                        <h5 class="mb-0">
                            <a class="collapsed text-dark" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">
                                Ajouter une nouvelle frame
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-C" class="collapse accordCardCollapse" role="tabpanel" data-parent="#content" aria-labelledby="heading-C">
                        <div class="card-body accordCardBody">
                            <form method="POST" class="w-100 mx-auto" action="UsersInfosView.php">
                                
                                <fieldset class="text-dark mb-3">
                                    <div class="rem"></div>
                                    
                                    <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="createNewFrame">Nom de la frame : </label>
                                            <input type="text" class="form-control" id="createNewFrame" name="createNewFrame" value="" required />
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                    </div>
                                </fieldset>
                                <div class="align-items-center justify-content-center d-flex">
                                    <button name="submitDeleteButton" id="submitDeleteButton" value="submitOn" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php 
include 'footerView.php';?>



    <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../assets/scripts/modifPasswordAjax.js"></script>
</body>

</html>