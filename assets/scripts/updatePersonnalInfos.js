$('input').focusout(function () {

    var postData;

    var id = this.id;
    postData = this.name + '=' + $(this).val();


    $(this).removeClass('redBorder');


    $.ajax({

        url: '../Controllers/updateController.php',
        type: 'POST',
        data: postData,

        success: function (data) {

            if (data == 'failure' && id == 'newDiscord') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Etes vous sur que ceci est un tag discord valide?');
            } else if (data == 'failure' && id == 'newMail') {
                $('#' + id).addClass('redBorder');
                $('#' + id + 'Error').text('Etes vous sur que ceci est une adresse mail valide?');
            } else {
                $('#' + id + 'Error').empty();

            }

        }
    });
});