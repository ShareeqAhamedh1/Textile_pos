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
      <th>Barcode </th>
      <th>Expiry Date</th>
      <th>Quantity </th>

      <th>Shipping Type</th>
      <th>Box Number</th>
      <th>GRM Ref</th>
      <th>Sales Point</th>

    </tr>
  </thead>
  <tbody>

    <?php
    $sql = "SELECT * FROM tbl_expiry_date ORDER BY grm_ref  AND user_id='$u_id'";

    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
            <tr>

              <?php
              $cat_id = $row['product_id'];
              $sqlSub = "SELECT * FROM tbl_product WHERE id='$cat_id'";
              $rsSub = $conn->query($sqlSub);
              if($rsSub->num_rows >0){
                while($rowSub = $rsSub->fetch_assoc()){
                  $s_p_id = $row['s_point_id'];
                   ?>
                  <td><?= $rowSub['name']; ?></td>
              <?php }}else{ ?>
                  <td>N/A</td>
                  <?php } ?>
              <td><?= $row['barcode'] ?></td>
              <td><?= $row['expiry_date'] ?></td>
              <td><?= $row['quantity'] ?></td>
              <td><?= $row['shipping_type'] ?></td>
              <td><?= $row['box_number'] ?></td>

              <?php
              $cat_id = $row['grm_ref'];
              $sqlSub = "SELECT * FROM tbl_stock_grm WHERE id='$cat_id'";
              $rsSub = $conn->query($sqlSub);
              if($rsSub->num_rows >0){
                while($rowSub = $rsSub->fetch_assoc()){ ?>
                  <td><?= $rowSub['stock_ref']; ?></td>
              <?php }}else{ ?>
                  <td>N/A</td>
                  <?php } ?>

                  <td><?=  getDataBack($conn,'tbl_sales_point','id',$s_p_id,'sale_point_name')  ?></td>

            </tr>
    <?php }} ?>

  </tbody>
</table>
