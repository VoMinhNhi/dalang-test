<?php

global $wpdb;
$tabel = $wpdb->prefix . "info_user";
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $listuser = $wpdb->get_results("SELECT * FROM $tabel where id = $id");
     foreach ($listuser as $user) {
          $id = $user->id;
          $name = $user->full_name;
          $email = $user->email;
          $address = $user->user_address;
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <form action="" method="post">
          <div>
               <label for="">Name user:</label>
               <input type="text" name="full_name" value="<?= $name ?>">
          </div>
          <div>
               <label for="">Email:</label>
               <input type="text" name="email" value="<?= $email ?>">
          </div>
          <div>
               <label for="">Address user:</label>
               <input type="text" name="user_address" value="<?= $address ?>">
          </div>
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="submit" name="btnCapNhat" value="Cập nhật">
     </form>
</body>

</html>

<?php
if (isset($_POST['btnCapNhat'])) {
     global $wpdb;
     $tabel = $wpdb->prefix . "info_user";

     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $email = $_POST['email'];
     $user_address = $_POST['user_address'];

     $sql = $wpdb->update(
          $tabel,
          array(
               'full_name' => $full_name,
               'email' => $email,
               'user_address' => $user_address
          ),
          array('id' => $id)
     );

     $wpdb->query($wpdb->prepare($sql));
     if ($sql == true) {
          echo "<script> alert('Sua thanh cong')</script>";
     } else {
          echo "<script> alert('Sua that bai')</script>";
     }
     echo "<script>window.open('admin.php?page=listuser','_self')</script>";
}

?>