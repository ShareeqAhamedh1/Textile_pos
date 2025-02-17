<?php

include './conn.php';

$type = $_REQUEST['button'];
$pay_type = $_REQUEST['pay_type'];
$ids =  $_REQUEST['prod_id'];
$store =  mysqli_real_escape_string($conn,$_REQUEST['store']);
$pickup =  mysqli_real_escape_string($conn,$_REQUEST['pickup']);
$customer_id =  mysqli_real_escape_string($conn,$_REQUEST['customer_id']);
$order_id =  mysqli_real_escape_string($conn,$_REQUEST['order_id']);
$delivery_charge =  mysqli_real_escape_string($conn,$_REQUEST['delivery_charge']);
$d_method = mysqli_real_escape_string($conn,$_REQUEST['d_method']);

$d_ref = $_REQUEST['del_ref'];
$pay_st = $_REQUEST['pay_st'];

$store_id =0;
if($store == "cardamom"){
  $store_id = 2;
}
else if($store == "fivestories"){
  $store_id = 1;
}


if(!$ids){
  header("location:../pos.php");
  exit();
}

if($type == "pending"){

  $sqlAddCustomer = "INSERT INTO tbl_order_customer (customer_id,status,delivery_charge,del_method,payment_type,store_id,pickup,del_ref,pay_st)
  VALUES ('$customer_id','1','$delivery_charge','$d_method','$pay_type','$store_id','$pickup','$d_ref','$pay_st')";

  $rsAddCustomer = $conn->query($sqlAddCustomer);

  $order_id = $conn->insert_id;

  foreach($ids as $id){
    $quantity = mysqli_real_escape_string($conn, $_REQUEST["quantity$id"]);
    $discount = mysqli_real_escape_string($conn, $_REQUEST["discount$id"]);
    $discount_type = mysqli_real_escape_string($conn,$_REQUEST["discount_type$id"]);
    $m_price = mysqli_real_escape_string($conn,$_REQUEST["m_price$id"]);

    $sqlAddCustomer = "INSERT INTO tbl_order_temp (product_id, quantity, customer_id, store, order_ref, discount,status,pickup,discount_type,m_price) VALUES ('$id','$quantity','$customer_id','$store','$order_id','$discount','1','$pickup','$discount_type','$m_price')";

    $rsAddCustomer = $conn->query($sqlAddCustomer);
  }

  if($rsAddCustomer >0){
    header("location:../call_center.php");
    exit();
  }else{
    header("location:../pos.php");
    exit();
  }
}elseif($type == "confirm"){
  $sqlAddCustomer = "INSERT INTO tbl_order_customer (customer_id,status,delivery_charge,del_method,payment_type,store_id,pickup,del_ref,pay_st)
  VALUES ('$customer_id','2','$delivery_charge','$d_method','$pay_type','$store_id','$pickup','$d_ref','$pay_st')";

  $rsAddCustomer = $conn->query($sqlAddCustomer);

  $order_id = $conn->insert_id;

  foreach($ids as $id){
    $quantity = mysqli_real_escape_string($conn, $_REQUEST["quantity$id"]);
    $discount = mysqli_real_escape_string($conn, $_REQUEST["discount$id"]);
    $discount_type = mysqli_real_escape_string($conn,$_REQUEST["discount_type$id"]);
    $m_price = mysqli_real_escape_string($conn,$_REQUEST["m_price$id"]);

    $sqlAddCustomer = "INSERT INTO tbl_order_temp (product_id, quantity, customer_id, store, order_ref, discount,status,pickup,discount_type,m_price) VALUES ('$id','$quantity','$customer_id','$store','$order_id','$discount','2','$pickup','$discount_type','$m_price')";

    $rsAddCustomer = $conn->query($sqlAddCustomer);
  }

  if($rsAddCustomer >0){
    header("location:../call_center.php");
    exit();
  }else{
    header("location:../pos.php");
    exit();
  }
}
