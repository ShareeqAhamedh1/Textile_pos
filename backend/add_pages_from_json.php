<?php
  include 'conn.php';

  $pagesData = $_REQUEST['page_data'];
  $pageCatId = $_REQUEST['page_cat_id'];


  foreach ($pagesData as $page_name) {
    $sql = "INSERT INTO tbl_pages (page_name,page_cat_id) VALUES ('$page_name','$pageCatId')";
    $rs =$conn->query($sql);
  }
  header('location:../temp_page.php');
  exit();
 ?>
