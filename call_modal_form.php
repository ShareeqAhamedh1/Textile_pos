
<?php
include './backend/conn.php';

$order_id = $_REQUEST['order_id'];
// $store = $_REQUEST['store'];
$customer_id = $_REQUEST['customer_id']; ?>
<div class="row">
  <div class="">
    <div class="form-group">
      <label for="">Select Product</label>
      <select class=" js-states form-control prod_name_modal" id="prod_name_modal" name="" onchange="addValue(this.value)">
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
  </div>

    <input type="hidden" id="order_id_modal" name="order_id" value="<?= $order_id ?>">
    <input type="hidden" id="customer_id_modal" name="customer_id" value="<?= $customer_id ?>">



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
      <input value="1" name="quantity" id="quantity_modal" type="quantity" class="form-control">
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
      <label>Store</label>
      <select name="store" id="store_modal" class="select form-control">
        <option value="cardamom">Cardamom</option>
        <option value="fivestories">Fivestories</option>
      </select>
    </div>
  </div>

  <div class="col-lg-2 col-sm-2 col-9">
    <div class="form-group">
      <label>Add</label>
      <button onclick="addOrder()" type="button" class="btn btn-success ">Add </button>
    </div>
  </div>
  <div class="">
    <div class="form-group">

      <button onclick="update(<?= $order_id ?>)" type="button" class="btn btn-primary btn-sm ">Update Table</button>
    </div>
  </div>
</div>
<script type="text/javascript">


</script>
