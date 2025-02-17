<?php
include 'conn.php';

$id = $_REQUEST['id'];

$sqlDeleteUser= "DELETE FROM tbl_user WHERE user_id='$id'";
$rsDelUser = $conn->query($sqlDeleteUser);


  if ($rsDelUser > 0) {
    header('location:../add_user.php');
    exit();
  }
  else{
    header('location:../add_user.php');
    exit();
  }



 ?>
