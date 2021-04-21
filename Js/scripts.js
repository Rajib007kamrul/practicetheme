  var map;
  function initMap() {

      var latLng = {
        lat : parseFloat( options.latitude ) ,
        lng : parseFloat( options.longitude )
      };
  map = new google.maps.Map(document.getElementById("map"), {
  center: latLng,
  zoom: parseInt( options.zoom),
  });
  var marker = new google.maps.Marker({
    position: latLng,
    map:map,
    title: 'La Pizzeria'
  });

  }

jQuery(document).ready( function($) {
    // adapt map to height
   var map = $('#map');
   let breakpoint = 1000;
     if(map.length > 0) {
       if($(document).width() >=  breakpoint) {
        displayMap(0, $);
       } else {
         displayMap(300,$);
       }
     }


    $(window).resize(function(){
        if($(document).width() >=  breakpoint) {
         displayMap(0);
        } else {
          displayMap(300);
        }
    });


});





//$ = jQuery.noConflict();

jQuery(document).ready( function($) {
  // present standard

  $(document).on('click', '.mobile-menu a', function() {
      $('nav.site-nav').toggle('slow');
  });

  var breakpoint = 768;

  $(window).resize(function() {
      if($(document).width() >= breakpoint) {
        $('nav.site-nav').show();
      }else{
        $('nav.site-nav').hide();
      }
  });

 // fluidbox plugin
 $('.gallery a').fluidbox();

});


function displayMap(value,$){
    if(value == 0){
      var locationSection = $('.location-reservation');
      var locationHeight = locationSection.height();
      $('#map').css({'height': locationHeight});
    } else {
      $('#map').css({'height': value});
    }
}
