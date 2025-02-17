<?php include './backend/conn.php'; ?>
<table class="table  datanew">
  <thead>
    <tr>
      <th>
        <label class="checkboxs">
          <input type="checkbox" id="select-all">
          <span class="checkmarks"></span>
        </label>
      </th>
      <th>Sub Category</th>
      <th>Parent category</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_sub_category";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
      <tr>
        <td>
          <label class="checkboxs">
            <input type="checkbox">
            <span class="checkmarks"></span>
          </label>
        </td>
        <td><?= $row['name'] ?></td>

        <?php
        $cat_id = $row['category_id'];
        $sqlSub = "SELECT * FROM tbl_category WHERE id='$cat_id'";
        $rsSub = $conn->query($sqlSub);
        while($rowSub = $rsSub->fetch_assoc()){ ?>
        <td><?= $rowSub['name']; ?></td>
        <?php } ?>

        <td>
          <a class="me-3" href="subeditcategory.php?sub_cat_id=<?= $row['id'] ?>">
            <img src="assets/img/icons/edit.svg" alt="img">
          </a>
          <a onclick="del_prod(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
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
