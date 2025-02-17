<?php
include 'conn.php';

  $id = $_REQUEST['id'];


  $sqlDeleteAd= "DELETE FROM tbl_pages WHERE page_id='$id'";
  $rsDelAd = $conn->query($sqlDeleteAd);

  header('location:../temp_page.php');
  exit();



 ?>
