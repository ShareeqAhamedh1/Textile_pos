<?php
include 'conn.php';


$name =$_REQUEST['name'];

$allowedlist = array('jpg','png', 'pdf', 'jpeg', 'PNG', 'JPEG');

if(is_uploaded_file($_FILES['image']['tmp_name'])){
  uploadImage("image", "../assets/img/product/", $allowedlist, "../index.php" );
  $image = $GLOBALS['fileNameNew'];
}

$sqlAdd = "INSERT INTO tbl_brand (name,image) VALUES ('$name','$image')";
$rsAdd = $conn->query($sqlAdd);


if($rsAdd > 0){
  $_SESSION['suc_cus'] = true;
  header('location:../addbrand.php');
  exit();
}
else{
  $_SESSION['error_cus'] = true;
  header('location:../addbrand.php');
  exit();

}


 ?>
