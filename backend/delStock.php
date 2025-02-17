<?php
include 'conn.php';

$id = $_REQUEST['id'];
$pid = $_REQUEST['pid'];

  $sqlDeleteAd= "DELETE FROM tbl_expiry_date WHERE id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    header('location:../product-details.php?id='.$pid);
    exit();
  }
  else {
    header('location:../product-details.php?id='.$pid);
    exit();
  }



 ?>
