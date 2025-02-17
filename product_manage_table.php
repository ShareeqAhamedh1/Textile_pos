<?php include './backend/conn.php';
$u_id = $_SESSION['u_id'];

if(isset($_REQUEST['cat_id'])){
  $cat_id = $_REQUEST['cat_id'];
}else{
  $cat_id = 0;
}
if(isset($_REQUEST['sub_cat_id'])){
  $sub_cat_id = $_REQUEST['sub_cat_id'];
}else{
  $sub_cat_id = 0;
}
if(isset($_REQUEST['brand_id'])){
  $brand_id = $_REQUEST['brand_id'];
}else{
  $brand_id = 0;
}
 ?>
<table class="table  datanew" id="table_id">
  <thead>
    <tr>

      <th>Product Name</th>
      <th>Barcode</th>
      <!-- <th>Category </th> -->
      <!-- <th>Sub Category </th> -->
      <!-- <th>Brand</th> -->
      <!-- <th>Price</th> -->
      <th>Qty</th>
      <!-- <th>Total Stock Value</th> -->

      <!-- <th>Discount</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if(!$cat_id && !$sub_cat_id && !$brand_id){
      $sql = "SELECT * FROM tbl_product";
    }elseif($cat_id && !$sub_cat_id && !$brand_id){
      $sql = "SELECT * FROM tbl_product WHERE category_id='$cat_id'";
    }elseif($cat_id && $sub_cat_id && !$brand_id){
      $sql = "SELECT * FROM tbl_product WHERE category_id='$cat_id' AND sub_category_id='$sub_cat_id'";
    }elseif($cat_id && $sub_cat_id && $brand_id){
      $sql = "SELECT * FROM tbl_product WHERE category_id='$cat_id' AND sub_category_id='$sub_cat_id' AND brand_id='$brand_id'";
    }elseif(!$cat_id && $sub_cat_id && $brand_id){
      $sql = "SELECT * FROM tbl_product WHERE sub_category_id='$sub_cat_id' AND brand_id='$brand_id'";
    }elseif($cat_id && !$sub_cat_id && $brand_id){
      $sql = "SELECT * FROM tbl_product WHERE category_id='$cat_id' AND brand_id='$brand_id'";
    }elseif(!$cat_id && $sub_cat_id && !$brand_id){
      $sql = "SELECT * FROM tbl_product WHERE sub_category_id='$sub_cat_id'";
    }elseif(!$cat_id && !$sub_cat_id && $brand_id){
      $sql = "SELECT * FROM tbl_product WHERE brand_id='$brand_id'";
    }
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
            <tr>

              <td >
                <!-- <a href="javascript:void(0);" class="product-img">
                  <img src="assets/img/product/product1.jpg" alt="product">
                </a> -->
                <?= $row['name'] ?>
              </td>
              <td><?= $row['barcode'] ?></td>


                  <?php
                  $id = $row['id'];
                  $redStoc = 0;
                  $redStocCall = 0;
                    $sqlMinStock = "SELECT SUM(quantity) AS qnty FROM tbl_order WHERE product_id='$id'";
                    $rsMinStock = $conn->query($sqlMinStock);

                    if($rsMinStock->num_rows > 0){
                      $rowMinStock = $rsMinStock->fetch_assoc();
                      $redStoc = $rowMinStock['qnty'];
                    }

                    $sqlMinStockCall = "SELECT SUM(quantity) AS qnty_call FROM tbl_order_temp WHERE product_id='$id' AND status !='0' AND status !='1'";
                    $rsMinStockCall = $conn->query($sqlMinStockCall);

                    if($rsMinStockCall->num_rows > 0){
                      $rowMinStockCall = $rsMinStockCall->fetch_assoc();
                      $redStocCall = $rowMinStockCall['qnty_call'];
                    }

                    $redStoc +=$redStocCall;
                   ?>




              <?php

              $sqlSub = "SELECT * FROM tbl_expiry_date WHERE product_id='$id'";
              $rsSub = $conn->query($sqlSub);
              $quantity=0;
              if($rsSub->num_rows > 0){
                while($rowSub = $rsSub->fetch_assoc()){

                  $exp_id=$rowSub['id'];

                  $sql_tally = "SELECT * FROM tbl_tally_stock WHERE record_id='$exp_id'";
                  $rs_tally = $conn->query($sql_tally);

                  if($rs_tally->num_rows > 0){
                   $rowTally = $rs_tally->fetch_assoc();

                   $quantity += $rowTally['new_quantity'];
                  }
                  else {
                    $quantity += $rowSub['quantity'];
                  }
                }


                  ?>
                  <td><?= $quantity - $redStoc; ?></td>
                <?php }else{ ?>
                    <td>0</td>
                  <?php } ?>




              <td>
                <a class="me-3" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['id'] ?>)">
                  <img src="assets/img/icons/eye.svg" alt="img">
                </a>
              </td>
            </tr>
    <?php }} ?>

  </tbody>
</table>
