<?php include './backend/conn.php';
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
      <th>Category </th>
      <!-- <th>Sub Category </th> -->
      <!-- <th>Brand</th> -->
      <th>Price</th>
      <th>Qty</th>
      <th>Total Stock Value</th>

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
      while($row = $rs->fetch_assoc()){
        $original_string = $row['name'];
        $word_limit = 20;
        $words = explode(" ", $original_string);
        $new_string = "";

        for ($i = 0; $i < $word_limit; $i++) {
            $new_string .= $words[$i] . " ";
        }

        $new_string = wordwrap($new_string, 30, "<br>\n", true); // Add line breaks after every 30 characters
        ?>
            <tr>

              <td >
                <!-- <a href="javascript:void(0);" class="product-img">
                  <img src="assets/img/product/product1.jpg" alt="product">
                </a> -->
                <?= $new_string ?>
              </td>
              <td><?= $row['barcode'] ?></td>

              <?php
              $cat_id = $row['category_id'];
              $sqlSub = "SELECT * FROM tbl_category WHERE id='$cat_id'";
              $rsSub = $conn->query($sqlSub);
              if($rsSub->num_rows >0){
                while($rowSub = $rsSub->fetch_assoc()){ ?>
                  <td><?= $rowSub['name']; ?></td>
              <?php }}else{ ?>
                  <td>N/A</td>
                  <?php } ?>


              <td><?= $row['price']; ?></td>

              <?php
              $id = $row['id'];
              $sqlSub = "SELECT SUM(quantity) AS quantity FROM tbl_expiry_date WHERE product_id='$id'";
              $rsSub = $conn->query($sqlSub);
              if($rsSub->num_rows >0){
                $rowSub = $rsSub->fetch_assoc(); ?>
                  <td><?= $rowSub['quantity']; ?></td>
                <?php }else{ ?>
                    <td>0</td>
                  <?php } ?>

                  <td> <?= $rowSub['quantity'] * $row['price'] ?> </td>


              <td>
                <a class="me-3" href="product-details.php?id=<?= $row['id'] ?>">
                  <img src="assets/img/icons/eye.svg" alt="img">
                </a>
                <a class="me-3" href="editproduct.php?id=<?= $row['id'] ?>">
                  <img src="assets/img/icons/edit.svg" alt="img">
                </a>
                <a class="confirm-text" onclick="del_prod(<?= $row['id'] ?>)" href="javascript:void(0);">
                  <img src="assets/img/icons/delete.svg" alt="img">
                </a>
              </td>
            </tr>
    <?php }} ?>

  </tbody>
</table>
