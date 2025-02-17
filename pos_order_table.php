<?php include './backend/conn.php';

$sqlProd="";
if(isset($_REQUEST['prod_ids'])){
  $prod_ids = json_decode($_REQUEST['prod_ids']);
  $sqlprod="SELECT * FROM tbl_product WHERE id IN (". implode(',', $prod_ids) .")";

}else{
  $sqlProd="SELECT * FROM tbl_product WHERE id='0'";


}

?>

<?php


$rsprod = $conn->query($sqlprod);
if($rsprod->num_rows >0){
  while($rowprod = $rsprod->fetch_assoc()){ ?>

<ul class="product-lists">


  <li>
    <div class="productimg">
      <!-- <div class="productimgs">
        <img src="assets/img/product/product30.jpg" alt="img">
      </div> -->
      <div class="productcontet">
        <input type="hidden" name="prod_id[]" value="<?= $rowprod['id'] ?>">
        <input type="hidden" name="price" value="<?= $rowprod['price'] ?>">
        <h4><?= $rowprod['name'] ?> </h4>
        <?php
        $id = $rowprod['id'];


        $sqlq = "SELECT SUM(quantity) AS quantity FROM tbl_expiry_date WHERE product_id='$id'";
        $rsq = $conn->query($sqlq);
        if($rsq->num_rows >0){
          while($rowq = $rsq->fetch_assoc()){
            $price = $rowprod['price'];
            $max = currentStockCount($conn,$id);
            ?>
            <div class="" style="display:flex">


            <div class="productlinkset">
              <h5>Available Stock: <?= $max ?></h5>
            </div>

            <div class="productlinkset">

              <h5>Price: Rs<span style="margin-right:3px" class="original_price"> <span style="font-weight:bold;" id="m_price_<?= $rowprod['id'] ?>"> <?= $rowprod['price'] ?> </span> </span></h5>
            </div>
            <div class="productlinkset">

              <a onclick="del_prod(<?= $rowprod['id'] ?>)" class="confirm-text" href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg" alt="img"></a>
            </div>


            </div>
        <?php }} ?>

        <div class="increment-decrement">
          <div class="input-groups">
            <div class="form-group" style="margin-right: 6px">
              <label for="">Quantity</label>
              <input style="width:100%; padding-left:7px" max="<?= $max ?>" onkeyup="totalValue(<?= $max ?>,this.value,<?= $rowprod['id'] ?>)" type="number" id='quantity<?= $rowprod['id'] ?>' value="1" name="quantity<?= $rowprod['id'] ?>" class="form-control quantity_val" >

            </div>
            <div style="margin-right: 6px" class="form-group">
              <label for="">Price</label>
              <input style="width:100%" type="number" onkeyup="totalValue()" name="m_price<?= $rowprod['id'] ?>" id="m_price<?= $rowprod['id'] ?>" value="<?= $price ?>" class="form-control price ">

            </div>
            <input type="hidden" id="final_price<?= $rowprod['id'] ?>" name="final_price<?= $rowprod['id'] ?>" class="final_price" value="<?= $price ?>">
            <div style="margin-right: 6px" class="form-group">
              <label for="">Type</label>
              <select class="form-control select discount_type" id="discount_type<?= $rowprod['id'] ?>" name='discount_type<?= $rowprod['id'] ?>' >
                <option value="percentage">Percentage</option>
                <option value="fixed_amount">Fixed Amount</option>
              </select>
            </div>
            <div style="margin-right: 6px" class="form-group">
              <label for="">Discount</label>
              <input style="width:100%" type="number" onkeyup="totalValue()" name="discount<?= $rowprod['id'] ?>" id="discount<?= $rowprod['id'] ?>" value="0" class="form-control discount">

            </div>


          </div>
        </div>
      </div>
    </div>
  </li>


</ul>
<?php }} ?>
