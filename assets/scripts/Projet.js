//Variable dans laquelle sera stockée le password pour la comparaison avec le confirmPassword.

var passwordValue;

//Début ajax sur formulaire d'inscription, effectif sur l'évènement focusOut sur chaque input du formulaire.

$('input').focusout(function () {

//Création des diverses variables utiles pour ajax.

    var postData;
    var id = this.id;

//Attribution d'une valeur à postData selon l'input que l'on quitte.

    if (this.name == 'confirmPassword') {
        postData = this.name + '=' + $(this).val() + '&password=' + passwordValue;
    } else if (id == 'pass') {
        postData = this.name + '=' + $(this).val();
        passwordValue = $(this).val();
    } else {
        postData = this.name + '=' + $(this).val();
    }

//Suppresion de la class redBorder au debut de chaque test ajax, si il y'a une erreur elle sera remise,dans le cas contraire aucune border ne sera présente.

    $(this).removeClass('redBorder');

//Début d'ajax du formulaire d'inscription

    $.ajax({

        url: '../Controllers/formController.php', //Envoie des données sur le controller du formulaire d'inscription.
        type: 'POST', //Données envoyées en post.
        data: postData, //Valeur des données envoyées.

//En cas de succès,exécutera la fonction suivante,avec en paramètre data qui récupèrera ce qui sera affichédans le controller ( ici le $data du controller ).
//La fonction ajoutera des bordures rouges et un messages d'erreurs si le controller lui renvoie failure. 
//Dans le cas contraire elle n'affichera pas de bordure et videra le message d'erreur.

        success: function (data) {
            console.log(data);
            if (data == 'failure' && id == 'birthday') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Date de naissance invalide. Etes vous majeur?');
            } else if (data == 'failure' && id == 'discord') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Tag discord invalide ou déjà inscrit sur Warfriends');
            } else if (data == 'failure' && id == 'mailo') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Adresse mail invalide ou déjà inscrite sur Warfriends');
            } else if (data == 'failure' && id == 'pass') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Mot de passe invalide.Assurez vous que ce dernier possède une majuscule, un chiffre et au moins 8 caractères');
            } else if (data == 'failure' && id == 'confirmPassword') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Etes vous sur que ce mot de passe est le même que celui précédement renseigné? Possède t-il tout les prérequis attendus?');
            } else if (data == 'failure' && id == 'pseudo') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Ce pseudo est déjà inscrit sur Warfriends');
            } else {
                $('#' + id + 'Error').empty();

            }

        }
    });
});

//Fonction permettant de caché ou de faire apparaitre la div ayant la classe smallSyndicate sur laquelle nous cliquons sur la page d'accueil ( l'accordéon ).

$('.syndicateHomeButton').click(function () {
    var i = this.id;
    $('.smallSyndicate' + i).toggleClass('d-none');
});

//Fonction permettant à la lightbox de recherche de fonctionner, apparition sur bouton recherche, disparition sur bouton fermer.

$(function () {

    $(".search").click(function () {
        $(".bigSearch").fadeIn("slow").css("display", "flex");
    });

    $(".closeSearchModal").click(function () {
        $(".bigSearch").fadeOut("fast");
    });

});

//Fonction permettant à la lightbox de connexion de fonctionner, apparition sur bouton connexion, disparition sur bouton fermer.

$(function () {


    $(".connection").click(function () {
        $(".bigConnection").fadeIn("slow").css("display", "flex");
    });

    $(".closeConnection").click(function () {
        $(".bigConnection").fadeOut("fast");
    });


});

$('#sideListCollapse').on('click', function () {
        $('#sideList').toggleClass('active');
    });