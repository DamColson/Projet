var passwordValue;
//Fonction permettant de cacher ou d'afficher les input de rank pour chaque faction lorsque le Oui est selectionné pour l'input radio

// debut ajax sur formulaire d'inscription

$('input,select').focusout(function () {

    var postData;

    var id = this.id;

    


    if (this.name == 'confirmPassword') {
        postData = this.name + '=' + $(this).val() + '&password=' + passwordValue;
    } else if (id == 'pass') {
        postData = this.name + '=' + $(this).val();
        passwordValue = $(this).val();
    } else {
        postData = this.name + '=' + $(this).val();
    }


    $(this).removeClass('redBorder');


    $.ajax({

        url: '../Controllers/formController.php',
        type: 'POST',
        data: postData,

        success: function (data) {

            if (data == 'failure' && id == 'birthday') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Date de naissance invalide. Etes vous majeur?');
            } else if (data == 'failure' && id == 'discord') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Tag discord invalide ou déjà inscrit');
            } else if (data == 'failure' && id == 'mailo') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Adresse mail invalide ou déjà inscrite');
            } else if (data == 'failure' && id == 'pass') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Mot de passe invalide.Assurez vous que ce dernier possède une majuscule, un chiffre et au moins 8 caractères');
            } else if (data == 'failure' && id == 'confirmPassword') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Etes vous sur que ce mot de passe est le même que celui précédement renseigné? Possède t-il tout les prérequis attendus?');
            } else if (data == 'failure' && id == 'pseudo'){
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Ce pseudo est déjà inscrit');
            } else {
                $('#' + id + 'Error').empty();

            }

        }
    });
});

//$('#connection, #closeConnection').click(function () {
//    if ($('#connectionDiv').is(':hidden')) {
//        $("#connectionDiv").slideDown('slow');
//    } else {
//        $("#connectionDiv").slideUp('slow');
//    }
//});


$('.syndicateHomeButton').click(function () {
    var i = this.id;
    $('.smallSyndicate' + i).toggleClass('d-none');
});

// search lightbox

$(function () {

    $(".search").click(function () {
        $(".bigSearch").fadeIn("slow").css("display", "flex");
    });

    $(".closeSearchModal").click(function () {
        $(".bigSearch").fadeOut("fast");
    });

});

//connexion lightbox

$(function () {


    $(".connection").click(function () {
        $(".bigConnection").fadeIn("slow").css("display", "flex");
    });

    $(".closeConnection").click(function () {
        $(".bigConnection").fadeOut("fast");
    });


});