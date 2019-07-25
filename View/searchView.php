<?php
session_start();
require_once '../Controllers/searchController.php';

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
        ?>
        <div class="row no-gutters">
<?php 
    foreach($search as $key=>$value):

    ${'user'.$key} = new Users();
    ${'user'.$key}->id = $value['id'];
    ${'user'.$key}->warfriendsPseudo = $value['warfriendsPseudo'];
    $userRanks = ${'user'.$key}->getRanks();
    ?><div class="col-xl-4 col-12">
                    <div id="accordion<?= $key ?>">   
                        <div class="card mx-auto bg-light-opac" style="width: 18rem;">



                            <div class="card-body">
                                <h5 class="card-title text-center"><?= ${'user'.$key}->warfriendsPseudo ?></h5>
                            </div>
                            <div id="heading<?= $key ?>">     
                                <h5 class="mb-0 text-center">
                                    <button class="btn btn-link text-dark syndicateHomeButton" id="<?= $key ?>" data-toggle="collapse" data-target="<?= '#collapse' . $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                        Syndicats <i class="fas fa-sort-down fa-2x"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="<?= 'collapse' . $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>" data-parent="#accordion<?= $key ?>">
                                <ul class="list-group list-group-flush bg-light-opac">
    <?php foreach ($userRanks as $secondKey => $secondValue):
        ?><li class="list-group-item bg-dark-opac text-light"><img class="img-fluid" src="../assets/Images/<?= $secondValue['image'] ?>" /><?= 'rang : ' . $secondValue['rank'] ?></li>
        <?php
    endforeach;
    ?>
                                </ul>
                                <div class="card-body">

                                </div>
                            </div>
                            <div class="rem"></div>
                            <div class="text-center bg-dark-opac  <?= 'smallSyndicate' . $key ?>">
                                    <?php foreach ($userRanks as $thirdKey => $thirdValue):
                                        ?><img class="img-fluid w-25" src="../assets/Images/<?= $thirdValue['image'] ?>" /><?php endforeach; ?>
                            </div>
                        </div>
                        <div class="rem"></div>
                    </div>
                </div>


                                <?php

endforeach;
?>
</div>
        <?php
        if ($page > 1):
            ?><a href="?page=<?php echo $page - 1; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>">Page précédente</a><span> - </span><?php
        endif;
        for ($i = 1; $i <= $pageQuantity; $i++):
            ?><a href="?page=<?php echo $i; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>"><?php echo $i; ?></a> <?php
        endfor;
        if ($page < $pageQuantity):
            ?><span> - </span><a href="?page=<?php echo $page + 1; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>">Page suivante</a><?php
        endif;
        
        

        ?>
        <?php include 'footerView.php';?>



        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>

</html>