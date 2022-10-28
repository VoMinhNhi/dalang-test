<?php
/*
Plugin Name: Menu info_user 
Description: Crate menu in wordpress
Author: Minh Nhi
Version: 1.0.0
*/



// Tạo plugin trong menu
function my_menu_page()
{
    add_menu_page('user', 'All user', 'manage_options', 'listuser', 'list_user');
    add_submenu_page('listuser', 'Add user', 'Add user', 'manage_options', 'adduser', 'page_user');
    add_submenu_page('', 'Edit user', 'Edit user', 'manage_options', 'updateuser', 'update_user');
}

add_action('admin_menu', 'my_menu_page');

function page_user()
{
    // =========   begining the form  =================
    include('form_user.php');
    // echo '<h2>Form nhap thong tin user</h2>';
    // echo '<form id="regForm" action="" method="POST">';
    // echo 'Full name <br/>';
    // echo '<input type="text" name="full_name"><br/>';
    // echo 'Email user<br/>';
    // echo '<input type="text" name="email"><br/>';
    // echo 'Address user<br/><br/>';
    // echo '<input type="text" name="user_address"><br/><br/>';
    // echo '<input type="submit" name="btnLuu" value="Gui">';
    // echo '</form>';
}
function update_user()
{
    include('update_user.php');
}

function list_user()
{
    include('list_user.php');
    // global $wpdb;
    // echo '<table border="1">';
    // echo '<tr>';
    // echo '<th>ID</th>';
    // echo '<th>Full name</th>';
    // echo '<th>Address</th>';
    // echo '<th>Email</th>';
    // echo '<th>Chuc nang</th>';
    // echo '</tr>';

    // $tabel = $wpdb->prefix . "info_user";
    // $selectie_date_concurenti = $wpdb->get_results("SELECT * FROM $tabel order by id desc");
    // foreach ($selectie_date_concurenti as $data) {
    //     $id = $data->id;
    //     $name = $data->full_name;
    //     $email = $data->email;
    //     $adress = $data->user_address;


    //     echo '<tr>';
    //     echo '<td>' . $id . '</td>';
    //     echo '<td>' . $name . '</td>';
    //     echo '<td>' . $email . '</td>';
    //     echo '<td>' . $adress . '</td>';
    //     echo '<td><a href="./listuser='. $id .' ">Xoa</a></td>';
    //     echo '</tr>';
    // }
    // echo '</table>';
}
