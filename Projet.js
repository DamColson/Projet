function form(){
  $('#mainContent').empty();
  $('#divHomeText').fadeOut('1000',function(){});
  $('#inscriptionForm').removeClass('d-none');

}

function backHome(){
  location.reload();
}
$('#inscription').click(form);
$('#home').click(backHome);
