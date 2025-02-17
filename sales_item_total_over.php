<?php
include './backend/conn.php';

$tot_items = 0;

$prod_id = array();
if(isset($_REQUEST['sel_date'])){
  $date_today = $_REQUEST['sel_date'];
}
else {
  $date_today = date("Y-m-d");
}
$sql_order_call = "SELECT * FROM tbl_order_temp WHERE status = '2' AND date(bill_date) = '$date_today'";
$rs_order_call = $conn->query($sql_order_call);
if($rs_order_call->num_rows > 0){
  while($rowOrder = $rs_order_call->fetch_assoc()){
    array_push($prod_id,$rowOrder['product_id']);
    // echo $rowOrder['product_id']."<br>";
  }
}
$prod_id = array_unique($prod_id);
$tot_items += count($prod_id);

$prod_id = array();

$sql_order_call = "SELECT * FROM tbl_order WHERE date(bill_date) = '$date_today'";
$rs_order_call = $conn->query($sql_order_call);
if($rs_order_call->num_rows > 0){
  while($rowOrder = $rs_order_call->fetch_assoc()){
    array_push($prod_id,$rowOrder['product_id']);
    // echo $rowOrder['product_id']."<br>";
  }
}
$prod_id = array_unique($prod_id);

$tot_items +=count($prod_id);
 ?>



     <h4><?= $tot_items ?></h4>
     <h5>Total Items Sold Today</h5>
     <p>(<?= $date_today ?>)</p>
