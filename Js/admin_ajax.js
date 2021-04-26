$ =jQuery.noConflict();

$(document).ready(function() {

  $('.remove_reservation').on('click', function(e) {
      e.preventDefault();
        var id = $(this).attr('data-reservatio');

        $.ajax({
          type:'POST',
          data: {
              'action': 'lapizzeria_delete_reservation',
              'id': id,
              'type': 'delete'
          },
          url: admin_ajax.ajaxurl,
          success: function(data) {
            var result = json.parse(data);
            if (result.response == 'success') {
                  jQuery("[data-reservatio='"+result.id +"']").parent().parent().remove();

                  Swal.fire(
                        'Reservation Delete!',
                        'Success, the reservation was deleted!',
                        'success'
                      )
            }

          }
        });
  });
});
