//Fonction permettant de cacher ou d'afficher les input de rank et de standing pour chaque faction lorsque le Oui est selectionné pour l'input radio

function standingVisibility(){

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

// Lancement de la fonction standingVisibility au click d'un input

$('input').click(function(){
    standingVisibility();
});

// Lancement de la fonction standingVisibility au chargement du formulaire

$('#inscriptionForm').ready(function(){
    standingVisibility();
});

$('input,select').focusout(function(){
    
    var postData;
    var id=this.id;
    
    if(this.name == 'confirmPassword'){
        postData = this.name+ '=' + $(this).val() + '&password=' + $('#password').val();
    }else{
        postData = this.name+ '=' + $(this).val();
    }

    $(this).removeClass('redBorder');
   
    
    $.ajax({
        
        url: '../Controllers/formController.php',
        type:'POST',
        data: postData,
       
        success: function(data){
                console.log(data);
        if(data == 'failure' && id == 'birthday'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Date de naissance invalide. Etes vous majeur?');
        }else if(data == 'failure' && id == 'discord'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ceci est un tag discord valide?');
        }else if(data == 'failure' && id == 'mail'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ceci est une adresse mail valide?');
        }else if(data == 'failure' && id == 'password'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Mot de passe invalide.Assurez vous que ce dernier possède une majuscule, un chiffre et au moins 8 caractères');
        }else if(data == 'failure' && id == 'confirmPassword'){
            $('#'+id).addClass('redBorder');
            $('#'+id+'Error').text('Etes vous sur que ce mot de passe est le même que celui précédement renseigné?');
        }else{
            $('#'+id+'Error').empty();
        }
        
   }
   });
});