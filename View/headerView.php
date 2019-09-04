<div class="topBorder sticky-top">
    <div class="row no-gutters"> 

        <nav class="navbar navbar-expand-xl sticky-top w-100">
            <div class="col-12 col-xl-5">
                <h1 class="mt-2 text-left text-light font-weight-bold font-family-germania"><a href="../index.php" Title="home"><img class="img-fluid" src="../assets/Images/miniWarframe.png" alt="miniWarframe" title="miniWarframe" id="miniWar" /></a>WarFriends</h1>
                <button class="navbar-toggler navbar-light w-100 warButton" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-right text-light font-family-germania font-weight-bold"><?=isset($_SESSION['warfriendsPseudo'])?$_SESSION['warfriendsPseudo']:'Warfriends'?><i class="warButton fa fa-sort-desc" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
            <div class="col-12 col-xl-7">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item rounded text-center mr-2 h4">
                            <a class="text-light nav-link" href="<?= $linkIndex ?>" id="home">Accueil</a>
                        </li>
                        <li class="nav-item rounded text-center mr-2 h4">
                            <a class="text-light nav-link search <?=(isset($_SESSION['warfriendsPseudo']))?'':'d-none'?>">Recherche</a>
                        </li>
                        <li class="nav-item rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'d-none':''?>">
                            <a class="text-light nav-link connection" id="connection">Connexion</a>
                        </li>
                        
                        <li class="nav-item rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'d-none':''?>">
                            <a class="text-light nav-link" href="<?= $linkFormView ?>">Inscription</a>
                        </li>
                        
                        <li class="nav-item rounded text-center mr-2 h4 <?=(!isset($_SESSION['adminPseudo']))?'d-none':''?>">
                            <a class="text-light nav-link" href="<?=(isset($_SESSION['adminPseudo']))? $adminLink:$errorLink?>">Console Admin</a>
                        </li>
                        
                        <li class="dropdown nav-item rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'':'d-none'?>">
                            <a class="dropdown-toggle text-light nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="far fa-user-circle"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$linkAccount?>">Mon Compte</a>
                               <form method="POST" action="<?=$disconnect?>">
                                <button class="dropdown-item" name="disconnect" value="disconnect" type="submit">Déconnexion</button>
                                </form>
                            </div>
                        </li>
                        
                            <li class="nav-item helloMember rounded text-center mr-2 h4 <?=(isset($_SESSION['warfriendsPseudo']))?'':'d-none'?>">
                                <p class="text-light nav-link"><?=isset($_SESSION['warfriendsPseudo'])?$_SESSION['warfriendsPseudo']:''?></p>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>



<?php include 'searchLightboxView.php'; ?>
<?php 
if(!empty($_SESSION)):
    extract($_SESSION);
    $userSyndicateCount = new Users();
    $userSyndicateCount->id = $id;
    $count = $userSyndicateCount->syndicateCount();
    if((int)$count[0]['count'] < 6):
        ?><div class="bg-warning-opac sticky-top text-center w-75 mx-auto font-weight-bold rounded">Bonjour <?= $warfriendsPseudo ?>, n'oubliez pas de mettre à jour vos informations de syndicats dans "Mon Compte"</div>
            <div class="rem"></div><?php
    endif;
    
endif;


?>