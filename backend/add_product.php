<?php
include 'conn.php';


$name =$conn->real_escape_string($_REQUEST['name']);
$category_id =$_REQUEST['category_id'];
$sub_cat_id =$_REQUEST['sub_cat_id'];
$brand_id =$_REQUEST['brand_id'];
$unit =$_REQUEST['unit_id'];
$barcode =$_REQUEST['barcode'];
$minimum_quantity =$_REQUEST['minimum_quantity'];
$quantity =$_REQUEST['quantity'];
// $sale_point_id =$_REQUEST['sale_point_id'];
$manual_date =$_REQUEST['manual_date'];
$price =$_REQUEST['price'];
$status =$_REQUEST['status'];
$discount =$_REQUEST['discount'];

$description =$_REQUEST['description'];

$st_description =$_REQUEST['st_description'];

// $allowedlist = array('jpg','png', 'pdf', 'jpeg', 'PNG', 'JPEG');
//
// if(is_uploaded_file($_FILES['image']['tmp_name'])){
//   uploadImage("image", "../assets/img/product/", $allowedlist, "../index.php" );
//   $image = $GLOBALS['fileNameNew'];
// }

$image = $_REQUEST['image'];

$sqlAdd = "INSERT INTO tbl_product
            (name,
            category_id,
            sub_category_id,
            brand_id,
            unit,
            barcode,
            minimum_quantity,
            quantity,
            price,
            -- image,
            status,
            -- auto_date,
            manual_date,
            -- sale_point_id,
            description,
            discount
            )
            VALUES
            ('$name',
              '$category_id',
              '$sub_cat_id',
              '$brand_id',
              '$unit',
              '$barcode',
              '$minimum_quantity',
              '$quantity',
              '$price',
              -- '$image',
              '$status',
              '$manual_date',
              -- '$sale_point_id',
              '$description',
              '$discount'
            )";
$rsAdd = $conn->query($sqlAdd);

$last_id = $conn->insert_id;

$sql = "INSERT INTO tbl_stock (p_id, stock, description) VALUES ('$last_id', '$quantity', '$st_description')";

$rs = $conn->query($sql);

$sql = "INSERT INTO tbl_quantity (p_id, quantity) VALUES ('$last_id', '$quantity')";

$rs = $conn->query($sql);



if($rsAdd > 0){
  $_SESSION['category'] = $category_id;
  $_SESSION['sub_category'] = $sub_cat_id;
  if($_REQUEST['redir'] == 1){
    $_SESSION['barcode_new'] = $barcode;
    header('location:../update_stock.php?id=7');
    exit();
  }
  header('location:../addproduct.php');
  exit();
}
else{
  $_SESSION['error_cus'] = true;
  header('location:../addbrand.php');
  exit();

}


 ?>
