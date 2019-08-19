<?php
require_once '../Controllers/formController.php';
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

        <div class="rem"></div>
        <form method="POST" class="bg-light-opac w-75 mx-auto" action="formView.php" id="inscriptionForm">
            <div class="rem"></div>
            <p class="h3 text-dark mb-3 text-center">Vos informations personnelles</p>
            <fieldset class="mb-3">
                <div class="row text-dark rounded w-75 mx-auto text-center align-items-center justify-content-center no-gutters">

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="pseudo">Pseudo : </label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" required />
                    </div>
                    <div class="form-group col-lg-3"></div>
                    
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="pseudoError"></div>
                    </div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="birthday">Date de Naissance : </label>
                        <input type="date" class="form-control <?= (count($_POST) > 0 && $errorInForm['birthday'] == 0) ? 'redBorder' : '' ?>" id="birthday" name="birthday" placeholder="birthday" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="birthdayError"><?= (count($_POST) > 0 && $errorInForm['birthday'] == 0) ? 'Date de naissance invalide.' : '' ?></div>
                    </div>

                    <div class="form-group col-lg-3"></div>                   
                    <div class="form-group col-lg-6">
                        <label for="discord">Tag Discord : </label>
                        <input type="text" class="form-control <?= (count($_POST) > 0 && $errorInForm['discord'] == 0) ? 'redBorder' : '' ?>" id="discord" name="discord" placeholder="Tag Discord" />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="discordError"><?= (count($_POST) > 0 && $errorInForm['discord'] == 0) ? 'Tag discord invalide' : '' ?></div>
                    </div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="mail">Email : </label>
                        <input type="mail" class="form-control <?= (count($_POST) > 0 && $errorInForm['mail'] == 0) ? 'redBorder' : '' ?>" id="mailo" name="mail" placeholder="Votre Email"  />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="mailoError"><?= (count($_POST) > 0 && $errorInForm['mail'] == 0) ? 'Adresse mail invalide.' : '' ?></div>
                    </div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="password">Votre mot de passe : </label>
                        <input type="password" class="form-control <?= (count($_POST) > 0 && $errorInForm['password'] == 0) ? 'redBorder' : '' ?>" id="pass" name="password" placeholder="Une maj, un chiffre, min 8 caract" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="passError"><?= (count($_POST) > 0 && $errorInForm['password'] == 0) ? 'Mot de passe invalide,assurez vous qu\'il ait au minimum 8 caractères dont au moins une majsucule et un chiffre' : '' ?></div>
                    </div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="confirmPassword">Confirmez votre mot de passe : </label>
                        <input type="password" class="form-control <?= (count($_POST) > 0 && $errorInForm['confirmPassword'] == 0) ? 'redBorder' : '' ?>" id="confirmPassword" name="confirmPassword" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto" id="confirmPasswordError"><?= (count($_POST) > 0 && $errorInForm['confirmPassword'] == 0) ? 'Etes vous sur que ce mot de passe est le même que celui précédement renseigné? Possède t-il tout les prérequis attendus?' : '' ?></div>
                    </div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-11 col-lg-6">
                        <label for="warframePseudo">Votre pseudo Warframe : </label>
                        <input type="text" class="form-control" id="warframePseudo" name="warframePseudo" placeholder="Nom" required />
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-11 col-lg-6">
                        <label for="favArmor">Quelle est votre warframe favorite : </label>
                        <select class="form-control <?= (count($_POST) > 0 && $errorInForm['favArmor'] == 0) ? 'redBorder' : '' ?>" id="favArmor" name="favArmor">

                            
                                <?php
                                foreach ($frame as $key => $frameName):
                                    ?><option value ="<?= $key ?>"><?= $frameName ?></option>
                                    <?php
                                endforeach;
                                ?> 
                            
                        </select>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <div class="row no-gutters w-100">
                        <div class="text-danger mx-auto"><?= (count($_POST) > 0 && $errorInForm['favArmor'] == 0) ? 'Ceci n\'est pas une armure valide.' : '' ?></div>
                    </div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="showDiscord">Souhaitez rendre visible votre tag discord ? : </label>
                        <div>
                            <input type="radio" class="ml-1" id="showDiscord" name="showDiscord" value="Yes"  />Oui
                            <input type="radio" class="ml-1" id="showDiscord" name="showDiscord" value="No"  />Non
                        </div>
                    </div>
                    <div class="form-group col-lg-3"></div>

                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="showMail">Souhaitez rendre visible votre adresse email ? : </label>
                        <div>
                            <input type="radio" class="ml-1" id="showMail" name="showMail" value="Yes"  />Oui
                            <input type="radio" class="ml-1" id="showMail" name="showMail" value="No"  />Non
                        </div>
                    </div>
                    <div class="form-group col-lg-3"></div>
                </div>

            </fieldset>
            <div class="g-recaptcha mb-3" name="g-recaptcha-response" data-sitekey="6LeEprMUAAAAACAV_SQ0_5j-s_4TCZeYh3_V1Vp2"></div>
            <div class="align-items-center justify-content-center d-flex">
                <button name="submitFormButton" id="submitFormButton" value="submitOn" type="submit" class="btn btn-outline-success my-2 my-sm-0 mb-3">Envoyer</button>
            </div>
            <div class="rem"></div>
        </form>
        <?php if ($errorInForm == $formValidation && !empty($_POST) && $pseudoPresence[0]['pseudoPresence'] == 0  && $discordPresence[0]['discordPresence'] == 0  && $mailPresence[0]['mailPresence'] == 0 && $decode['success'] == true):
            
            ?><script>Swal.fire({
                    title: 'Félicitation!',
                    text: 'Votre inscription est validée, bienvenue sur Warfriends',
                    type: 'success',
                    confirmButtonText: 'Fermer'
                });

                setTimeout(function () {

                    document.location.href = '../index.php'; 
                }, 1500); //will call the function after 1,5 secs.</script><?php
                elseif(($errorInForm != $formValidation && !empty($_POST)) || (!empty($_POST) && $decode['success'] != true)):
                    ?><script>Swal.fire({
                    title: 'Echec!',
                    text: 'Formulaire invalide',
                    type: 'error',
                    confirmButtonText: 'Fermer'
                });

                setTimeout(function () {

                    document.location.href = 'formView.php'; 
                }, 1500); //will call the function after 1,5 secs.</script><?php
                elseif($pseudoPresence[0]['pseudoPresence'] == 1 || $discordPresence[0]['discordPresence'] == 1 || $mailPresence[0]['mailPresence'] == 1):
                    ?><script>Swal.fire({
                    title: 'Echec!',
                    text: 'Formulaire invalide',
                    type: 'error',
                    confirmButtonText: 'Fermer'
                });

                setTimeout(function () {

                    document.location.href = 'formView.php'; 
                }, 1500); //will call the function after 1,5 secs.</script><?php
                
        endif;
        ?>
        <div class="rem"></div>
        <?php include 'footerView.php'; ?>
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>    
</html>