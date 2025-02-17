<?php
include 'conn.php';


$date =mysqli_real_escape_string($conn,$_REQUEST['order_date']);
$ref =mysqli_real_escape_string($conn,$_REQUEST['order_ref']);



$sqlAdd = "INSERT INTO tbl_order_grm (order_ref,order_date) VALUES ('$ref','$date')";
$rsAdd = $conn->query($sqlAdd);

if ($rsAdd > 0) {
  $_SESSION['suc_ad_del'] = true;
  echo json_encode(array("statusCode"=>200));
  exit();
}



 ?>
