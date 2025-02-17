<?php
include 'conn.php';


$sales_name =$_REQUEST['sales_name'];
$location =$_REQUEST['location'];

$sqlAdd = "INSERT INTO tbl_sales_point (sale_point_name, point_location) VALUES ('$sales_name','$location')";
$rsAdd = $conn->query($sqlAdd);

if($rsAdd > 0){
  $_SESSION['suc_cus'] = true;
  header('location:../add_sales_point.php');
  exit();
}
else{
  $_SESSION['error_cus'] = true;
  header('location:../addbrand.php');
  exit();

}


 ?>
