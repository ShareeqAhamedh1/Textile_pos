<?php
include 'conn.php';

$customer_name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$city = mysqli_real_escape_string($conn, $_REQUEST['city']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);


  $sqlDeleteAd= "INSERT INTO tbl_customer (c_name,c_phone,c_email, c_address,c_city) VALUES ('$customer_name','$phone','$email','$address','$city')";
  $rsDelAd = $conn->query($sqlDeleteAd);
  $customer_id = $conn->insert_id;

  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    echo json_encode(array("statusCode"=>200, "customer_id"=>$customer_id));
    exit();
  }



 ?>
