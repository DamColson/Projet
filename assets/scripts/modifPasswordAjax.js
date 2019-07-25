var newPasswordValue;

$('#oldPassword,#newPassword,#confirmNewPassword').focusout(function(){
    
    var newPostData;
    
    var id=this.id;
    
    if(this.name == 'confirmNewPassword'){
        newPostData = this.name+ '=' + $(this).val() + '&newPassword=' + newPasswordValue;
    }else if( id == 'newPassword'){
        newPostData = this.name+ '=' + $(this).val();
        newPasswordValue = $(this).val();
    }else{
        newPostData = this.name+ '=' + $(this).val();
    }

    
   $(this).removeClass('redBorder');
    
    
    $.ajax({
        
        url: '../Controllers/UsersInfosController.php',
        type:'POST',
        data: newPostData,
       
        success: function(data){
            console.log(id);
            console.log(data);
            console.log(newPostData);
        if(data == 'failure' && id == 'oldPassword'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Ceci n\'est pas votre mot de passe actuel');
        }else if(data == 'failure' && id == 'newPassword'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Mot de passe invalide.Assurez vous que ce dernier possède une majuscule, un chiffre et au moins 8 caractères');
        }else if(data == 'failure' && id == 'confirmNewPassword'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ce mot de passe est le même que celui précédement renseigné? Possède t-il tout les prérequis attendus?');
        }else{
            $('#'+id+'Error').empty();    
        }
        
   }
   });
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
