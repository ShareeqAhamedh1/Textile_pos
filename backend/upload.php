<?php
include 'conn.php';



if(is_uploaded_file($_FILES['csv_file']['tmp_name'])){

  $file = $_FILES["csv_file"]["tmp_name"];
        $handle = fopen($file,"r");

        while ($row = fgetcsv($handle)) {

            $barcode = $row[0];
            $qnty = $row[1];
            $name = mysqli_real_escape_string($conn, $row[3]);
            $exp = mysqli_real_escape_string($conn, $row[2]);
            $short_desc = mysqli_real_escape_string($conn, $row[4]);
            $desc = mysqli_real_escape_string($conn, $row[5]);

            $sale_price = $row[6];
            $price = $row[7];
            $category = $row[8];
            $image = $row[9];

            $sql = "SELECT * FROM tbl_category WHERE name='$category' ";
            $rs = $conn->query($sql);
            if($rs->num_rows >0){
              $row = $rs->fetch_assoc();
              $cat_id = $row['id'];
            }else{
              $sql = "INSERT INTO tbl_category (name) VALUES ('$category') ";
              $rs = $conn->query($sql);
              $last_cat_id = $conn->insert_id;
              $cat_id = $last_cat_id;
            }

            $sqlAdd = "INSERT INTO tbl_product (name,category_id,barcode,quantity, price, sale_price, short_description,description, image)
                                      VALUES ('$name','$cat_id','$barcode','$qnty','$price','$sale_price','$short_desc','$desc','$image')";
            $rsAdd = $conn->query($sqlAdd);

            $last_id = $conn->insert_id;

            $sqlexp = "INSERT INTO tbl_expiry_date (product_id, expiry_date)
                                      VALUES ('$last_id','$exp')";
            $rsexp = $conn->query($sqlexp);


          }

            header('location:../upload.php');
            exit();


        }






 ?>
