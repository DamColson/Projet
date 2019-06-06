function checkTest(){

if($('#steelMeridianRadioOn').is(':checked')){
    console.log('coucou');
    $('#steelMeridianRank').show();
    $('#steelMeridianRankLabel').show();
    $('#steelMeridianStanding').show();
    $('#steelMeridianStandingLabel').show();
    
}else if($('#steelMeridianRadioOff').is(':checked')){
    console.log('byebye');
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
    console.log('coucou');
    $('#arbiterRank').show();
    $('#arbiterRankLabel').show();
    $('#arbiterStanding').show();
    $('#arbiterStandingLabel').show();
    
}else if($('#arbiterRadioOff').is(':checked')){
    console.log('byebye');
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
    console.log('coucou');
    $('#cephalonRank').show();
    $('#cephalonRankLabel').show();
    $('#cephalonStanding').show();
    $('#cephalonStandingLabel').show();
    
}else if($('#cephalonRadioOff').is(':checked')){
    console.log('byebye');
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
    console.log('coucou');
    $('#perrinRank').show();
    $('#perrinRankLabel').show();
    $('#perrinStanding').show();
    $('#perrinStandingLabel').show();
    
}else if($('#perrinRadioOff').is(':checked')){
    console.log('byebye');
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
    console.log('coucou');
    $('#redVeilRank').show();
    $('#redVeilRankLabel').show();
    $('#redVeilStanding').show();
    $('#redVeilStandingLabel').show();
    
}else if($('#redVeilRadioOff').is(':checked')){
    console.log('byebye');
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
    console.log('coucou');
    $('#newLokaRank').show();
    $('#newLokaRankLabel').show();
    $('#newLokaStanding').show();
    $('#newLokaStandingLabel').show();
    
}else if($('#newLokaRadioOff').is(':checked')){
    console.log('byebye');
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


$('input').click(function(){
    checkTest();
});

$('#inscriptionForm').ready(function(){
    checkTest();
})