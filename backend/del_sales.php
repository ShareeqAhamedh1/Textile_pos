<?php
include 'conn.php';

$id = $_REQUEST['sales_id'];


  $sqlDeleteAd= "DELETE FROM tbl_sales_point WHERE id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    echo json_encode(array("statusCode"=>200));
    exit();
  }



 ?>
