<?php
  include '../backend/conn.php';

  $user_id = $_REQUEST['user_id'];
 ?>
 <div class="row">
 <?php
   $sql_link = "SELECT * FROM `tbl_page_category`";
   $rs_link=$conn->query($sql_link);
?>
<form class="" action="backend/add_user_access.php" method="post">
  <input type="hidden" name="user_id" value="<?= $user_id ?>">
<?php
   if($rs_link->num_rows > 0){
     while($row_link = $rs_link->fetch_assoc()){
       $page_cat_id = $row_link['page_cat_id'];
  ?>
  <div class="col-3">
    <h5>
      <input type="checkbox" name="heading" class="heading-checkbox" data-group="group-<?= $row_link['page_cat_id'] ?>">
      <?= $row_link['page_cat_name'] ?>
    </h5>
    <ul>
      <?php
        $sql_links = "SELECT * FROM `tbl_pages` WHERE page_cat_id='$page_cat_id'";
        $rs_links = $conn->query($sql_links);
        if ($rs_links->num_rows > 0) {
          while ($row_p = $rs_links->fetch_assoc()) {
      ?>
      <li>
        --
        <input type="checkbox" name="page_link-<?= $row_p['page_id'] ?>" value="<?= $row_p['page_id'] ?>" class="sub-checkbox group-<?= $row_link['page_cat_id'] ?>">
        <?= $row_p['page_name'] ?> &nbsp;||
        <label>Edit</label>
        <input type="checkbox" name="page_link-edit-<?= $row_p['page_id'] ?>" value="1" class="edit-checkbox group-<?= $row_link['page_cat_id'] ?>">
        <label>Delete</label>
        <input type="checkbox" name="page_link-delete-<?= $row_p['page_id'] ?>" value="1" class="delete-checkbox group-<?= $row_link['page_cat_id'] ?>">
        <hr>
      </li>
      <?php } } else { ?>
      <li> No Links Added Yet </li>
      <?php } ?>
    </ul> <br><br>
  </div>
<?php } } ?>
<button type="submit" name="button">submit</button>
</form>

</div>
<script>
  // Get all heading checkboxes
  const headingCheckboxes = document.querySelectorAll('.heading-checkbox');

  // Add event listeners to heading checkboxes
  headingCheckboxes.forEach(headingCheckbox => {
    headingCheckbox.addEventListener('change', function () {
      const isChecked = this.checked;
      const group = this.getAttribute('data-group');

      // Find corresponding sub-checkboxes, edit-checkboxes, and delete-checkboxes for the group
      const subCheckboxes = document.querySelectorAll('.sub-checkbox.' + group);
      const editCheckboxes = document.querySelectorAll('.edit-checkbox.' + group);
      const deleteCheckboxes = document.querySelectorAll('.delete-checkbox.' + group);

      // Set the state of sub-checkboxes, edit-checkboxes, and delete-checkboxes for the group
      subCheckboxes.forEach(subCheckbox => {
        subCheckbox.checked = isChecked;
      });
      editCheckboxes.forEach(editCheckbox => {
        editCheckbox.checked = isChecked;
      });
      deleteCheckboxes.forEach(deleteCheckbox => {
        deleteCheckbox.checked = isChecked;
      });
    });
  });
</script>
