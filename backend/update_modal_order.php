<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];
$data = json_decode($_REQUEST['data']);

foreach($data as $key => $value){
  list($column, $id) = explode('[', rtrim($key, ']'));

  $query = "UPDATE tbl_order SET $column = '$value' WHERE id = '$id'";
  mysqli_query($conn, $query);
  //
  // if($column == 'discount_type'){
  //   $discount_query = "SELECT product_id,discount_type, discount FROM tbl_order WHERE id = '$id'";
  //   $result = mysqli_query($conn, $discount_query);
  //   $row = mysqli_fetch_assoc($result);
  //   $discount_type = $row['discount_type'];
  //   $discount_value = $row['discount'];
  //   $product_id = $row['product_id'];
  //
  //   $discount_query = "SELECT price FROM tbl_product WHERE id = '$product_id'";
  //   $result = mysqli_query($conn, $discount_query);
  //   $row = mysqli_fetch_assoc($result);
  //   $ori_price = $row['price'];
  //
  //   if ($discount_type == 'f') {
  //     $price = $ori_price - $discount_value;
  //   } else {
  //     $price = $ori_price - ($ori_price * $discount_value / 100);
  //   }
  //
  //   $price_query = "UPDATE tbl_order SET m_price = '$price' WHERE id = '$id'";
  //   mysqli_query($conn, $price_query);
  // }
}


  echo json_encode(array("statusCode"=>200));
  exit();
