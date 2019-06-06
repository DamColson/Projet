<?php

$error = 0;
include 'regex.php';

if(isset($_POST['pseudo']) && isset($_POST['discord']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['warframePseudo']) && isset($_POST['steelMeridianRadio']) && isset($_POST['arbiterRadio']) && isset($_POST['cephalonRadio']) && isset($_POST['perrinRadio']) && isset($_POST['redVeilRadio']) && isset($_POST['newLokaRadio'])):

    if(!preg_match($regexDiscord,$_POST['discord'])):
        $error++;
    endif;
    if(!preg_match($regexMail,$_POST['mail'])):
        $error++;
    endif;
    if(!preg_match($regexPassword,$_POST['password'])):
        $error++;
    endif;
    if($_POST['password'] != $_POST['confirmPassword']):
        $error++;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['steelMeridianRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST('steelMeridianStanding'))):
            if($_POST['steelMeridianRank'] == 2 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['steelMeridianRank'] == 3 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['steelMeridianRank'] == 4 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['steelMeridianRank'] == 5 && ($_POST['steelMeridianStanding'] < 0 || $_POST['steelMeridianStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['arbiterRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST['arbiterStanding'])):
            if($_POST['arbiterRank'] == 2 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['arbiterRank'] == 3 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['arbiterRank'] == 4 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['arbiterRank'] == 5 && ($_POST['arbiterStanding'] < 0 || $_POST['arbiterStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['cephalonRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST('cephalonStanding'))):
            if($_POST['cephalonRank'] == 2 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['cephalonRank'] == 3 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['cephalonRank'] == 4 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['cephalonRank'] == 5 && ($_POST['cephalonStanding'] < 0 || $_POST['cephalonStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['perrinRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST['perrinStanding'])):
            if($_POST['perrinRank'] == 2 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['perrinRank'] == 3 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['perrinRank'] == 4 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['perrinRank'] == 5 && ($_POST['perrinStanding'] < 0 || $_POST['perrinStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['redVeilRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST['redVeilStanding'])):
            if($_POST['redVeilRank'] == 2 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['redVeilRank'] == 3 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['redVeilRank'] == 4 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['redVeilRank'] == 5 && ($_POST['redVeilStanding'] < 0 || $_POST['redVeilStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if(!preg_match($regexSyndicateRank,$_POST['newLokaRank'])):
        $error++;
    else:
        if(preg_match($regexSyndicateStanding,$_POST('newLokaStanding'))):
            if($_POST['newLokaRank'] == 2 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 44000)):
                $error++;    
            endif;
            if($_POST['newLokaRank'] == 3 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 70000)):
                $error++;    
            endif;
            if($_POST['newLokaRank'] == 4 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 99000)):
                $error++;    
            endif;
            if($_POST['newLokaRank'] == 5 && ($_POST['newLokaStanding'] < 0 || $_POST['newLokaStanding'] > 132000)):
                $error++;    
            endif;
        endif;
    endif;
    if($error == 0):
    ?><p class="text-light"><?= 'coucou'; ?></p>
    <?php
    var_dump($_POST);
    else:
    ?><p class="text-light"><?= $error; ?></p>
    <?php
    var_dump($_POST);
endif;
    else:
        echo 'Veuillez remplir le formulaire dans son intégralité';
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
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="discord">Tag Discord : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">

                        <input type="text" class="form-control" id="discord" name="discord" placeholder="Tag Discord" />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="mail">Email : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">

                        <input type="text" class="form-control" id="mail" name="mail" placeholder="Votre Email" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="password">Votre mot de passe : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">

                        <input type="password" class="form-control" id="password" name="password" placeholder="Une maj, un chiffre, min 8 caract" required />
                    </div>
                    <div class="form-group col-lg-2"></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-lg-4 mt-2"><label for="confirmPassword">Confirmez votre mot de passe : </label></div>
                    <div class="form-group col-lg-1"></div>
                    <div class="form-group col-11 col-lg-4 mt-2">

                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required />
                    </div>
                    <div class="form-group col-lg-2"></div></div>
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
                    <div class="form-group col-lg-4"><p class="h4">Etes vous rang 2 ou plus avec :</p></div>
                    <div class="form-group col-lg-4"></div>
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Steel Meridian : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-4">
                        <label for="steelMeridianRadioOn">Oui</label>
                        <input type="radio" id="steelMeridianRadioOn" name="steelMeridianRadio" value="on" />
                        <label for="steelMeridianRadioOff">Non</label>
                        <input type="radio" id="steelMeridianRadioOff" name="steelMeridianRadio" value="off" />
                    </div>
                    <div class="form-group col-lg-4"></div>
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
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Arbiter Of Hexis : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-4">
                        <label for="arbiterRadioOn">Oui</label>
                        <input type="radio" id="arbiterRadioOn" name="arbiterRadio" value="on"/>
                        <label for="arbiterRadioOff">Non</label>
                        <input type="radio" id="arbiterRadioOff" name="arbiterRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-4"></div>
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
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Cephalon Suda : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-4">
                        <label for="cephalonRadioOn">Oui</label>
                        <input type="radio" id="cephalonRadioOn" name="cephalonRadio" value="on"/>
                        <label for="cephalonRadioOff">Non</label>
                        <input type="radio" id="cephalonRadioOff" name="cephalonRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-4"></div>
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
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">The Perrin Sequence : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-4">
                        <label for="perrinRadioOn">Oui</label>
                        <input type="radio" id="perrinRadioOn" name="perrinRadio" value="on"/>
                        <label for="perrinRadioOff">Non</label>
                        <input type="radio" id="perrinRadioOff" name="perrinRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-4"></div>
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
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">Red Veil : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-4">
                        <label for="redVeilRadioOn">Oui</label>
                        <input type="radio" id="redVeilRadioOn" name="redVeilRadio" value="on"/>
                        <label for="redVeilRadioOff">Non</label>
                        <input type="radio" id="redVeilRadioOff" name="redVeilRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-4"></div>
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
                    <div class="form-group col-12 align-items-bottom"><p class="h5 text-danger">New Loka : </p></div>
                    <div class="row w-100">
                    <div class="form-group col-lg-4"></div>    
                    <div class="form-group col-11 col-lg-4">
                        <label for="newLokaRadioOn">Oui</label>
                        <input type="radio" id="newLokaRadioOn" name="newLokaRadio" value="on"/>
                        <label for="newLokaRadioOff">Non</label>
                        <input type="radio" id="newLokaRadioOff" name="newLokaRadio" value="off"/>
                    </div>
                    <div class="form-group col-lg-4"></div>
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
                    
                </div>
            </fieldset>
            <div class="align-items-center justify-content-center d-flex">
                <button type="submit" class="btn btn-light text-dark mb-3">Envoyer</button>
            </div>
        </form>
<?php
if($error == 0):
    ?><p class="text-light"><?= 'coucou'; ?></p>
    <?php
    var_dump($_POST);
    else:
    ?><p class="text-light"><?= $error; ?></p>
    <?php
    var_dump($_POST);
endif;
endif;?>