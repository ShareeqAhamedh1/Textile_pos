<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];
$prod_id = mysqli_real_escape_string($conn, $_REQUEST['prod_id']);
$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
$order_id = mysqli_real_escape_string($conn, $_REQUEST['order_id']);
$store = mysqli_real_escape_string($conn, $_REQUEST['store']);
$customer_id = mysqli_real_escape_string($conn, $_REQUEST['customer_id']);
$price = mysqli_real_escape_string($conn, $_REQUEST['price']);
$discount = mysqli_real_escape_string($conn, $_REQUEST['discount']);
$discount_type = mysqli_real_escape_string($conn, $_REQUEST['discount_type']);



$sqlAddCustomer = "INSERT INTO tbl_order_temp (product_id,quantity,customer_id,store, order_ref,m_price,discount,discount_type)
 VALUES('$prod_id','$quantity','$customer_id','$store','$order_id','$price','$discount','$discount_type')";

$rsAddCustomer = $conn->query($sqlAddCustomer);

$last_id = $conn->insert_id;

$sql_ref ="SELECT * FROM tbl_order_customer WHERE order_id='$order_id'";
$rs_ref = $conn->query($sql_ref);

$row_ref = $rs_ref->fetch_assoc();

$ord_sta = $row_ref['status'];

$sql_update_order_status = "UPDATE tbl_order_temp SET status='$ord_sta' WHERE id='$last_id'";
$rs_update_order_status = $conn->query($sql_update_order_status);


if($rsAddCustomer > 0){
  echo json_encode(array("statusCode"=>200));
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../update_stock.php");
  exit();
}
