<?php
include 'conn.php';


$name =$_REQUEST['sub_cat_name'];
$cat_id =$_REQUEST['category_id'];

$sqlAdd = "INSERT INTO tbl_sub_category (name,category_id) VALUES ('$name','$cat_id')";
$rsAdd = $conn->query($sqlAdd);

if($rsAdd > 0){
  $_SESSION['suc_cus'] = true;
  header('location:../subaddcategory.php');
  exit();
}
else{
  $_SESSION['error_cus'] = true;
  header('location:../subaddcategory.php');
  exit();

}


 ?>
