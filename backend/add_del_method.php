<?php
include 'conn.php';


$dlm_name =$_REQUEST['dlm_name'];


$sqlAdd = "INSERT INTO tbl_delivery_methods (dlm_name) VALUES ('$dlm_name')";
$rsAdd = $conn->query($sqlAdd);

if($rsAdd > 0){
  $_SESSION['suc_cus'] = true;
  header('location:../adddelivery.php');
  exit();
}
else{
  $_SESSION['error_cus'] = true;
  header('location:../adddelivery.php');
  exit();
}


 ?>
