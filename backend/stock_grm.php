<?php
include 'conn.php';


$date =mysqli_real_escape_string($conn,$_REQUEST['stock_date']);
$ref =mysqli_real_escape_string($conn,$_REQUEST['stock_ref']);
$user_id = $_SESSION['u_id'];



$sqlAdd = "INSERT INTO tbl_stock_grm (stock_ref,stock_date,user_id) VALUES ('$ref','$date','$user_id')";
$rsAdd = $conn->query($sqlAdd);

if ($rsAdd > 0) {
  $_SESSION['suc_ad_del'] = true;
  echo json_encode(array("statusCode"=>200));
  exit();
}



 ?>
