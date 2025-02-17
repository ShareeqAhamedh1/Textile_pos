<?php
include 'conn.php';

$id = $_REQUEST['order_id'];


  $sqlDeleteAd= "DELETE FROM tbl_order_grm WHERE id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);

  $sqlDeleteAd= "DELETE FROM tbl_order WHERE grm_ref='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    echo json_encode(array("statusCode"=>200));
    exit();
  }



 ?>
