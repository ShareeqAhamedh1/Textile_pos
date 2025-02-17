<?php
include 'conn.php';

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);
$sale = mysqli_real_escape_string($conn, $_REQUEST['sale_point']);



  $sqlDeleteAd= "INSERT INTO tbl_user (username,password,sale_point) VALUES ('$name','$pass','$sale')";
  $rsDelAd = $conn->query($sqlDeleteAd);


  if ($rsDelAd > 0) {
    $_SESSION['suc_ad_del'] = true;
    header("location:../add_user.php");
    exit();
  }



 ?>
