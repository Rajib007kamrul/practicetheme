 <?php

function lapizzeria_save_reservation () {
  global $wpdb;
  //  && $_POST['hidden']  =="1"
  if(isset($_POST['reservation'])) {


    $name = sanitize_text_field( $_POST['name'] );
    $date = sanitize_text_field( $_POST['date'] );
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field ($_POST['phone']);
    $message = sanitize_text_field($_POST['message']);

    $table = $wpdb->prefix . 'reservation';

    $data = array(
        'name' => $name,
        'date' => $date,
        'email'=> $email,
        'phone'=> $phone,
        'message'=> $message
    );

    // $sql = "insert into wp_reservation
    // ('name','date','email','phone','message')
    // values ( $name, $date,$email,$phpne,$message);
    // ";
    //
    // mysql_query($sql);

    $format = array(
      '%s',
      '%s',
      '%s',
      '%s',
      '%s'
    );

    $insert = $wpdb->insert($table, $data, $format );

    $url = get_page_by_title('Thanks for your reservation!');
    wp_redirect( get_permalink($url) );
    exit();

    // error_log('mojalosss', $insert );
  }
}

 add_action('init', 'lapizzeria_save_reservation');


function prefix_send_email_to_admin() {
  error_log( print_r( $_POST,true ) );
  global $wpdb;
  //  && $_POST['hidden']  =="1"
  if(isset($_POST['reservation'])) {

    $name = $_POST['name'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $table = $wpdb->prefix . 'reservation';

    $data = array(
        'name' => $name,
        // 'date' => $date,
        'email'=> $email,
        'phone'=> $phone,
        'message'=> $message
    );

    // $sql = "insert into wp_reservation
    // ('name','date','email','phone','message')
    // values ( $name, $date,$email,$phpne,$message);
    // ";
    //
    // mysql_query($sql);

    $format = array(
      '%s',
      '%s',
      '%s',
      '%s',
      '%s'
    );

    // $insert = $wpdb->insert($table, $data, $format );
     $wpdb->insert( 'wp_reservation', $data );
    wp_redirect(home_url('contact' ));
  }
}

 // add_action( 'admin_post_nopriv_reservation_form', 'prefix_send_email_to_admin' );
 // add_action( 'admin_post_reservation_form', 'prefix_send_email_to_admin' );
?>
