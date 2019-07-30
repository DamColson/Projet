<?php
session_start();
require '../Controllers/updateController.php';
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
                <div id="updatePersonalInfos" class="card accordCard tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header accordCardHeader" role="tab" id="heading-A">
                        <h5 class="mb-0">

                            <a data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">
                                Modifier mes informations personnelles
                            </a>
                        </h5>
                    </div>


                    <div id="collapse-A" class="collapse accordCardCollapse show" data-parent="#content" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body accordCardBody">
                            <form method="POST" class="w-100 mx-auto" action="updateView.php" id="updateForm">
                                <p class="h3 text-dark mb-3 text-center">Vos informations personnelles</p>
                                <fieldset class="mb-3">
                                    <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

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
                                            <label for="newFavArmor">Quelle est votre warframe favorite : </label>
                                            <select class="form-control" id="newFavArmor" name="newFavArmor">
                                                
                                                
                                                    <?php
                                                    foreach ($frame as $key => $frameName):
                                                        ?><option value ="<?= $key ?>" <?= ($_SESSION['id_wfd_Armors'] == $key) ? 'selected' : ''; ?>><?= $frameName ?></option>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                        
                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="newShowDiscord">Souhaitez rendre visible votre tag discord ? : </label>
                                            <input type="radio" class="ml-1" id="newShowDiscord" name="newShowDiscord" value="Yes"  />Oui
                                            <input type="radio" class="ml-1" id="newShowDiscord" name="newShowDiscord" value="No"  />Non
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                                                              
                                        <div class="form-group col-lg-3"></div>
                                        <div class="form-group col-lg-6">
                                            <label for="newShowMail">Souhaitez rendre visible votre adresse email ? : </label>
                                            <input type="radio" class="ml-1" id="newShowMail" name="newShowMail" value="Yes"  />Oui
                                            <input type="radio" class="ml-1" id="newShowMail" name="newShowMail" value="No"  />Non
                                        </div>
                                        <div class="form-group col-lg-3"></div>
                                    </div>

                                </fieldset>

                                <div class="align-items-center justify-content-center d-flex">
                                    <a href="UsersInfosView.php"><button type="button" class="btn btn-outline-success my-2 my-sm-0 mr-3 mb-3">Retour</button></a>
                                    <button name="submitUpdateInfosButton" id="submitUpdateInfosButton" value="submitOn" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Valider</button>
                                </div>
                            </form>
                            
                             <?php

                             if($errorInUpdateInfos == $updateInfosValidation && !empty($_POST)):
                                  
        ?><script>

                Swal.fire({
                    title: 'Félicitation!',
                    text: 'Vos informations personnelles ont été mises à jour.',
                    type: 'success',
                    confirmButtonText: 'Fermer'
                }); 
                setTimeout(function () {
                    
       document.location.href='updateView.php'; //will redirect to your blog page (an ex: blog.html)
    }, 1000); //will call the function after 2 secs.
       </script><?php
    endif;
    
    ?>
                        </div>
                    </div>
                </div>

                <div id="updateSyndicate" class="card accordCard tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header accordCardHeader" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Mettre à jour mes syndicats
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse accordCardCollapse" data-parent="#content" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body accordCardBody">
                           
                            <form method="POST" class="mx-auto" action="updateView.php" id="updateSyndicatesForm">

                                
                                <div class="w-75 mx-auto rounded">
                                    <p class="h3 text-dark mb-3 text-center">Les rangs de mes syndicats : </p>
                                    <div class="rem"></div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallsteelicon.png" /><span class="font-weight-bold">Steel Meridian : </span>
                                            <div class="text-center">
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><input type="radio" class="ml-3" id="meridianRank" name="meridianRank" value="<?=$value?>" <?= ($_SESSION['meridianRank'] == $value) ? 'checked' : ''; ?> /><?= $value ?>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>                          

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallarbitericon.png" /><span class="font-weight-bold">Arbiter Of Hexis : </span>
                                                <div class="text-center">
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><input type="radio" class="ml-3" id="arbiterRank" name="arbiterRank" value ="<?=$value?>" <?= ($_SESSION['arbiterRank'] == $value) ? 'checked' : ''; ?> /><?= $value ?>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                                </div>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>                   

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallcephalonicon.png" /><span class="font-weight-bold">Cephalon Suda : </span>
                                                <div class="text-center">
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><input type="radio" class="ml-3" id="cephalonRank" name="cephalonRank" value ="<?=$value?>" <?= ($_SESSION['cephalonRank'] == $value) ? 'checked' : ''; ?> /><?= $value ?>
                                                        <?php
                                                    endforeach; 
                                                    ?> 
                                                </div>        
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallredveilicon.png" /><span class="font-weight-bold">The Red Veil : </span>
                                                <div class="text-center">
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><input type="radio" class="ml-3" id="redVeilRank" name="redVeilRank" value ="<?=$value?>" <?= ($_SESSION['redVeilRank'] == $value) ? 'checked' : ''; ?> /><?= $value ?>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                                </div>        
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smallperrinsequenceicon.png" /><span class="font-weight-bold">Perrin Sequence : </span>
                                            <div class="text-center">   
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><input type="radio" class="ml-3" id="perrinRank" name="perrinRank" value ="<?=$value?>" <?= ($_SESSION['perrinRank'] == $value) ? 'checked' : ''; ?> /><?= $value ?>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </div>            
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="text-dark row no-gutters">
                                        <div class="col-lg-3"></div>
                                        <div class="col-12 col-lg-6 h5 text-left">
                                            <img class="img-fluid" src="../assets/Images/smalllokaicon.png" /><span class="font-weight-bold">The New Loka : </span>
                                            <div class="text-center">
                                                    <?php
                                                    foreach ($updateRank as $value):
                                                        ?><input class="ml-3" type="radio" id="lokaRank" name="lokaRank" value ="<?=$value?>" <?= ($_SESSION['lokaRank'] == $value) ? 'checked' : ''; ?> /><?= $value ?>
                                                        <?php
                                                    endforeach;
                                                    ?> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3"></div>    
                                    </div>

                                    <div class="rem"></div>
                                    
                                    <div class="align-items-center justify-content-center d-flex">
                                        
                                        <a href="UsersInfosView.php"><button type="button" class="btn btn-outline-success my-2 my-sm-0 mr-3 mb-3">Retour</button></a>
                                    
                                        <button name="submitUpdateRankButton" id="submitUpdateRankButton" value="submitOn" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Valider</button>
                                    </div>

                                    <div class="rem"></div>
                                </div>
                                <div class="rem"></div>
                            </form>
                            
                            <?php if($errorInUpdateInfos == $updateInfosValidation && $_POST['submitUpdateRankButton']):

        ?><script>Swal.fire({
                    title: 'Félicitation!',
                    text: 'Votre informations ont été mise à jour.',
                    type: 'success',
                    confirmButtonText: 'Fermer'
                });
                
           setTimeout(function () {
                    
       document.location.href='updateView.php'; //will redirect to your blog page (an ex: blog.html)
    }, 2000); //will call the function after 2 secs.
                    
       </script><?php
          
    endif;
    ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
<?php include 'footerView.php';?>
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/updatePersonnalInfos.js"></script>
    </body>    
</html>