<div class="bigConnection" id="connectionDiv">

            <form id="connexionForm" action="../index.php" method="post">


                <fieldset class="text-center row no-gutters  text-light">
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="warfriendsPseudo" >Pseudo Warfriends : </label>
                        <input class="form-control" type="text" name="warfriendsPseudo" id="warfriendsPseudo" required/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                    <div class="rem"></div>
                    <div class="form-group col-lg-3"></div>
                    <div class="form-group col-lg-6">
                        <label for="warfriendsPassword">Mot de passe :</label>
                        <input class="form-control" type="password" name="warfriendsPassword" id="warfriendsPassword" required/>
                    </div>
                    <div class="form-group col-lg-3"></div>
                </fieldset>


                <div class="align-items-center justify-content-center d-flex">
                    <button type="button" class="btn btn-outline-light my-2 my-sm-0 mr-2 closeConnection" id="closeConnection" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="connectionButton" class="btn btn-outline-light my-2 my-sm-0" id="connectionButton"value="connectionOn">Connexion</button>
                </div>
            </form>
            <?php
            if (!empty($_SESSION) && !empty($_POST['connectionButton'])):
                ?><script>Swal.fire({
                    title: 'Bonjour <?= $_SESSION['warfriendsPseudo'] ?>.',
                    text: 'Connexion réussie',
                    type: 'success',
                    confirmButtonText: 'Fermer'
                });
                //                setTimeout(function () {
                //                    
                //       document.location.href='index.php'; //will redirect to your blog page (an ex: blog.html)
                //    }, 2000); //will call the function after 2 secs.
                //                


                </script><?php
        endif;
            ?>
            <div class="rem"></div>
        </div>