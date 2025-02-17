<?php

include './conn.php';

$name = $_REQUEST['sales_name'];
$location = $_REQUEST['location'];
$id = $_REQUEST['id'];

$sqlAddCustomer = "UPDATE tbl_sales_point SET sale_point_name='$name', point_location='$location' WHERE id='$id'";

$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  $_SESSION['suc_cus_edited'] = true;
  header("location:../sales_list.php");
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../sales_list.php");
  exit();
}
