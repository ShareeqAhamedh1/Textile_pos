<?php
include 'conn.php';



if(is_uploaded_file($_FILES['csv_file']['tmp_name'])){

  $file = $_FILES["csv_file"]["tmp_name"];
        $handle = fopen($file,"r");

        while ($row = fgetcsv($handle)) {

            $barcode = $row[0];
            $name = mysqli_real_escape_string($conn, $row[3]);
            $qnty = $row[1];
            $exp = $row[2];

            $exp = mysqli_real_escape_string($conn, $row[2]);


            $sql = "SELECT * FROM tbl_product WHERE name='$name' ";
            $rs = $conn->query($sql);
            if($rs->num_rows >0){
              $row = $rs->fetch_assoc();
              $id = $row['id'];
            }else{
              echo $barcode;
            }

            $sqlAdd = "INSERT INTO tbl_expiry_date (product_id,expiry_date,quantity) VALUES('$id','$exp','$qnty')";
            $rsAdd = $conn->query($sqlAdd);



          }




        }






 ?>
