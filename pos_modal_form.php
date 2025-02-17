
<?php
include './backend/conn.php';

$grm_ref = $_REQUEST['grm_ref'];

// $customer_id = $_REQUEST['customer_id']; ?>
<div style="margin-bottom:10px"class="row">
  <h4 style="text-align:center">Add Item</h4>

</div>
<div class="row">


  <div class="col-lg-12 col-sm-6 col-12">
    <input type="hidden" id="grm_ref_modal" name="order_id" value="<?= $grm_ref ?>">

    <div class="form-group">
      <!-- <input type="text" class="form-control" name="" value="" id="searchProd" placeholder="search"> -->
      <select style="" class="form-control prod_name_modal"    id="prod_name_modal" name="" onchange="addValue(this.value)">
        <option value="">Select Product</option>
        <?php
          $sql_product = "SELECT * FROM tbl_product WHERE barcode!= ''";
          $rs_prod = $conn->query($sql_product);

          if($rs_prod->num_rows > 0){
            while($row_prod = $rs_prod->fetch_assoc()){
         ?>
        <option prod_id="<?= $row_prod['id'] ?>" price="<?= $row_prod['price'] ?>" value="<?= $row_prod['barcode'] ?>"> <?= $row_prod['name'] ?> (Rs.<span id="price_value"><?= $row_prod['price'] ?></span>)</option>
      <?php } } ?>
      </select>
    </div>

  </div><br>
  <div class="">
    <div class="form-group">
      <label>Barcode</label>

        <input name="barcode" type="text" id="getBarcode" value="">

    </div>
    <input type="hidden" id="prod_id" name="prod_id_modal" value="">
  </div>
  <div class="col-lg-2 col-sm-2 col-9">
    <div class="form-group">
      <label>Price</label>
      <input name="price" id="price_modal" type="price" class="form-control">
    </div>
  </div>
  <div class="col-lg-2 col-sm-2 col-9">
    <div class="form-group">
      <label>Quantity</label>
      <input name="quantity" id="quantity_modal" type="quantity" class="form-control">
    </div>
  </div>
  <div class="col-lg-2 col-sm-2 col-9">
    <div class="form-group">
      <label>Discount</label>
      <input value="0" name="discount" id="discount_modal" type="discount" class="form-control">
    </div>
  </div>
  <div class="col-lg-2 col-sm-2 col-9">
    <div class="form-group">
      <div class="">
        <label>Discount Type</label>
        <select class="select form-control" id="discount_type_modal" name='discount_type' >
          <option value="p">Percentage</option>
          <option value="f">Fixed Amount</option>
        </select>
      </div>
    </div>
  </div>

  <div class="col-lg-2 col-sm-2 col-9">
    <div class="form-group">
      <label>Customer ID</label>
      <input name="customer_id" id="customer_id_modal" class="form-control">
    </div>
  </div>
  <div class="col-lg-2 ">
    <div class="form-group">
      <label>Add New Item</label>
      <button style="padding-right:50px;padding-left:50px"onclick="addOrder(<?= $grm_ref ?>)" type="button" class="btn btn-success ">Add </button>
    </div>
  </div><br>
  <div class="">
    <div class="form-group">

      <button onclick="update(<?= $grm_ref ?>)" type="button" class="btn btn-primary btn-sm">Update Table</button>
    </div>
  </div>
</div>
