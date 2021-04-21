<?php
function lapizzeria_options() {
  add_menu_page( 'La Pizzeria', 'La Pizzeria Options', 'administrator', 'lapizzeria_options','lapizzeria_adjustments', '', 20 );

  add_submenu_page('lapizzeria_options','Reservations', 'Reservations', 'administrator', 'lapizzeria_reservations', 'lapizzeria_reservations' );
}
add_action('admin_menu', 'lapizzeria_options');

function lapizzeria_settings() {
  //Googlemap group

  register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_latitude');
  register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_longitude');
  register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_zoom');
  register_setting('lapizzeria_options_gmaps', 'lapizzeria_gmaps_apikey');

  //Information  group
  register_setting('lapizzeria_options_info', 'lapizzeria_location');
  register_setting('lapizzeria_options_info', 'lapizzeria_phonenmber');


}

add_action ('init', 'lapizzeria_settings');

function lapizzeria_adjustments() { ?>
  <div class="wrap">
    <h1>La Pizzeria Adjustments</h1>
    <form  action="options.php" method="post">
      <?php
        settings_fields( 'lapizzeria_options_gmaps');
        do_settings_sections( 'lapizzeria_options_gmaps');
      ?>
      <h2>Google Maps</h2>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Latitde: </th>
          <td>
            <input type="text" name="lapizzeria_gmaps_latitude" value="<?php echo esc_attr( get_option('lapizzeria_gmaps_latitude') ); ?>">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Longitude: </th>
          <td>
            <input type="text" name="lapizzeria_gmaps_longitude" value="<?php echo esc_attr( get_option('lapizzeria_gmaps_longitude') ); ?>">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Zoom Level: </th>
          <td>
            <input type="text" name="lapizzeria_gmaps_zoom" value="<?php echo esc_attr( get_option('lapizzeria_gmaps_zoom') ); ?>">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">API key: </th>
          <td>
            <input type="text" name="lapizzeria_gmaps_apikey" value="<?php echo esc_attr( get_option('lapizzeria_gmaps_apikey') ); ?>">
          </td>
        </tr>
      </table>

      <?php
        settings_fields( 'lapizzeria_options_info');
        do_settings_sections( 'lapizzeria_options_info');
      ?>
      <h2>Other Adjstments</h2>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Address: </th>
          <td>
            <input type="text" name="lapizzeria_location" value="<?php echo esc_attr( get_option('lapizzeria_location') ); ?>">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Phone Nmber: </th>
          <td>
            <input type="text" name="lapizzeria_phonenmber" value="<?php echo esc_attr( get_option('lapizzeria_phonenmber') ); ?>">
          </td>
        </tr>
      </table>

      <?php submit_button(); ?>
    </form>
  </div>

<?php }

function lapizzeria_reservations() { ?>
    <div class="wrap">
      <h1>Reservations</h1>
      <table class="wp-list-table widefat striped">
        <thead>
          <tr>
            <th class="manage-column">ID</th>
            <th class="manage-column">Name</th>
            <th class="manage-column">Date of Reservations</th>
            <th class="manage-column">Email</th>
            <th class="manage-column">Phone Number</th>
            <th class="manage-column">Message</th>
          </tr>
        </thead>

        <tbody>
            <?php
                global $wpdb;
                $table = $wpdb->prefix . 'reservation';
                $reservations = $wpdb->get_results("SELECT * FROM $table", ARRAY_A);
                foreach($reservations as $reservation): ?>

                      <tr>
                        <td><?php echo $reservation['id']; ?></td>
                        <td><?php echo $reservation['name']; ?></td>
                        <td><?php echo $reservation['date']; ?></td>
                        <td><?php echo $reservation['email']; ?></td>
                        <td><?php echo $reservation['phone']; ?></td>
                        <td><?php echo $reservation['message']; ?></td>

                      </tr>
                <?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php }

?>
