<?php
include 'conn.php';

$id = $_REQUEST['sub_cat_id'];


  $sqlDeleteAd= "DELETE FROM tbl_sub_category WHERE id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);
  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    echo json_encode(array("statusCode"=>200));
    exit();
  }



 ?>
