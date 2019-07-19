<?php

require_once 'Models/modelDb.php';
require_once 'Models/usersModel.php';
require_once 'Models/SyndicateDetailsModel.php';
require_once 'Models/SyndicateModel.php';


$syndicate = new Syndicate();



$lastFive = $user->getLastFive();

?><div class="row no-gutters">
    <div class="col-lg-1"></div><?php


foreach($lastFive as $key=>$value):
    $user = new Users();
    $user->id = (int)$value['id'];
    $user->warfriendsPseudo = $value['warfriendsPseudo'];

    $lastFivesRank = $user->getLastFivesRanks();

  ?><div class="card" style="width: 18rem;">
            
                
                <div class="col-lg-2 col-12">
            <div class="card-body">
                <h5 class="card-title"><?= $user->warfriendsPseudo ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach($lastFivesRank as $secondKey=>$secondValue):
                    
                    ?><li class="list-group-item"><img class="img-fluid" src="assets/Images/<?= $secondValue['image'] ?>" /><?= $secondValue['rank'] ?></li>
                    <?php
                endforeach;
                ?>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
                </div>
                
        </div>
        
    
<?php
endforeach;

?><div class="col-lg-1"></div>
</div>