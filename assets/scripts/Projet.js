//Tableaux utiles pour la regexArmor

var armor = [
    'Ash',
    'Atlas',
    'Banshee',
    'Baruuk',
    'Chroma',
    'Ember',
    'Equinox',
    'Excalibur',
    'Frost',
    'Gara',
    'Garuda',
    'Harrow',
    'Hildryn',
    'Hydroid',
    'Inaros',
    'Ivara',
    'Khora',
    'Limbo',
    'Loki',
    'Mag',
    'Mesa',
    'Mirage',
    'Nekros',
    'Nezha',
    'Nidus',
    'Nova',
    'Nyx',
    'Oberon',
    'Octavia',
    'Revenant',
    'Rhino',
    'Saryn',
    'Titania',
    'Trinity',
    'Valkyr',
    'Vauban',
    'Volt',
    'Wisp',
    'Wukong',
    'Zephyr'
    ];
var primeArmor = [
    'Ash Prime',
    'Banshee Prime',
    'Chroma Prime',
    'Ember Prime',
    'Equinox Prime',
    'Excalibur Prime',
    'Frost Prime',
    'Hydroid Prime',
    'Limbo Prime',
    'Loki Prime',
    'Mag Prime',
    'Mesa Prime',
    'Mirage Prime',
    'Nekros Prime',
    'Nova Prime',
    'Nyx Prime',
    'Oberon Prime',
    'Rhino Prime',
    'Saryn Prime',
    'Trinity Prime',
    'Valkyr Prime',
    'Vauban Prime',
    'Volt Prime',
    'Zephyr Prime'
    ];
    
var armors = armor.join('|');
var primeArmors = primeArmor.join('|');
    
// regex diverses et variées

var regexBirthday = /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/;

var regexMail = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/;

var regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-.+!*$@%_\w]{8,19})$/;

