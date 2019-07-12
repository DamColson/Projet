var passwordValue;
var confirmPasswordValue;
//Fonction permettant de cacher ou d'afficher les input de rank pour chaque faction lorsque le Oui est selectionné pour l'input radio

function rankVisibility(){

if($('#steelMeridianRadioOn').is(':checked')){
    $('#steelMeridianRank').show();
    $('#steelMeridianRankLabel').show();
}else if($('#steelMeridianRadioOff').is(':checked')){
     $('#steelMeridianRank').hide();
     $('#steelMeridianRankLabel').hide();
}else{
     $('#steelMeridianRank').hide();
     $('#steelMeridianRankLabel').hide();
}
if($('#arbiterRadioOn').is(':checked')){
    $('#arbiterRank').show();
    $('#arbiterRankLabel').show();    
}else if($('#arbiterRadioOff').is(':checked')){
     $('#arbiterRank').hide();
     $('#arbiterRankLabel').hide();
}else{
     $('#arbiterRank').hide();
     $('#arbiterRankLabel').hide();
}
if($('#cephalonRadioOn').is(':checked')){
    $('#cephalonRank').show();
    $('#cephalonRankLabel').show();
}else if($('#cephalonRadioOff').is(':checked')){
     $('#cephalonRank').hide();
     $('#cephalonRankLabel').hide();
}else{
     $('#cephalonRank').hide();
     $('#cephalonRankLabel').hide();
}
if($('#perrinRadioOn').is(':checked')){
    $('#perrinRank').show();
    $('#perrinRankLabel').show();
    
}else if($('#perrinRadioOff').is(':checked')){
     $('#perrinRank').hide();
     $('#perrinRankLabel').hide();
}else{
     $('#perrinRank').hide();
     $('#perrinRankLabel').hide();
}
if($('#redVeilRadioOn').is(':checked')){
    $('#redVeilRank').show();
    $('#redVeilRankLabel').show();
}else if($('#redVeilRadioOff').is(':checked')){
     $('#redVeilRank').hide();
     $('#redVeilRankLabel').hide();
}else{
     $('#redVeilRank').hide();
     $('#redVeilRankLabel').hide();
}
if($('#newLokaRadioOn').is(':checked')){
    $('#newLokaRank').show();
    $('#newLokaRankLabel').show(); 
}else if($('#newLokaRadioOff').is(':checked')){
     $('#newLokaRank').hide();
     $('#newLokaRankLabel').hide();
}else{
     $('#newLokaRank').hide();
     $('#newLokaRankLabel').hide();
}
}

// Lancement de la fonction rankVisibility au click d'un input

$('input').click(function(){
    rankVisibility();
});

// Lancement de la fonction rankVisibility au chargement du formulaire

$('#inscriptionForm').ready(function(){
    rankVisibility();
});

$('input,select').focusout(function(){
    
    var postData;
    
    var id=this.id;
    
    
    

    if(this.name == 'confirmPassword'){
        postData = this.name+ '=' + $(this).val() + '&password=' + passwordValue;
        confirmPasswordValue = $(this).val();
    }else if( id == 'pass'){
        postData = this.name+ '=' + $(this).val();
        passwordValue = $(this).val();
    }else{
        postData = this.name+ '=' + $(this).val();
    }

    
   $(this).removeClass('redBorder');
    
    
    $.ajax({
        
        url: '../Controllers/formController.php',
        type:'POST',
        data: postData,
       
        success: function(data){

        if(data == 'failure' && id == 'birthday'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Date de naissance invalide. Etes vous majeur?');
        }else if(data == 'failure' && id == 'discord'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ceci est un tag discord valide?');
        }else if(data == 'failure' && id == 'mailo'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ceci est une adresse mail valide?');
        }else if(data == 'failure' && id == 'pass'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Mot de passe invalide.Assurez vous que ce dernier possède une majuscule, un chiffre et au moins 8 caractères');
        }else if(data == 'failure' && id == 'confirmPassword'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ce mot de passe est le même que celui précédement renseigné? Possède t-il tout les prérequis attendus?');
        }else{
            $('#'+id+'Error').empty();
            
        }
        
   }
   });
});

$('#connection').click(function(){
    if($('#connectionDiv').is(':hidden')){
        $( "#connectionDiv" ).slideDown( 'slow' );
    }else{
        $( "#connectionDiv" ).slideUp( 'slow' );
    }
});