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
      <th>Category Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tbl_category";
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


        <td>
          <a class="me-3" href="editcategory.php?cat_id=<?= $row['id'] ?>">
            <img src="assets/img/icons/edit.svg" alt="img">
          </a>
          <a onclick="del_prod(<?= $row['id'] ?>)" class="me-3 confirm-text" href="javascript:void(0);">
            <img src="assets/img/icons/delete.svg" alt="img">
          </a>
        </td>
      </tr>
    <?php }} ?>
  </tbody>
</table>
