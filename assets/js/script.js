$(document).ready(function(){
  $('#info>div:not(:first)').hide(); // to hide all tabs except the first one
  
  $('#info-nav li').click(function(event) {
    event.preventDefault();  // prevent default error situation if something happened
    $('#info>div').hide();
    $('#info-nav .current').removeClass("current");
    $(this).addClass('current');
    
    var clicked = $(this).find('a:first').attr('href');
    $('#info ' + clicked).fadeIn('fast');
  }).eq(0).addClass('current');
});
