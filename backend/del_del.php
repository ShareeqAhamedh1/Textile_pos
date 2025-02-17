<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_delivery_methods WHERE dlm_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);

  if($rsDelAd > 0){
    $_SESSION['suc_del'] = true;
    header('location:../adddelivery.php');
    exit();
  }
  else{
    $_SESSION['error_del'] = true;
    header('location:../adddelivery.php');
    exit();
  }



 ?>
