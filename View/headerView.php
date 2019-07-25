<div class="topBorder sticky-top">
    <div class="row no-gutters"> 

        <nav class="navbar navbar-expand-xl sticky-top w-100">
            <div class="col-12 col-xl-5">
                <h1 class="mt-2 text-left text-light font-weight-bold font-family-germania"><a href="../index.php" Title="home"><img class="img-fluid" src="../assets/Images/miniWarframe.png" alt="miniWarframe" title="miniWarframe" id="miniWar" /></a>WarFriends</h1>
                <button class="navbar-toggler navbar-light w-100 warButton" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-right text-light font-family-germania font-weight-bold">Warfriends<i class="warButton fa fa-sort-desc" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
            <div class="col-12 col-xl-7">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4">
                            <a class="text-light nav-link" href="<?= $linkIndex ?>" id="home">Accueil</a>
                        </li>
                        <li class="nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4">
                            <a class="text-light nav-link search <?=(isset($_SESSION['warfriendsPseudo']))?'':'d-none'?>">Recherche</a>
                        </li>
                        <li class="nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'d-none':''?>">
                            <a class="text-light nav-link connection" id="connection">Connexion</a>
                        </li>
                        
                        <li class="nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'d-none':''?>">
                            <a class="text-light nav-link" href="<?= $linkFormView ?>">Inscription</a>
                        </li>
                        <li class="dropdown nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'':'d-none'?>">
                            <a class="dropdown-toggle text-light nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="far fa-user-circle"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$linkAccount?>">Mon Compte</a>
                               <form method="POST" action="<?=$disconnect?>">
                                <button class="dropdown-item" name="disconnect" value="disconnect" type="submit">Déconnexion</button>
                                </form>
                            </div>
                        </li>
                        <form method="POST" action="<?=$disconnect?>">
                            <li class="nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'':'d-none'?>">
                                <button class="btn btn-dark text-light nav-link mx-auto" id="disconnect" name="disconnect" value="disconnect" type="submit"><span class="h4">Déconnexion</span></button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>


<!-- Modal -->
<div class="modal fade font-family-germania text-light" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <p class="modal-title h4 font-weight-bold" id="ModalTitle">Connexion</p>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="connexionForm" action="../index.php" method="post">
            <div class="modal-body">
                
                    <fieldset class="text-center">
                        <div><label for="warfriendsPseudo">Pseudo Warfriends : </label><input type="text" name="warfriendsPseudo" id="warfriendsPseudo" required/></div>
                        <div class="rem"></div>
                        <div>
                            <label for="warfriendsPassword">Mot de passe :</label><input type="warfriendsPassword" id="warfriendsPassword" required/>
                        </div>
                    </fieldset>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-light text-dark" id="connexionButton">Connexion</button>
            </div>
            </form>
            <a href="<?= $linkFormView ?>" class="text-light text-center h6 font-weight-bold">Ou bien inscrivez vous</a>
        </div>
    </div>
</div>
<?php include 'searchLightboxView.php'; ?>