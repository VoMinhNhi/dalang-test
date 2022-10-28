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
          <input type="search" placeholder="Tìm theo id" name="search">
          <button type="submit">Submit</button>
     </form>
     <?php
     if (isset($_POST['search'])) {
          $search = $_POST['search'];
          global $wpdb;
          $tabel = $wpdb->prefix . "info_user";
          $listuser = $wpdb->get_results("SELECT * FROM $tabel WHERE id = $search"); ?>

          <?php if (!empty($listuser)) { ?>

               <table border="1">
                    <thead>
                         <tr>
                              <td>Id</td>
                              <td>Full name</td>
                              <td>Email</td>
                              <td>Address</td>
                              <td>Chức năng</td>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         foreach ($listuser as $user) { ?>
                              <tr>
                                   <td><?= $user->id ?></td>
                                   <td><?= $user->full_name ?></td>
                                   <td><?= $user->email ?></td>
                                   <td><?= $user->user_address ?></td>
                                   <td>
                                        <a href="admin.php?page=listuser&id=<?= $user->id ?>">Delete</a>
                                        <a href="admin.php?page=updateuser&id=<?= $user->id ?>">Edit</a>
                                   </td>
                              </tr>
                         <?php } ?>

                    </tbody>
               </table>

          <?php } else {?>
               <h1>Khong tim thay id <?= $search?> nay</h1>
            <?php }   ?>

     <?php } else { ?>
          <table border="1">
               <thead>
                    <tr>
                         <td>Full name</td>
                         <td>Email</td>
                         <td>Address</td>
                         <td>Chức năng</td>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    global $wpdb;
                    $tabel = $wpdb->prefix . "info_user";
                    $listuser = $wpdb->get_results("SELECT * FROM $tabel order by id desc");
                    foreach ($listuser as $user) { ?>
                         <tr>
                              <td><?= $user->full_name ?></td>
                              <td><?= $user->email ?></td>
                              <td><?= $user->user_address ?></td>
                              <td>
                                   <a href="admin.php?page=listuser&id=<?= $user->id ?>">Delete</a>
                                   <a href="admin.php?page=updateuser&id=<?= $user->id ?>">Edit</a>
                              </td>
                         </tr>
                    <?php }
                    if (isset($_GET['id'])) {
                         $id = $_GET['id'];
                         $wpdb->delete($tabel, array('id' => $id));
                    }
                    ?>
               </tbody>
          </table>
     <?php } ?>
</body>

</html>