<?php
session_start();

require '../Controllers/adminController.php';
require '../Controllers/disconnect.php';
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
        include 'adminHeaderView.php';
        ?>
        <div class="row no-gutters align-items-center mt-5 bg-dark-opac">
            <div class="col-xl-4 col-12 text-center mt-4">
                <a class="adminTopic h2 mb-3" href="<?= $frameLink ?>"><u>Gerer les frames</u></a>
                <p class="text-light h4 mb-3">Nombre de frames actuellement enregistrées sur Warfriends</p>
                <p class="text-success adminTopic bg-dark-opac h4 border border-success rounded w-75 mx-auto mb-3"><?= $getNumber[0]['number'] ?></p>
                <p class="text-light h4 mb-3">Nombre de frames différentes mises en favoris par les utilisateurs</p>
                <p class="text-success adminTopic bg-dark-opac h4 border border-success rounded w-75 mx-auto mb-3"><?= $getFavNumber[0]['number'] ?></p>
                <p class="text-light h4 mb-3">Frame la plus souvent mise en favoris</p>
                <p class="text-success adminTopic bg-dark-opac h4 border border-success rounded w-75 mx-auto mb-3"><?= $getMostFav[0]['name'] ?></p>
            </div>
            <div class="col-xl-4 col-12 text-center mt-4">
                <a class="adminTopic h2 mb-3" href="<?= $syndicateLink ?>"><u>Gerer les syndicats</u></a>
                <p class="text-light h4 mb-3">Nombre de syndicats actuellement enregistrées sur Warfriends</p>
                <p class="text-success adminTopic bg-dark-opac h4 border border-success rounded w-75 mx-auto mb-3"><?= $getSyndicateNumber[0]['number'] ?></p>
                <?php
                foreach ($getAllSyndicate as $key => $value):
                    $syndicateDetail = new SyndicateDetails();
                    $syndicateDetail->id_wfd_Syndicate = (int) $value['id'];
                    $getSyndicateNumber = $syndicateDetail->getSyndicateNumber();
                    ?><p class="text-light h4 mb-3">Nombre d'utilisateurs chez <?= $value['name'] ?></p>
                    <p class="text-success adminTopic bg-dark-opac h4 border border-success rounded w-75 mx-auto mb-3"><img class="img-fluid tinyImg bg-dark-opac rounded" src="../assets/Images/<?=$value['image']?>"/><?= $getSyndicateNumber[0]['number'] ?></p>
                    <?php
                endforeach;
                ?>                                           
            </div>
            <div class="col-xl-4 col-12 text-center mt-4">
                <a class="adminTopic h2 mb-3" href="<?= $memberLink ?>"><u>Gerer les membres</u></a>
                <p class="text-light h4 mb-3">Nombre de membres actuellement enregistrées sur Warfriends</p>
                <p class="text-success bg-dark-opac h4 border border-success adminTopic rounded w-75 mx-auto mb-3"><?= $getUserNumber[0]['number'] ?></p>
            </div>
        </div>
        <div class="rem"></div>
        <?php include 'footerView.php'; ?>
        <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="../assets/scripts/Projet.js"></script>
    </body>

</html>