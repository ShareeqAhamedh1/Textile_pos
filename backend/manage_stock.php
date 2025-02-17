<?php
include './conn.php';
$ids =  $_REQUEST['rec_id'];
if(!$ids){

  exit();
}

foreach($ids as $id){
  $sqlAddCustomer = "DELETE FROM tbl_tally_stock WHERE record_id='$id'";

  $rsAddCustomer = $conn->query($sqlAddCustomer);

  $sqlAddCustomer = "SELECT FROM tbl_expiry_date WHERE id='$id'";

  $rsAddCustomer = $conn->query($sqlAddCustomer);

  if($rsAddCustomer->num_rows >0){
    while($row = $rsAddCustomer->fetch_assoc()){

      $old_quantity = $row["quantity"];
    }
  }

  $product_id = mysqli_real_escape_string($conn, $_REQUEST["product_id$id"]);
  $note = mysqli_real_escape_string($conn, $_REQUEST["note$id"]);
  $new_quantity = mysqli_real_escape_string($conn, $_REQUEST["new_quantity$id"]);



  $sqlAddCustomer = "INSERT INTO tbl_tally_stock (old_quantity,new_quantity,manual_note, product_id, record_id) VALUES ('$old_quantity','$new_quantity','$note','$product_id','$id')";

  $rsAddCustomer = $conn->query($sqlAddCustomer);
}

echo json_encode(array("statusCode"=>200));
exit();
