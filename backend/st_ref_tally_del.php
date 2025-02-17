<?php
include 'conn.php';

$id = $_REQUEST['id'];


  $sqlDelete= "DELETE FROM tbl_stock_tally_date WHERE st_tally_id='$id'";
  $rsDel = $conn->query($sqlDelete);

  $sqlDeleteAll = "DELETE FROM tbl_tally_stock WHERE st_ref_id='$id'";
  $rsDel = $conn->query($sqlDeleteAll);
  if ($rsDel > 0) {
    header('location:../view_stock_rep.php');
    exit();
  }



 ?>
