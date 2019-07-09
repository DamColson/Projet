<?php
require '../Controllers/formController.php';
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Germania+One" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/form.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title>warFriendsForm</title>
    </head>

    <body class="font-family-germania">
        <?php
        include 'headerView.php';
        var_dump(dateFR('2019-07-11'));
        var_dump($errorInForm);
        ?>
        <form method="POST" class="bg-dark w-75 mx-auto" action="formView.php" id="inscriptionForm">
            <p class="h3 text-light mb-3 text-center">Vos informations personnelles</p>
            <fieldset class="bg-dark text-light mb-3">
                <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-4"><label for="pseudo">Pseudo : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-3">
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-4"><label for="birthday">Date de Naissance : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-3">
                        <input type="date" class="form-control <?= (count($_POST)>0 && $errorInForm['birthday']==0)? 'redBorder':''?>" id="birthday" name="birthday" placeholder="birthday" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="birthdayError"><?= (count($_POST)>0 && $errorInForm['birthday']==0)? 'Date de naissance invalide.':''?></div>
                    </div>
                    <div class="form-group col-lg-1"></div>                   
                    <div class="form-group col-lg-4 mt-2"><label for="discord">Tag Discord : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="text" class="form-control <?= (count($_POST)>0 && $errorInForm['discord']==0)? 'redBorder':''?>" id="discord" name="discord" placeholder="Tag Discord" />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="discordError"><?= (count($_POST)>0 && $errorInForm['discord']==0)? 'Tag discord invalide':''?></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="mail">Email : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="mail" class="form-control <?= (count($_POST)>0 && $errorInForm['mail']==0)? 'redBorder':''?>" id="mail" name="mail" placeholder="Votre Email" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="mailError"><?= (count($_POST)>0 && $errorInForm['mail']==0)? 'Adresse mail invalide.':''?></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="password">Votre mot de passe : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="password" class="form-control <?= (count($_POST)>0 && $errorInForm['password']==0)? 'redBorder':''?>" id="password" name="password" placeholder="Une maj, un chiffre, min 8 caract" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="passwordError"><?= (count($_POST)>0 && $errorInForm['password']==0)? 'Mot de passe invalide,assurez vous qu\'il ait au minimum 8 caractères dont au moins une majsucule et un chiffre':''?></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="confirmPassword">Confirmez votre mot de passe : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="password" class="form-control <?= (count($_POST)>0 && $errorInForm['confirmPassword']==0)? 'redBorder':''?>" id="confirmPassword" name="confirmPassword" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="confirmPasswordError"><?= (count($_POST)>0 && $errorInForm['confirmPassword']==0)? 'Ne correspond pas au mot de passe précédement renseigné.':''?></div>
                    </div>
                </div>

            </fieldset>
            <p class="h3 text-light mb-3 text-center">Vos informations relatives à Warframe</p>
            <fieldset class="bg-dark text-light mb-3">
                <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-11 col-lg-6">
                        <label for="warframePseudo">Votre pseudo Warframe : </label>
                        <input type="text" class="form-control" id="warframePseudo" name="warframePseudo" placeholder="Nom" required />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-11 col-lg-6">
                        <label for="favArmor">Quelle est votre armure favorite : </label>
                        <select class="form-control <?= (count($_POST)>0 && $errorInForm['favArmor']==0)? 'redBorder':''?>" id="favArmor" name="favArmor">
                            <option value="All" selected>Aucune en particulier</option>
                            <optgroup label="Armures classiques">
                                <?php
                                foreach ($armor as $armorName):
                                    ?><option><?= $armorName ?></option>
                                    <?php
                                endforeach;
                                ?> 
                            </optgroup>
                            <optgroup label="Armures primes">
                                <?php
                                foreach ($primeArmor as $armorName):
                                    ?><option><?= $armorName ?></option>
                                    <?php
                                endforeach;
                                ?> 
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['favArmor']==0)? 'Ceci n\'est pas une armure valide.':''?></div>
                    </div>
                    <div class="form-group col-lg-4"></div>
                    <div class="form-group col-lg-4 mx-auto"><p class="h4 text-center">Etes vous rang 2 ou plus avec :</p></div>
                    <div class="form-group col-lg-4"></div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Steel Meridian : </p></div>
                    <div class="row w-100">
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="steelMeridianRadioOn">Oui</label>
                            <input type="radio" id="steelMeridianRadioOn" name="steelMeridianRadio" value="on" />
                            <label for="steelMeridianRadioOff">Non</label>
                            <input type="radio" id="steelMeridianRadioOff" name="steelMeridianRadio" value="off" />
                        </div>
                        <div class="form-group col-lg-3"></div>        
                    </div>

                    
                        <div class="form-group col-lg-3"></div>    
                        <div class="form-group col-11 col-lg-6">
                            <label for="steelMeridianRank" id="steelMeridianRankLabel">Rang : </label>
                            <select class="form-control <?= (count($_POST)>0 && $errorInForm['StMe']==0)? 'redBorder':''?>" id="steelMeridianRank" name="steelMeridianRank">
                                <option selected></option>
                                <?php
                                foreach ($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>    
                        </div>

                        <div class="form-group col-lg-3"></div>
                    
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['StMe']==0)? 'Ceci n\'est pas un rang valide':''?></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Arbiter Of Hexis : </p></div>
                    <div class="row w-100">
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="arbiterRadioOn">Oui</label>
                            <input type="radio" id="arbiterRadioOn" name="arbiterRadio" value="on"/>
                            <label for="arbiterRadioOff">Non</label>
                            <input type="radio" id="arbiterRadioOff" name="arbiterRadio" value="off"/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                    </div>
                   
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="arbiterRank" id="arbiterRankLabel">Rang : </label>
                            <select class="form-control <?= (count($_POST)>0 && $errorInForm['AoH']==0)? 'redBorder':''?>" id="arbiterRank" name="arbiterRank">
                                <option selected></option>
                                <?php
                                foreach ($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>    
                        </div>


                        <div class="form-group col-lg-3"></div>
                   
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['AoH']==0)? 'Ceci n\'est pas un rang valide':''?></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Cephalon Suda : </p></div>
                    <div class="row w-100">
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="cephalonRadioOn">Oui</label>
                            <input type="radio" id="cephalonRadioOn" name="cephalonRadio" value="on"/>
                            <label for="cephalonRadioOff">Non</label>
                            <input type="radio" id="cephalonRadioOff" name="cephalonRadio" value="off"/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                    </div>
                    
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="cephalonRank" id="cephalonRankLabel">Rang : </label>
                            <select class="form-control <?= (count($_POST)>0 && $errorInForm['CeSu']==0)? 'redBorder':''?>" id="cephalonRank" name="cephalonRank">
                                <option selected></option>
                                <?php
                                foreach ($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>    
                        </div>

                        <div class="form-group col-lg-3"></div>
                    
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['CeSu']==0)? 'Ceci n\'est pas un rang valide':''?></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">The Perrin Sequence : </p></div>
                    <div class="row w-100">
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="perrinRadioOn">Oui</label>
                            <input type="radio" id="perrinRadioOn" name="perrinRadio" value="on"/>
                            <label for="perrinRadioOff">Non</label>
                            <input type="radio" id="perrinRadioOff" name="perrinRadio" value="off"/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                    </div>
                    
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="perrinRank" id="perrinRankLabel">Rang : </label>
                            <select class="form-control <?= (count($_POST)>0 && $errorInForm['ThPeSe']==0)? 'redBorder':''?>" id="perrinRank" name="perrinRank">
                                <option selected></option>
                                <?php
                                foreach ($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>    
                        </div>

                        <div class="form-group col-lg-3"></div>
                   
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['ThPeSe']==0)? 'Ceci n\'est pas un rang valide':''?></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Red Veil : </p></div>
                    <div class="row w-100">
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="redVeilRadioOn">Oui</label>
                            <input type="radio" id="redVeilRadioOn" name="redVeilRadio" value="on"/>
                            <label for="redVeilRadioOff">Non</label>
                            <input type="radio" id="redVeilRadioOff" name="redVeilRadio" value="off"/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                    </div>
                
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="redVeilRank" id="redVeilRankLabel">Rang : </label>
                            <select class="form-control <?= (count($_POST)>0 && $errorInForm['ReVe']==0)? 'redBorder':''?>" id="redVeilRank" name="redVeilRank">
                                <option selected></option>
                                <?php
                                foreach ($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>    
                        </div>

                        <div class="form-group col-lg-3"></div>
                    
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['ReVe']==0)? 'Ceci n\'est pas un rang valide':''?></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">New Loka : </p></div>
                    <div class="row w-100">
                        <div class="form-group col-lg-3"></div>    
                        <div class="mx-auto form-group col-11 col-lg-6">
                            <label for="newLokaRadioOn">Oui</label>
                            <input type="radio" id="newLokaRadioOn" name="newLokaRadio" value="on"/>
                            <label for="newLokaRadioOff">Non</label>
                            <input type="radio" id="newLokaRadioOff" name="newLokaRadio" value="off"/>
                        </div>
                        <div class="form-group col-lg-3"></div>
                    </div>
                  
                        <div class="form-group col-lg-3"></div>    
                        <div class="form-group col-11 col-lg-6">
                            <label for="newLokaRank" id="newLokaRankLabel">Rang : </label>
                            <select class="form-control <?= (count($_POST)>0 && $errorInForm['NeLo']==0)? 'redBorder':''?>" id="newLokaRank" name="newLokaRank">
                                <option selected></option>
                                <?php
                                foreach ($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>    
                        </div>

                        <div class="form-group col-lg-3"></div>
                   
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST)>0 && $errorInForm['NeLo']==0)? 'Ceci n\'est pas un rang valide':''?></div>
                    </div>
                </div>
            </fieldset>
            <div class="align-items-center justify-content-center d-flex">
                <button id="submitFormButton" type="submit" class="btn btn-light text-dark mb-3">Envoyer</button>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>    
</html>