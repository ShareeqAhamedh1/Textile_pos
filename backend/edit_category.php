<?php

include './conn.php';

$name = $_REQUEST['name'];
$id = $_REQUEST['id'];

$sqlAddCustomer = "UPDATE tbl_category SET name='$name' WHERE id='$id'";

$rsAddCustomer = $conn->query($sqlAddCustomer);

if($rsAddCustomer > 0){
  $_SESSION['suc_cus_edited'] = true;
  header("location:../categorylist.php");
  exit();
}else{
  $_SESSION['error_cus_edited'] = true;
  header("location:../categorylist.php");
  exit();
}
