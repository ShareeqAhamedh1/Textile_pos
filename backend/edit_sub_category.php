<?php

include './conn.php';

$name = $_REQUEST['sub_cat_name'];
$category_id = $_REQUEST['category_id'];
$id = $_REQUEST['id'];

$sqlAddCustomer = "UPDATE tbl_sub_category SET name='$name', category_id='$category_id' WHERE id='$id'";

$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  $_SESSION['suc_cus_edited'] = true;
  header("location:../subcategorylist.php");
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../subcategorylist.php");
  exit();
}
