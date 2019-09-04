<!--Navbar admin-->

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
                        <li class="dropdown nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4">
                            <a class="dropdown-toggle text-light nav-link" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$frameLink?>">Gerer les frames</a>
                                <a class="dropdown-item" href="<?=$syndicateLink?>">Gerer les syndicats</a>
                                <a class="dropdown-item" href="<?=$memberLink?>">Gerer les membres</a>
                                <a class="dropdown-item" href="<?=$adminLink?>">Accueil admin</a>
                            </div>
                        </li>                     
                        <form method="POST" action="<?=$disconnect?>">
                            <li class="nav-item font-family-germania bg-dark-opac rounded text-center mr-2 h4">
                                <button class="btn btn-dark text-light nav-link mx-auto" id="disconnect" name="disconnect" value="disconnect" type="submit"><span class="h4">Déconnexion</span></button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<!--inclusion de la lightbox de recherche-->

<?php include 'searchLightboxView.php'; ?>