<?php
include './conn.php';
$ids =  $_REQUEST['prod_id'];
if(!$ids){
  header("location:../product_bulk_edit.php");
  exit();
}

foreach($ids as $id){
  $name = mysqli_real_escape_string($conn, $_REQUEST["name$id"]);
  $barcode = mysqli_real_escape_string($conn, $_REQUEST["barcode$id"]);
  $category_id = mysqli_real_escape_string($conn, $_REQUEST["category_id$id"]);

  $brand = mysqli_real_escape_string($conn, $_REQUEST["brand$id"]);
  $price = mysqli_real_escape_string($conn, $_REQUEST["price$id"]);
  $discount = mysqli_real_escape_string($conn, $_REQUEST["discount$id"]);

  $sqlAddCustomer = "UPDATE tbl_product SET
                      name='$name',
                      category_id='$category_id',

                      brand_id='$brand_id',
                      barcode='$barcode',
                      price='$price',
                      discount='$discount' WHERE id='$id'";

  $rsAddCustomer = $conn->query($sqlAddCustomer);
}


    $_SESSION['suc_cus_edited'] = true;
    header("location:../product_bulk_edit.php");
    exit();
  
