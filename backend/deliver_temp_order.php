<?php
include 'conn.php';

$id = $_REQUEST['order_id'];


  $sqlDeleteAd= "UPDATE tbl_order_temp
SET status = 4
WHERE order_ref='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);

  $sqlDeleteAd= "UPDATE tbl_order_customer
SET status = 4
WHERE order_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);

  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    echo json_encode(array("statusCode"=>200));
    exit();
  }



 ?>
