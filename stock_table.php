<?php include './backend/conn.php';
 $u_id = $_SESSION['u_id'];

 $id = $_REQUEST['id']; ?>
<table class="table  datanew" >
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Barcode</th>
      <!-- <th>Expiry Date</th> -->
      <th>quantity</th>
      <!-- <th>Box Number</th> -->
      <!-- <th>Shipping Type</th> -->
      <!-- <th>Sales Point</th> -->
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_expiry_date WHERE grm_ref='$id' AND user_id='3' ORDER BY id DESC ";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){
        // $s_p_id=$row['s_point_id'];
        $barcode = $row['barcode'];

        $sqlPr = "SELECT * FROM tbl_product WHERE barcode ='$barcode'";
        $rsPr = $conn->query($sqlPr);

        ?>
      <tr id="<?= $row['barcode'] ?>">
        <?php   if($rsPr->num_rows > 0){
          $rowPr = $rsPr->fetch_assoc();

          ?>
        <td><?= $rowPr['name'] ?> </td>
      <?php } ?>
        <td><?= $row['barcode'] ?></td>


       
        <td><?= $row['quantity']; ?></td>
        
       
      

        <td>
          <a onclick="del_stock_record(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
          <a data-bs-toggle="modal" data-bs-target="#create" onclick="loadValue(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/edit.svg" alt="img">
          </a>
        </td>
      </tr>
    <?php }} ?>
    <!-- <tr>
      <td>
        <label class="checkboxs">
          <input type="checkbox">
          <span class="checkmarks"></span>
        </label>
      </td>
      <td>
        <a class="product-img">
          <img src="assets/img/product/product10.jpg" alt="product">
        </a>
      </td>
      <td>Health Care	</td>
      <td>Health Care	</td>
      <td>CT0010</td>
      <td>Health Care Description</td>
      <td>Admin</td>
      <td>
        <a class="me-3" href="editsubcategory.html">
          <img src="assets/img/icons/edit.svg" alt="img">
        </a>
        <a class="me-3 confirm-text" href="javascript:void(0);">
          <img src="assets/img/icons/delete.svg" alt="img">
        </a>
      </td>
    </tr> -->
  </tbody>
</table>
