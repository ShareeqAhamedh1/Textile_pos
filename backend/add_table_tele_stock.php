<?php include 'conn.php';

$r_id = $_REQUEST['r_id'];
$prod_id = $_REQUEST['prod_id'];
$quantity = $_REQUEST['quantity'];
$expiry_date = $_REQUEST['expiry_date'];
$note = $_REQUEST['note'];
$add_or_sub = $_REQUEST['add_or_sub'];

$sql_add = "INSERT INTO tbl_tally_stock
            (add_minus,new_quantity,exp_date,manual_note,product_id,st_ref_id)
            VALUES ('$add_or_sub','$quantity','$expiry_date','$note','$prod_id','$r_id')";
$rs_add = $conn->query($sql_add);

if($rs_add == 1){
  echo json_encode(array("statusCode"=>200));
  exit();
}

 ?>
