//$ = jQuery.noConflict();

jQuery(document).ready( function($) {
  // present standard
  $(document).on('click', '.mobile-menu a', function(e) {
      // e.preventDefault();
      // alert("You clicked the menu button");
        $('nav.site-nav').toggle('slow');
  });

  var backdrop = 768;
  $(window).resize(function() {
        if($(document).width() >= breakpoint) {
          $('nav.site-nav').show();
        }else{
          $('nav.site-nav').hide();
        }
  });


/*
  $('.mobile-menu a').on('click', function(e) {
    e.preventDefault();
    alert("You clicked the menu button");
  })
*/
});
