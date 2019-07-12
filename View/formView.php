<?php
require '../Controllers/formController.php';
$linkIndex = '../index.php';
$linkAccount = 'accountView.php';
$linkFormView ='formView.php';

?>
<!DOCTYPE html>
<html lang="fr">

   <?php
   include 'headView.php';
   ?>

    <body class="font-family-germania">
        <?php
        include 'headerView.php';
        

        var_dump($_POST);
        var_dump($user);
        ?>
        <form method="POST" class="bg-dark w-75 mx-auto" action="formView.php" id="inscriptionForm">
            <p class="h3 text-light mb-3 text-center">Vos informations personnelles</p>
            <fieldset class="bg-dark text-light mb-3">
                <div class="row bg-light text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">
                    
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" required />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="birthday">Date de Naissance : </label>
                        <input type="date" class="form-control <?= (count($_POST)>0 && $errorInForm['birthday']==0)? 'redBorder':''?>" id="birthday" name="birthday" placeholder="birthday" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="birthdayError"><?= (count($_POST)>0 && $errorInForm['birthday']==0)? 'Date de naissance invalide.':''?></div>
                    </div>
                    
                    <div class="form-group col-lg-3"></div>                   
                    <div class="form-group col-lg-6">
                        <label for="discord">Tag Discord : </label>
                        <input type="text" class="form-control <?= (count($_POST)>0 && $errorInForm['discord']==0)? 'redBorder':''?>" id="discord" name="discord" placeholder="Tag Discord" />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="discordError"><?= (count($_POST)>0 && $errorInForm['discord']==0)? 'Tag discord invalide':''?></div>
                    </div>
                    
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="mail">Email : </label>
                        <input type="mail" class="form-control <?= (count($_POST)>0 && $errorInForm['mail']==0)? 'redBorder':''?>" id="mailo" name="mail" placeholder="Votre Email"  />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="mailoError"><?= (count($_POST)>0 && $errorInForm['mail']==0)? 'Adresse mail invalide.':''?></div>
                    </div>
                    
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="password">Votre mot de passe : </label>
                        <input type="password" class="form-control <?= (count($_POST)>0 && $errorInForm['password']==0)? 'redBorder':''?>" id="pass" name="password" placeholder="Une maj, un chiffre, min 8 caract" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="passError"><?= (count($_POST)>0 && $errorInForm['password']==0)? 'Mot de passe invalide,assurez vous qu\'il ait au minimum 8 caractères dont au moins une majsucule et un chiffre':''?></div>
                    </div>
                    
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="confirmPassword">Confirmez votre mot de passe : </label>
                        <input type="password" class="form-control <?= (count($_POST)>0 && $errorInForm['confirmPassword']==0)? 'redBorder':''?>" id="confirmPassword" name="confirmPassword" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="confirmPasswordError"><?= (count($_POST)>0 && $errorInForm['confirmPassword']==0)? 'Etes vous sur que ce mot de passe est le même que celui précédement renseigné? Possède t-il tout les prérequis attendus?':''?></div>
                    </div>
                    
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
                                foreach ($armor as $key=>$armorName):
                                    ?><option value ="<?=$key?>"><?= $armorName ?></option>
                                    <?php
                                    
                                endforeach;
                                ?> 
                            </optgroup>
                            <optgroup label="Armures primes">
                                <?php
                                foreach ($primeArmor as $key=>$armorName):
                                    ?><option value ="<?=$key?>"><?= $armorName ?></option>
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
                </div>

            </fieldset>
           
            <div class="align-items-center justify-content-center d-flex">
                <button name="submitFormButton" id="submitFormButton" value="submitOn" type="submit" class="btn btn-light text-dark mb-3">Envoyer</button>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>    
</html>