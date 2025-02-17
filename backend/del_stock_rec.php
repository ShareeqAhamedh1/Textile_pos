<?php
include 'conn.php';

$id = $_REQUEST['stock_id'];


  $sqlDeleteAd= "DELETE FROM tbl_expiry_date WHERE id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);


  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    echo json_encode(array("statusCode"=>200));
    exit();
  }



 ?>