var regexDiscord = /^(.)+(\#)([0-9]{4})$/;

var regexSyndicateRank = /^(-2|-1|0|neutre|1|2|3|4|5)$/;

var regexSyndicateStanding = /^(0)$|^[1-9]$|^[1-9][0-9]$|^[1-9][0-9]{2}$|^[1-9][0-9]{3}$|^[1-9][0-9]{4}$|^(1)[0-2][0-9]{4}$|^(13)[0-1][0-9]{3}$|^(132000)$/;

var regexArmor = '/^(Aucune en particulier|' + armors + '|' + primeArmors + ')$/';

// Tableau des erreur, chaque entrée commence de base comme etant erreur et est modifié si le test des regex est passé

var errorInForm = {'birthday' : 0,'discord':0,'mail':0,'password':0,'confirmPassword':0,'steelMeridianRank':0,'steelMeridianStanding':0,'arbiterRank':0,'arbiterStanding':0,'cephalonRank':0,'cephalonStanding':0,'perrinRank':0,'perrinStanding':0,'redVeilRank':0,'redVeilStanding':0,'newLokaRank':0,'newLokaStanding':0,'armor':0};

// Tableau de validation, lorsque le tableau des erreur est egal au tableau de validation, le formulaire est validé et l'envoie est autorisé

var formValidate = {'birthday' : 1,'discord':1,'mail':1,'password':1,'confirmPassword':1,'steelMeridianRank':1,'steelMeridianStanding':1,'arbiterRank':1,'arbiterStanding':1,'cephalonRank':1,'cephalonStanding':1,'perrinRank':1,'perrinStanding':1,'redVeilRank':1,'redVeilStanding':1,'newLokaRank':1,'newLokaStanding':1,armor:1};

// Variable servant de compteur pour les tableaux, Si la variable atteint 17 ( le nombre de critere a valider ) alors le formulaire est envoyé, dans le cas contraire la variable est reinitialisée et le formulaire est renvoyé 

var countTrue = 0;

//Fonction permettant de cacher ou d'afficher les input de rank et de standing pour chaque faction lorsque le Oui est selectionné pour l'input radio

function standingVisibility(){

if($('#steelMeridianRadioOn').is(':checked')){
    $('#steelMeridianRank').show();
    $('#steelMeridianRankLabel').show();
    $('#steelMeridianStanding').show();
    $('#steelMeridianStandingLabel').show();
    
}else if($('#steelMeridianRadioOff').is(':checked')){
     $('#steelMeridianRank').hide();
     $('#steelMeridianRankLabel').hide();
     $('#steelMeridianStanding').hide();
     $('#steelMeridianStandingLabel').hide();
}else{
     $('#steelMeridianRank').hide();
     $('#steelMeridianRankLabel').hide();
     $('#steelMeridianStanding').hide();
     $('#steelMeridianStandingLabel').hide();
}
if($('#arbiterRadioOn').is(':checked')){
    $('#arbiterRank').show();
    $('#arbiterRankLabel').show();
    $('#arbiterStanding').show();
    $('#arbiterStandingLabel').show();
    
}else if($('#arbiterRadioOff').is(':checked')){
     $('#arbiterRank').hide();
     $('#arbiterRankLabel').hide();
     $('#arbiterStanding').hide();
     $('#arbiterStandingLabel').hide();
}else{
     $('#arbiterRank').hide();
     $('#arbiterRankLabel').hide();
     $('#arbiterStanding').hide();
     $('#arbiterStandingLabel').hide();
}
if($('#cephalonRadioOn').is(':checked')){
    $('#cephalonRank').show();
    $('#cephalonRankLabel').show();
    $('#cephalonStanding').show();
    $('#cephalonStandingLabel').show();
}else if($('#cephalonRadioOff').is(':checked')){
     $('#cephalonRank').hide();
     $('#cephalonRankLabel').hide();
     $('#cephalonStanding').hide();
     $('#cephalonStandingLabel').hide();
}else{
     $('#cephalonRank').hide();
     $('#cephalonRankLabel').hide();
     $('#cephalonStanding').hide();
     $('#cephalonStandingLabel').hide();
}
if($('#perrinRadioOn').is(':checked')){
    $('#perrinRank').show();
    $('#perrinRankLabel').show();
    $('#perrinStanding').show();
    $('#perrinStandingLabel').show();
    
}else if($('#perrinRadioOff').is(':checked')){
     $('#perrinRank').hide();
     $('#perrinRankLabel').hide();
     $('#perrinStanding').hide();
     $('#perrinStandingLabel').hide();
}else{
     $('#perrinRank').hide();
     $('#perrinRankLabel').hide();
     $('#perrinStanding').hide();
     $('#perrinStandingLabel').hide();
}
if($('#redVeilRadioOn').is(':checked')){
    $('#redVeilRank').show();
    $('#redVeilRankLabel').show();
    $('#redVeilStanding').show();
    $('#redVeilStandingLabel').show();
    
}else if($('#redVeilRadioOff').is(':checked')){
     $('#redVeilRank').hide();
     $('#redVeilRankLabel').hide();
     $('#redVeilStanding').hide();
     $('#redVeilStandingLabel').hide();
}else{
     $('#redVeilRank').hide();
     $('#redVeilRankLabel').hide();
     $('#redVeilStanding').hide();
     $('#redVeilStandingLabel').hide();
}
if($('#newLokaRadioOn').is(':checked')){
    $('#newLokaRank').show();
    $('#newLokaRankLabel').show();
    $('#newLokaStanding').show();
    $('#newLokaStandingLabel').show(); 
}else if($('#newLokaRadioOff').is(':checked')){
     $('#newLokaRank').hide();
     $('#newLokaRankLabel').hide();
     $('#newLokaStanding').hide();
     $('#newLokaStandingLabel').hide();
}else{
     $('#newLokaRank').hide();
     $('#newLokaRankLabel').hide();
     $('#newLokaStanding').hide();
     $('#newLokaStandingLabel').hide();
}
}

//Fonction qui testera toute les données entrée dans le formulaire via des regex.

function checkForm(){
    
//    test de la regex date de naissance

    if(!regexBirthday.test($('#birthday').val())) {
        $('#birthdayError').text('Date d\'anniversaire invalide. Veillez à ce qu\'elle soit au format Français, JJ/MM/AAAA par exemple.');
        $('#birthday').css('border','red solid 2px');
    }else{
        errorInForm['birthday'] = 1;
    }
    
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