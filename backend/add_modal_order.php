<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];
$prod_id = mysqli_real_escape_string($conn, $_REQUEST['prod_id']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
$grm_ref = mysqli_real_escape_string($conn, $_REQUEST['grm_ref']);
$pickup = mysqli_real_escape_string($conn, $_REQUEST['pickup']);
$customer_id = mysqli_real_escape_string($conn, $_REQUEST['customer_id']);
$price = mysqli_real_escape_string($conn, $_REQUEST['price']);
$discount = mysqli_real_escape_string($conn, $_REQUEST['discount']);
$discount_type = mysqli_real_escape_string($conn, $_REQUEST['discount_type']);




$sqlAddCustomer = "INSERT INTO tbl_order (product_id,quantity,customer_id,pickup, grm_ref,m_price,discount,discount_type)
 VALUES('$prod_id','$quantity','$customer_id','$pickup','$grm_ref','$price','$discount','$discount_type')";


$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  echo json_encode(array("statusCode"=>200));
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../update_stock.php");
  exit();
}
