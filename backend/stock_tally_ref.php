<?php
include 'conn.php';

$stock_ref = $_REQUEST['stock_ref'];
$stock_date = $_REQUEST['stock_date'];

$sql_validation ="SELECT * FROM tbl_stock_tally_date WHERE st_tally_date='$stock_date'";
$rs_validation = $conn->query($sql_validation);

if($rs_validation->num_rows > 0){
  header('location:../view_stock_rep.php');
  $_SESSION['same_date'] = $stock_date;
  exit();
}

$sql_date = "INSERT INTO tbl_stock_tally_date (st_tally_date,st_tally_ref)
              VALUES ('$stock_date','$stock_ref')";
$rs_date = $conn->query($sql_date);

if($rs_date == 1){
  header('location:../view_stock_rep.php');
  $_SESSION['succ'] = true;
  exit();
}
else {
  header('location:../view_stock_rep.php');
  $_SESSION['err'] = true;
  exit();
}

 ?>
