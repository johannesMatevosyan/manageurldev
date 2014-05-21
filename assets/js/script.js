$(document).ready(function(){

  $('#info>div:not(:first)').hide(); // to hide all tabs except the first one

  $('#info-nav li').click(function(event) {

  var clicked = $(this).find('a:first').attr('href');
  var cuurent_id = $('#info-nav .current').attr('class').split(' ')[0];

      /***********************************************/

      if(clicked == '#' + cuurent_id){

          window.location.href = "?current=" + cuurent_id;

      }
      else{
    /*********************************************/

        event.preventDefault();  // prevent default error situation if something happened
        $('#info>div').hide();
        $('#info-nav .current').removeClass("current");
        $(this).addClass('current');

        $('#info ' + clicked).fadeIn('fast');

      }

  }).eq(0).addClass('current');

    /************************************************************/

    if(typeof(current) != "undefined" && current !== null){
        $('#info-nav .current').removeClass("current");
        $('.' + current).addClass('current');
        $('#info>div').hide();
        $('#info #' + current).fadeIn('fast');

    }
    /************************************************************/

});