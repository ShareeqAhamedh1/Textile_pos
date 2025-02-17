<?php include './backend/conn.php';
$u_id = $_SESSION['u_id'];
//
if(isset($_REQUEST['word'])){
  $word = $_REQUEST['word'];
}else{
  $word =0;
}
//   $cat_id = 0;
// }
// if(isset($_REQUEST['sub_cat_id'])){
//   $sub_cat_id = $_REQUEST['sub_cat_id'];
// }else{
//   $sub_cat_id = 0;
// }
// if(isset($_REQUEST['brand_id'])){
//   $brand_id = $_REQUEST['brand_id'];
// }else{
//   $brand_id = 0;
// }
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
     
      <th>Reference Number</th>
      <th>Total Stock Value</th>

      <!-- <th>Discount</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php
    if(isset($_REQUEST['word'])){
      $sql = "SELECT tbl_product.id AS id, tbl_product.name AS name, tbl_product.barcode AS barcode, tbl_product.category_id AS category_id, tbl_product.price AS price,
                tbl_expiry_date.quantity AS quantity, tbl_expiry_date.box_number AS box_number, tbl_expiry_date.expiry_date AS exp_date,tbl_expiry_date.grm_ref AS ref_num
                FROM tbl_product JOIN tbl_expiry_date ON tbl_product.id = tbl_expiry_date.product_id
                WHERE tbl_expiry_date.user_id='$u_id' AND  tbl_expiry_date.box_number = '$word'";
    }else{
    $sql = "SELECT tbl_product.id AS id, tbl_product.name AS name, tbl_product.barcode AS barcode, tbl_product.category_id AS category_id, tbl_product.price AS price,
              tbl_expiry_date.quantity AS quantity, tbl_expiry_date.box_number AS box_number, tbl_expiry_date.expiry_date AS exp_date,tbl_expiry_date.grm_ref AS ref_num
              FROM tbl_product JOIN tbl_expiry_date ON tbl_product.id = tbl_expiry_date.product_id
              WHERE tbl_expiry_date.user_id='$u_id' ";
    }


    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        $ref_num_id = $row['ref_num'];
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
                <?= $new_string ?>
              </td>
             
              <td><?= intval($row['barcode']) ?></td>

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


              <td><?= $row['quantity']; ?></td>
              
              <td> <?= getDataBack($conn,'tbl_stock_grm','id',$ref_num_id,'stock_ref') ?>  </td>


              <td> <?= $row['quantity'] * $row['price'] ?> </td>


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
