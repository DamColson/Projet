$('#connexionButton').click(function(e){
    e.preventDefault();
    $("#connexionForm").submit();
});

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

//Fonction qui testera toute les données entrée dans le formulaire via des regex.

function checkForm(){
    
    
//    test de la regex discord

    if($('#discord').val() && !regexDiscord.test($('#discord').val())) {
        $('#discordError').text('Etes vous sur d\'avoir renseigné un tag Discord valide?');
        $('#discord').css('border','red solid 2px');
    }else{
        errorInForm['discord'] = 1;
    }
//    test de la regex mail
    if(!regexMail.test($('#mail').val())) {
        $('#mailError').text('Etes vous sur d\'avoir renseigné une adresse mail valide?');
        $('#mail').css('border','red solid 2px');
    }else{
        errorInForm['mail'] = 1;
    }
    
//    test de la regex password

    if(!regexPassword.test($('#password').val())) {
        $('#passwordError').text('Mot de passe invalide! Ce dernier doit contenir un nombre, une majuscule et posséder entre 8 et 16 caractères');
        $('#password').css('border','red solid 2px');
    }else{
        errorInForm['password'] = 1;
    }
//    Vérification de la concordance entre le password et le confirmPassword

    if($('#password').val() !== $('#confirmPassword').val()) {
        $('#confirmPasswordError').text('Ce mot de passe diffère du mot de passe choisit.');
        $('#confirmPassword').css('border','red solid 2px');
    }else{
        errorInForm['confirmPassword'] = 1;
    }
    
//    test de la regex armor

    if(!regexArmor.test($('#favArmor').val())) {
        $('#favArmorError').text('Ceci n\'est pas une armure valide');
        $('#favArmor').css('border','red solid 2px');
    }else{
        errorInForm['armor'] = 1;        
    }
    
//    test des regex rank et standing en fonction du radio pour la faction Steel Meridian

    if($('#steelMeridianRadioOff').is(':checked')){
        errorInForm['steelMeridianRank'] = 1;
        errorInForm['steelMeridianStanding'] = 1;
    }else if($('#steelMeridianRadioOn').is(':checked')){
        if(!regexSyndicateRank.test($('#steelMeridianRank').val())) {
        $('#steelMeridianRankError').text('Ceci n\'est pas un rang valide !!Veuillez choisir un nombre entier compris entre 2 et 5 ! ');
        $('#steelMeridianRank').css('border','red solid 2px');
        }else{
        errorInForm['steelMeridianRank'] = 1;
        }
        if(!regexSyndicateStanding.test($('#steelMeridianStanding').val())) {
        $('#steelMeridianStandingError').text('Le Standing doit etre un nombre compris entre 0 et 132000 !');
        $('#steelMeridianStanding').css('border','red solid 2px');
        }else{
        errorInForm['steelMeridianStanding'] = 1;
        }
    }else{
        $('#steelMeridianError').text('Il y a un soucis avec le choix oui/non, reessayez !');
    }
    
//    test des regex rank et standing en fonction du radio pour la faction Arbiter Of hexis

    if($('#arbiterRadioOff').is(':checked')){
        errorInForm['arbiterRank'] = 1;
        errorInForm['arbiterStanding'] = 1;
    }else if($('#arbiterRadioOn').is(':checked')){
        if(!regexSyndicateRank.test($('#arbiterRank').val())) {
        $('#arbiterRankError').text('Ceci n\'est pas un rang valide !!Veuillez choisir un nombre entier compris entre 2 et 5 ! ');
        $('#arbiterRank').css('border','red solid 2px');
        }else{
        errorInForm['arbiterRank'] = 1;
        }
        if(!regexSyndicateStanding.test($('#arbiterStanding').val())) {
        $('#arbiterStandingError').text('Le Standing doit etre un nombre compris entre 0 et 132000 !');
        $('#arbiterStanding').css('border','red solid 2px');
        }else{
        errorInForm['arbiterStanding'] = 1;
        }
    }else{
        $('#arbiterError').text('Il y a un soucis avec le choix oui/non, reessayez !');
    }
    
    //    test des regex rank et standing en fonction du radio pour la faction Cephalon Suda

    if($('#cephalonRadioOff').is(':checked')){
        errorInForm['cephalonRank'] = 1;
        errorInForm['cephalonStanding'] = 1;
    }else if($('#cephalonRadioOn').is(':checked')){
        if(!regexSyndicateRank.test($('#cephalonRank').val())) {
        $('#cephalonRankError').text('Ceci n\'est pas un rang valide !!Veuillez choisir un nombre entier compris entre 2 et 5 ! ');
        $('#cephalonRank').css('border','red solid 2px');
        }else{
        errorInForm['cephalonRank'] = 1;
        }
        if(!regexSyndicateStanding.test($('#cephalonStanding').val())) {
        $('#cephalonStandingError').text('Le Standing doit etre un nombre compris entre 0 et 132000 !');
        $('#cephalonStanding').css('border','red solid 2px');
        }else{
        errorInForm['cephalonStanding'] = 1;
        }
    }else{
        $('#cephalonError').text('Il y a un soucis avec le choix oui/non, reessayez !');
    }
    
    //    test des regex rank et standing en fonction du radio pour la faction The Perrin Sequence
    
    if($('#perrinRadioOff').is(':checked')){
        errorInForm['perrinRank'] = 1;
        errorInForm['perrinStanding'] = 1;
    }else if($('#perrinRadioOn').is(':checked')){
        if(!regexSyndicateRank.test($('#perrinRank').val())) {
        $('#perrinRankError').text('Ceci n\'est pas un rang valide !!Veuillez choisir un nombre entier compris entre 2 et 5 ! ');
        $('#perrinRank').css('border','red solid 2px');
        }else{
        errorInForm['perrinRank'] = 1;
        }
        if(!regexSyndicateStanding.test($('#perrinStanding').val())) {
        $('#perrinStandingError').text('Le Standing doit etre un nombre compris entre 0 et 132000 !');
        $('#perrinStanding').css('border','red solid 2px');
        }else{
        errorInForm['perrinStanding'] = 1;
        }
    }else{
        $('#perrinError').text('Il y a un soucis avec le choix oui/non, reessayez !');
    }
    
    //    test des regex rank et standing en fonction du radio pour la faction Red Veil
    
    if($('#redVeilRadioOff').is(':checked')){
        errorInForm['redVeilRank'] = 1;
        errorInForm['redVeilStanding'] = 1;
    }else if($('#redVeilRadioOn').is(':checked')){
        if(!regexSyndicateRank.test($('#redVeilRank').val())) {
        $('#redVeilRankError').text('Ceci n\'est pas un rang valide !!Veuillez choisir un nombre entier compris entre 2 et 5 ! ');
        $('#redVeilRank').css('border','red solid 2px');
        }else{
        errorInForm['redVeilRank'] = 1;
        }
        if(!regexSyndicateStanding.test($('#redVeilStanding').val())) {
        $('#redVeilStandingError').text('Le Standing doit etre un nombre compris entre 0 et 132000 !');
        $('#redVeilStanding').css('border','red solid 2px');
        }else{
        errorInForm['redVeilStanding'] = 1;
        }
    }else{
        $('#redVeilError').text('Il y a un soucis avec le choix oui/non, reessayez !');
    }
    
    //    test des regex rank et standing en fonction du radio pour la faction New Loka
    
    if($('#newLokaRadioOff').is(':checked')){
        errorInForm['newLokaRank'] = 1;
        errorInForm['newLokaStanding'] = 1;
    }else if($('#newLokaRadioOn').is(':checked')){
        if(!regexSyndicateRank.test($('#newLokaRank').val())) {
        $('#newLokaRankError').text('Ceci n\'est pas un rang valide !!Veuillez choisir un nombre entier compris entre 2 et 5 ! ');
        $('#newLokaRank').css('border','red solid 2px');
        }else{
        errorInForm['newLokaRank'] = 1;
        }
        if(!regexSyndicateStanding.test($('#newLokaStanding').val())) {
        $('#newLokaStandingError').text('Le Standing doit etre un nombre compris entre 0 et 132000 !');
        $('#newLokaStanding').css('border','red solid 2px');
        }else{
        errorInForm['newLokaStanding'] = 1;
        }
    }else{
        $('#newLokaError').text('Il y a un soucis avec le choix oui/non, reessayez !');
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

// Lorsque que l'on essait de submit le formulaire, la fonction checkForm se lance, comparant les valeur des input avec les regex, puis pour chaque clé du tableau errorInForm il compare la valeur de la dite clé avec la valeur de la clé identique du tableau formValidate, si les deux valeurs sont égales, countTrue est incrémentée. Puis, si countTrue est différent de 17, le formulaire n'est pas envoyé et countTrue est reinitialisée.

$('form').submit(function(event){
    checkForm();      
        for (var key in errorInForm){
           if(errorInForm[key] == formValidate[key]){
               countTrue++;
           } 
        }
        if(countTrue != Object.keys(errorInForm).length){
            event.preventDefault();
            countTrue = 0;
        }
 
  });