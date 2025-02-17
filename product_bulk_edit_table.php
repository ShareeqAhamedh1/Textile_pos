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
<table id="prod_table" class="table  datanew">
  <thead>
    <tr >

      <th>Product Name</th>
      <th>Barcode</th>
      <th>Category </th>
      <th>Brand</th>
      <th>Price</th>

      <th>Discount</th>

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
      $i =0;
      while($row = $rs->fetch_assoc()){ ?>
            <tr id="t_row">
              <td  class="prod_row" style="width:38%;">
                <input type="text" id="product_name" name="name<?= $row['id']; ?>" value="<?= $row['name']; ?>" class="form-control">
              </td>

              <td class="prod_row" style="width:16%;"><input id="barcode<?= $i ?>" onkeydown="focusNext(event, 'barcode<?= $i+1 ?>')"  type="text" name="barcode<?= $row['id']; ?>" value="<?= $row['barcode']; ?>" class="form-control"></td>

              <td class="prod_row" style="width:16%;">
                  <select name="category_id<?= $row['id']; ?>"class="select form-control">
                    <option>Choose Category</option>
                    <?php
                    $cat_id = $row['category_id'];
                    $sqlSub = "SELECT * FROM tbl_category";
                    $rsSub = $conn->query($sqlSub);
                    if($rsSub->num_rows >0){
                      while($rowSub = $rsSub->fetch_assoc()){
                        if($rowSub['id']==$cat_id){?>
                          <option selected value="<?=$rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
                        <?php }else{ ?>
                          <option value="<?=$rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
                        <?php }}} ?>
                  </select>
              </td>

              <td class="prod_row" style="width:18%" >
                  <select name="brand_id<?= $row['id']; ?>"class="select form-control">
                    <option>Choose Brand</option>
                    <?php
                    $brand_id = $row['brand_id'];
                    $sqlSub = "SELECT * FROM tbl_brand";
                    $rsSub = $conn->query($sqlSub);
                    if($rsSub->num_rows >0){
                      while($rowSub = $rsSub->fetch_assoc()){
                        if($rowSub['id']==$brand_id){?>
                          <option selected value="<?=$rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
                        <?php }else{ ?>
                          <option value="<?=$rowSub['id'] ?>"><?= $rowSub['name'] ?></option>
                        <?php }}} ?>
                   </select>
              </td>


              <td class="prod_row" style="width:11%"><input type="text" name="price<?= $row['id']; ?>" value="<?= $row['price']; ?>" class="form-control"></td>



              <td class="prod_row" ><input type="text" name="discount<?= $row['id']; ?>" value="<?= $row['discount']; ?>" class="form-control"></td>
              <td class="prod_row" ><input type="checkbox" name="prod_id[]" value="<?= $row['id']; ?>"></td>

            </tr>
    <?php $i = $i+1; }} ?>

  </tbody>
</table>
<script type="text/javascript">
function focusNext(e, nextElementId) {
      // if ENTER
      if (e.keyCode === 13) {
        // focus next element
        e.preventDefault();

        document.getElementById(nextElementId).focus(function() { $(this).select(); } );
      }
    }
$(document).ready(function(){
  $('.prod_row').css('cursor', 'pointer').click(function() {
      var checkBoxes = $(this).parent('tr').find('input:checkbox')
      checkBoxes.prop("checked", true);
  });
})
</script>
