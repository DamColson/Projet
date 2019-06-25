<?php
include 'file.php';
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Germania+One" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/form.css">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <title>warFriendsForm</title>
    </head>

    <body class="font-family-germania">
        <?php
        include 'header.php';
        ?>
        <form method="POST" class="bg-dark w-75 mx-auto" action="index.php" id="inscriptionForm">
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
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-4"><label for="birthday">Date de Naissance : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-3">
                        <input type="text" class="form-control" id="birthday" name="birthday" placeholder="birthday" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                    <div id="birthdayError" class="text-danger mx-auto"></div>
                    </div>
                    <div class="form-group col-lg-1"></div>                   
                    <div class="form-group col-lg-4 mt-2"><label for="discord">Tag Discord : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="text" class="form-control" id="discord" name="discord" placeholder="Tag Discord" />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                    <div id="discordError" class="text-danger mx-auto"></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="mail">Email : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Votre Email" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                    <div id="mailError" class="text-danger mx-auto"></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="password">Votre mot de passe : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Une maj, un chiffre, min 8 caract" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                    <div id="passwordError" class="text-danger mx-auto"></div>
                    </div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="confirmPassword">Confirmez votre mot de passe : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="row no-gutters w-100">
                    <div id="confirmPasswordError" class="text-danger mx-auto"></div>
                    </div>
                </div>
                    
            </fieldset>
            <p class="h3 text-light mb-3 text-center">Vos informations relatives à Warframe</p>
            <fieldset class="bg-dark text-light mb-3">
                <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">
                    <div class="form-group col-lg-4"></div>
                    <div class="form-group col-11 col-lg-5">
                        <label for="warframePseudo">Votre pseudo Warframe : </label>
                        <input type="text" class="form-control" id="warframePseudo" name="warframePseudo" placeholder="Nom" required />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-4"></div>
                    <div class="form-group col-11 col-lg-5">
                        <label for="favArmor">Quelle est votre armure favorite : </label>
                        <select class="form-control" id="favArmor" name="favArmor">
                            <option selected>Aucune en particulier</option>
                            <optgroup label="Armures classiques">
                               <?php 
                                foreach($armor as $armorName):
                                    ?><option><?= $armorName ?></option>
                                    <?php
                                endforeach;
                                ?> 
                            </optgroup>
                            <optgroup label="Armures primes">
                               <?php 
                                foreach($primeArmor as $armorName):
                                    ?><option><?= $armorName ?></option>
                                    <?php
                                endforeach;
                                ?> 
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <div class="row no-gutters w-100">
                    <div id="favArmorError" class="text-danger mx-auto"></div>
                    </div>
                    <div class="form-group col-lg-4"></div>
                    <div class="form-group col-lg-5 mx-auto"><p class="h4 text-center">Etes vous rang 2 ou plus avec :</p></div>
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Steel Meridian : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-5">
                        <label for="steelMeridianRadioOn">Oui</label>
                        <input type="radio" id="steelMeridianRadioOn" name="steelMeridianRadio" value="on" />
                        <label for="steelMeridianRadioOff">Non</label>
                        <input type="radio" id="steelMeridianRadioOff" name="steelMeridianRadio" value="off" />
                    </div>
                    <div class="form-group col-lg-3"></div>        
                    </div>
                    
                    <div class="row w-100">
                    <div class="form-group col-lg-3"></div>    
                    <div class="form-group col-11 col-lg-3">
                        <label for="steelMeridianRank" id="steelMeridianRankLabel">Rang : </label>
                        <select class="form-control" id="steelMeridianRank" name="steelMeridianRank">
                            <option selected disabled></option>
                                <?php 
                                foreach($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                        </select>    
                    </div>
                    <div class="form-group col-11 col-lg-3">
                        <label for="steelMeridianStanding" id="steelMeridianStandingLabel">Votre standing : </label>
                        <input type="text" class="form-control" id="steelMeridianStanding" name="steelMeridianStanding" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row no-gutters w-100">
                        <div id="steelMeridianError" class="text-danger mx-auto"><span id="steelMeridianRankError" class="text-danger mx-auto"></span><span id="steelMeridianStandingError" class="text-danger mx-auto" ></span></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Arbiter Of Hexis : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-5">
                        <label for="arbiterRadioOn">Oui</label>
                        <input type="radio" id="arbiterRadioOn" name="arbiterRadio" value="on"/>
                        <label for="arbiterRadioOff">Non</label>
                        <input type="radio" id="arbiterRadioOff" name="arbiterRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row w-100">
                    <div class="form-group col-lg-3"></div>    
                    <div class="form-group col-11 col-lg-3">
                        <label for="arbiterRank" id="arbiterRankLabel">Rang : </label>
                        <select class="form-control" id="arbiterRank" name="arbiterRank">
                            <option selected disabled></option>
                                <?php 
                                foreach($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                        </select>    
                    </div>

                    <div class="form-group col-11 col-lg-3">
                        <label for="arbiterStanding" id="arbiterStandingLabel">Votre standing : </label>
                        <input type="text" class="form-control" id="arbiterStanding" name="arbiterStanding" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row no-gutters w-100">
                        <div id="arbiterError" class="text-danger mx-auto"><span id="arbiterRankError" class="text-danger mx-auto"></span><span id="arbiterStandingError" class="text-danger mx-auto" ></span></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Cephalon Suda : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-5">
                        <label for="cephalonRadioOn">Oui</label>
                        <input type="radio" id="cephalonRadioOn" name="cephalonRadio" value="on"/>
                        <label for="cephalonRadioOff">Non</label>
                        <input type="radio" id="cephalonRadioOff" name="cephalonRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row w-100">
                    <div class="form-group col-lg-3"></div>    
                    <div class="form-group col-11 col-lg-3">
                        <label for="cephalonRank" id="cephalonRankLabel">Rang : </label>
                        <select class="form-control" id="cephalonRank" name="cephalonRank">
                            <option selected disabled></option>
                                <?php 
                                foreach($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                        </select>    
                    </div>
                    <div class="form-group col-11 col-lg-3">
                        <label for="cephalonStanding" id="cephalonStandingLabel">Votre standing : </label>
                        <input type="text" class="form-control" id="cephalonStanding" name="cephalonStanding" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row no-gutters w-100">
                        <div id="cephalonError" class="text-danger mx-auto"><span id="cephalonRankError" class="text-danger mx-auto"></span><span id="cephalonStandingError" class="text-danger mx-auto" ></span></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">The Perrin Sequence : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-5">
                        <label for="perrinRadioOn">Oui</label>
                        <input type="radio" id="perrinRadioOn" name="perrinRadio" value="on"/>
                        <label for="perrinRadioOff">Non</label>
                        <input type="radio" id="perrinRadioOff" name="perrinRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row w-100">
                    <div class="form-group col-lg-3"></div>    
                    <div class="form-group col-11 col-lg-3">
                        <label for="perrinRank" id="perrinRankLabel">Rang : </label>
                        <select class="form-control" id="perrinRank" name="perrinRank">
                            <option selected disabled></option>
                                <?php 
                                foreach($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                        </select>    
                    </div>
                    <div class="form-group col-11 col-lg-3">
                        <label for="perrinStanding" id="perrinStandingLabel">Votre standing : </label>
                        <input type="text" class="form-control" id="perrinStanding" name="perrinStanding" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row no-gutters w-100">
                        <div id="perrinError" class="text-danger mx-auto"><span id="perrinRankError" class="text-danger mx-auto"></span><span id="perrinStandingError" class="text-danger mx-auto" ></span></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Red Veil : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-5">
                        <label for="redVeilRadioOn">Oui</label>
                        <input type="radio" id="redVeilRadioOn" name="redVeilRadio" value="on"/>
                        <label for="redVeilRadioOff">Non</label>
                        <input type="radio" id="redVeilRadioOff" name="redVeilRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row w-100">
                    <div class="form-group col-lg-3"></div>    
                    <div class="form-group col-11 col-lg-3">
                        <label for="redVeilRank" id="redVeilRankLabel">Rang : </label>
                        <select class="form-control" id="redVeilRank" name="redVeilRank">
                            <option selected disabled></option>
                                <?php 
                                foreach($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                        </select>    
                    </div>
                    <div class="form-group col-11 col-lg-3">
                        <label for="redVeilStanding" id="redVeilStandingLabel">Votre standing : </label>
                        <input type="text" class="form-control" id="redVeilStanding" name="redVeilStanding" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row no-gutters w-100">
                        <div id="redVeilError" class="text-danger mx-auto"><span id="redVeilRankError" class="text-danger mx-auto"></span><span id="redVeilStandingError" class="text-danger mx-auto" ></span></div>
                    </div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">New Loka : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-5">
                        <label for="newLokaRadioOn">Oui</label>
                        <input type="radio" id="newLokaRadioOn" name="newLokaRadio" value="on"/>
                        <label for="newLokaRadioOff">Non</label>
                        <input type="radio" id="newLokaRadioOff" name="newLokaRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row w-100">
                    <div class="form-group col-lg-3"></div>    
                    <div class="form-group col-11 col-lg-3">
                        <label for="newLokaRank" id="newLokaRankLabel">Rang : </label>
                        <select class="form-control" id="newLokaRank" name="newLokaRank">
                            <option selected disabled></option>
                                <?php 
                                foreach($rank as $rankStage):
                                    ?><option><?= $rankStage ?></option>
                                    <?php
                                endforeach;
                                ?>
                        </select>    
                    </div>
                    <div class="form-group col-11 col-lg-3">
                        <label for="newLokaStanding" id="newLokaStandingLabel">Votre standing : </label>
                        <input type="text" class="form-control" id="newLokaStanding" name="newLokaStanding" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    </div>
                    <div class="row no-gutters w-100">
                        <div id="newLokaError" class="text-danger mx-auto"><span id="newLokaRankError" class="text-danger mx-auto"></span><span id="newLokaStandingError" class="text-danger mx-auto" ></span></div>
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
        <script src="assets/scripts/Projet.js"></script>
        <?php
          
          
    ?>
    </body>    
</html>