<?php

include 'conn.php';

$user_id =$_REQUEST['user_id'];

foreach ($_POST as $key => $value) {
    if (strpos($key, 'page_link-delete-') === 0) {
        $page_id = substr($key, strlen('page_link-delete-')); // Extract page_id from the key

        if(isset($_REQUEST['page_link-edit-'.$page_id])){
          $edit_ac = 1;
        }
        else {
          $edit_ac = 0;
        }

        if(isset($_REQUEST['page_link-delete-'.$page_id])){
          $delete_ac = 1;
        }
        else {
          $delete_ac = 0;
        }

        $sql_add_acc = "INSERT INTO tbl_page_access (pa_link_id,pa_d_acc,pa_e_acc,u_id) VALUES ('$page_id','$delete_ac','$edit_ac','$user_id')";
        $rs_add_acc = $conn->query($sql_add_acc);
    }
}

header('location:../user_access.php');
exit();

 ?>
