<?php

include './conn.php';

$id =$_REQUEST['id'];
$name =$conn->real_escape_string($_REQUEST['name']);
$category_id =$_REQUEST['category_id'];
$sub_cat_id =$_REQUEST['sub_cat_id'];
$brand_id =$_REQUEST['brand_id'];
$unit =$_REQUEST['unit_id'];
$barcode =$_REQUEST['barcode'];
$minimum_quantity =$_REQUEST['minimum_quantity'];
$quantity =$_REQUEST['quantity'];
// $sale_point_id =$_REQUEST['sale_point_id'];
$manual_date =$_REQUEST['manual_date'];
$price =$_REQUEST['price'];
$status =$_REQUEST['status'];
$discount =$_REQUEST['discount'];

$description =$conn->real_escape_string($_REQUEST['description']);
$st_description =$conn->real_escape_string($_REQUEST['st_description']);

$sqlAddCustomer = "UPDATE tbl_product SET
                    name='$name',
                    category_id='$category_id',
                    sub_category_id='$sub_cat_id',
                    brand_id='$brand_id',
                    unit='$unit',
                    barcode='$barcode',
                    minimum_quantity='$minimum_quantity',
                    quantity='$quantity',
                    price='$price',
                    manual_date='$manual_date',
                    description='$description',
                    discount='$discount',
                    status='$status'
                    -- sale_point_id='$sale_point_id' 
                    WHERE id='$id'";

$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  $_SESSION['suc_cus_edited'] = true;
  header("location:../productlist.php");
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../categorylist.php");
  exit();
}



// $sql = "SELECT * FROM tbl_stock WHERE p_id = '$id' ORDER BY id DESC LIMIT 1";
//
// $rs = $conn->query($sql);
//
// $row = $rs->fetch_assoc();
//
// if($row['stock'] != $quantity){
//   $sql = "INSERT INTO tbl_stock (p_id, stock, description, sale_point_id) VALUES ('$id', '$quantity', '$st_description', '$sale_point_id')";
//
//   $rs = $conn->query($sql);
// }
//
// if($rsAddCustomer > 0){
//   $_SESSION['suc_cus_edited'] = true;
//   header("location:../productlist.php");
//   exit();
// }else{
//   $_SESSION['error_cus_edited'] = true;
//   header("location:../categorylist.php");
//   exit();
// }
