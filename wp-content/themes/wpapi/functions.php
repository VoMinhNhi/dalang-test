<?php
add_action('plugins_loaded', 'test');
function test() {
     error_log('loaed plugins');
}

// Load style
// function load_webapi_style()
// {
//      wp_enqueue_style('wpapi', plugins_url(__FILE__ . 'stye.css'));
// }
// // add_action('wp_enqueue_scripts', 'load_webapi_style', 15);

// function formular_frontend()
// {

//      global $wpdb;
//      $tabel_concurenti = $wpdb->prefix . "info_user";
//      $check_table_query = "SHOW TABLES LIKE '" . $tabel_concurenti . "'";
//      $tabel = $wpdb->query($check_table_query);

//      if (!$tabel) {
//           //creare tabel in baza de date
//           $charset_collate = $wpdb->get_charset_collate();
//           $creare_tabel = "CREATE TABLE $tabel_concurenti (
//                    id int(9) NOT NULL AUTO_INCREMENT,
//                    full_name varchar(255) DEFAULT '' NOT NULL,
//                    email varchar(255) DEFAULT '' NOT NULL,
//                    user_address varchar(255) DEFAULT '' NOT NULL,
//                    PRIMARY KEY (id)
//                ) $charset_collate;";
//           $wpdb->query($creare_tabel);
//      }
// }

// // 
// add_action('init', 'formular_frontend');


// function get_user()
// {

//      if (isset($_POST['btnLuu'])) {
//           global $wpdb;
//           $tabel_concurenti2 = $wpdb->prefix . "info_user";

//           $full_name = $_POST['full_name'];
//           $email = $_POST['email'];
//           $user_address = $_POST['user_address'];

//           $sql1 = $wpdb->insert($tabel_concurenti2, array("full_name" => $full_name, "user_address" => $user_address, "email" => $email));
//           $wpdb->query($wpdb->prepare($sql1));
//           if ($sql1 == true) {
//                echo "<script> alert('Them thanh cong')</script>";
//           } else {
//                echo "<script> alert('Them that bai')</script>";
//           }
//      }
// }

// add_action('init', 'get_user');


// function update_user()
// {
//      if (isset($_POST['btnCapNhat'])) {
//           global $wpdb;
//           $tabel = $wpdb->prefix . "info_user";

//           $id = $_POST['id'];
//           $full_name = $_POST['full_name'];
//           $email = $_POST['email'];
//           $user_address = $_POST['user_address'];

//           $wpdb->update(
//                $tabel,
//                array(
//                     'full_name' => $full_name,
//                     'email' => $email,
//                     'user_address' => $user_address
//                ),
//                array('id' => $id)
//           );
//      }
// }