//$ = jQuery.noConflict();

jQuery(document).ready( function($) {
  // present standard

  $(document).on('click', '.mobile-menu a', function() {
      $('nav.site-nav').toggle('slow');
  });

  var breakpoint = 768;

  $(window).resize(function() {
       boxAdjustment();
        if($(document).width() >= breakpoint) {
          $('nav.site-nav').show();
        }else{
          $('nav.site-nav').hide();
        }
  });

  function boxAdjustment() {

  }

 // fluidbox plugin

$('.gallery a').fluidbox();

/*
 jQuery('.gallery a').each( function() {
  //  jQuery(this).attr({'date-fluidbox': });
 });

 if(jQuery('[date-fluidbox]').length > 0 ) {
   jQuery('[date-fluidbox]').fluidbox();
 }

*/

/*
  $('.mobile-menu a').on('click', function(e) {
    e.preventDefault();
    alert("You clicked the menu button");
  })
*/
});
