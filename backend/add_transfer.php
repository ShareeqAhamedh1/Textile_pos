<?php
include 'conn.php';


$ids =$_REQUEST['id'];
if (!$id) {
  // code...
  header('location:../addtransfer.php');
  exit();
}
$from_id =$_REQUEST['from_point'];
$to_id =$_REQUEST['to_point'];
$date =$_REQUEST['date'];
$description =$_REQUEST['description'];

if ($from_id==$to_id) {
  // code...
  header('location:../addtransfer.php');
  exit();
}



foreach( $ids as $id) {

  $new_quantity = intval($_REQUEST[$id]);

  $sql = "INSERT INTO tbl_transfer (p_id, from_point, to_point, manual_date, description, quantity) VALUES ('$id','$from_id', '$to_id', '$date', '$description','$new_quantity')";
  $rs = $conn->query($sql);


  $sql = "SELECT * FROM tbl_quantity WHERE p_id = $id AND sale_point_id='$from_id'";
  $rs = $conn->query($sql);
  $row = $rs->fetch_assoc();

  $initial_quantity = intval($row['quantity']);
  $final_quantity = $initial_quantity - $new_quantity;

  echo $final_quantity;

  if($final_quantity < 0){
    $_SESSION['suc_cus'] = true;
    header('location:../addtransfer.php');
    exit();
  }

  $sqlAddCustomer = "UPDATE tbl_quantity SET
                      quantity='$final_quantity'
                      WHERE p_id='$id' AND sale_point_id='$from_id'";

  $rsAddCustomer = $conn->query($sqlAddCustomer);

  $sqlAddCustomer = "INSERT INTO tbl_stock (p_id, stock, sale_point_id) VALUES ('$id','$final_quantity','$from_id')";
  $rsAddCustomer = $conn->query($sqlAddCustomer);



  $sql = "SELECT * FROM tbl_quantity WHERE p_id = $id AND sale_point_id='$to_id'";
  $rs = $conn->query($sql);

  if($rs->num_rows >0){
    $row = $rs->fetch_assoc();
    $initial_quantity = intval($row['quantity']);
    $final_quantity = $new_quantity + $initial_quantity;
    $sqlAddCustomer = "UPDATE tbl_quantity SET
                        quantity='$final_quantity'
                        WHERE p_id='$id' AND sale_point_id='$to_id'";
  }else{
    $final_quantity = $new_quantity;
    $sqlAddCustomer = "INSERT INTO tbl_quantity (p_id, quantity, sale_point_id) VALUES ('$id','$new_quantity','$to_id')";
  }
  $rsAddCustomer = $conn->query($sqlAddCustomer);

  $sqlAddCustomer = "INSERT INTO tbl_stock (p_id, stock, sale_point_id) VALUES ('$id','$final_quantity','$to_id')";
  $rsAddCustomer = $conn->query($sqlAddCustomer);

  if($rsAddCustomer > 0){
    $_SESSION['suc_cus'] = true;
    header('location:../addtransfer.php');
    exit();
  }
  else{
    $_SESSION['error_cus'] = true;
    header('location:../addcategory.php');
    exit();

  }

}





 ?>
