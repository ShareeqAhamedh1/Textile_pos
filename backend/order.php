<?php
include './conn.php';

$type = $_REQUEST['button'];
$ids =  $_REQUEST['prod_id'];
$order_date = $_REQUEST['order_date'];
$order_ref = $_REQUEST['order_ref'];
// $pickup =  mysqli_real_escape_string($conn,$_REQUEST['pickup']);
$customer_id =  mysqli_real_escape_string($conn,$_REQUEST['customer_id']);
// $delivery_charge =  mysqli_real_escape_string($conn,$_REQUEST['delivery_charge']);
// $d_method = mysqli_real_escape_string($conn,$_REQUEST['d_method']);
$store_id = mysqli_real_escape_string($conn,$_REQUEST['store_id']);
// $del_ref = mysqli_real_escape_string($conn,$_REQUEST['del_ref']);
$pay_st = mysqli_real_escape_string($conn,$_REQUEST['pay_st']);


$sqlTell = "SELECT * FROM tbl_order_grm WHERE order_date='$order_date' ";
$rsTell = $conn->query($sqlTell);

if($rsTell->num_rows == 0){
  $ref_num = $order_date . "-1";
}
else {
  $ref_num = $order_date ."-". ($rsTell->num_rows+1);
}
$order_ref = $ref_num;


if(!$ids){
  header("location:../pos.php?err");
  exit();
}

// $sqlAddCustomer = "UPDATE tbl_order_grm ,SET payment_type='$type', delivery_charge='$delivery_charge',del_method='$d_method' WHERE id='$order_id'";
$sqlAddCustomer = "INSERT INTO tbl_order_grm (order_ref, order_date, payment_type, delivery_charge,
   del_method,customer_id,pickup,store_id,del_ref,pay_st) VALUES
('$order_ref','$order_date','$type','$delivery_charge','$d_method','$customer_id','$pickup','$store_id','$del_ref','$pay_st')";
$rsAddCustomer = $conn->query($sqlAddCustomer);
$order_id = $conn->insert_id;

foreach($ids as $id){
  $quantity = mysqli_real_escape_string($conn, $_REQUEST["quantity$id"]);
  $discount = mysqli_real_escape_string($conn, $_REQUEST["discount$id"]);
  $discount_type = mysqli_real_escape_string($conn,$_REQUEST["discount_type$id"]);
  $m_price = mysqli_real_escape_string($conn,$_REQUEST["m_price$id"]);

  if($discount_type=="percentage"){
    $discount_type = "p";
  }else{
    $discount_type = "a";
  }

  $sqlAddCustomer = "INSERT INTO tbl_order (product_id, quantity, customer_id, grm_ref,discount,discount_type,bill_date,m_price)
   VALUES ('$id','$quantity','$customer_id','$order_id','$discount','$discount_type','$order_date','$m_price')";

  $rsAddCustomer = $conn->query($sqlAddCustomer);

}

  if($rsAddCustomer >0){
    unset($_SESSION['order_ref']);
    unset($_SESSION['order_date']);

    header("location:../pos.php");
    exit();
  }else{
    header("location:../pos.php");
    exit();
  }
