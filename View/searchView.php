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
    ${'user'.$key}->mail = $value['mail'];
    ${'user'.$key}->tagDiscord = $value['tagDiscord'];
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
                            <div id="heading<?= $key . '' . $key ?>">     
                                <h5 class="mb-0 text-center">
                                    <button class="btn btn-link text-dark contactButton" id="<?= $key . '' . $key ?>" data-toggle="collapse" data-target="<?= '#collapse' . $key . '' . $key ?>" aria-expanded="true" aria-controls="collapse<?= $key . '' . $key ?>">
                                        Contact <i class="fas fa-sort-down fa-2x"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="<?= 'collapse' . $key . '' . $key ?>" class="collapse" aria-labelledby="heading<?= $key . '' . $key ?>" data-parent="#accordion<?= $key ?>">
                                <ul class="list-group list-group-flush bg-light-opac">
                                    <li class="text-center list-group-item bg-dark-opac text-light"><a href="mailto:<?= ${'user'.$key}->mail ?>"><?= ${'user'.$key}->mail ?></a></li>
                                    <li class="text-center list-group-item bg-dark-opac text-light"><?= ${'user'.$key}->tagDiscord ?></li>
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
        <div class="bg-dark-opac text-center">
            <a class="text-light h4" href="?page=<?php echo 1; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox=<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>"><i class="fas fa-angle-double-left mr-3"></i></a><span> - </span>
        <?php
        
        if ($page > 1):
            ?><a class="text-light h4" href="?page=<?php echo $page - 1; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox=<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>"><i class="fas fa-angle-left"></i></a><span> - </span><?php
        endif;
        for ($i = 1; $i <= $pageQuantity; $i++):
            ?><a class="text-light h5" href="?page=<?php echo $i; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox=<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>"><?php echo $i; ?></a> <?php
        endfor;
        if ($page < $pageQuantity):
            ?><span> - </span><a class="text-light h4" href="?page=<?php echo $page + 1; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox=<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>"><i class="fas fa-angle-right"></i></a><?php
        endif;
        
        

        ?><a class="text-light h4" href="?page=<?php echo $pageQuantity; ?>&searchBar=<?=$_GET['searchBar']?>&meridianCheckbox=<?=$_GET['meridianCheckbox']?>&arbiterCheckbox=<?=$_GET['arbiterCheckbox']?>&cephalonCheckbox=<?=$_GET['cephalonCheckbox']?>&perrinCheckbox=<?=$_GET['perrinCheckbox']?>&redVeilCheckbox=<?=$_GET['redVeilCheckbox']?>&lokaCheckbox=<?=$_GET['lokaCheckbox']?>"><i class="fas fa-angle-double-right ml-3"></i></a><span> - </span>
            
        </div>
        <div class="rem"></div>
        <?php include 'footerView.php';?>



        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>

</html>