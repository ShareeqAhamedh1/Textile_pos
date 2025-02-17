<?php include './backend/conn.php';

if(isset($_REQUEST['cat_id'])){
  $cat_id = $_REQUEST['cat_id'];
  $sqlprod = "SELECT * FROM tbl_product WHERE category_id='$cat_id'";
}else if(isset($_REQUEST['word'])){
  $word = $_REQUEST['word'];
  $sqlprod = "SELECT * FROM tbl_product WHERE name LIKE '%$word%' OR barcode='$word'";
}else{
  $sqlprod = "SELECT * FROM tbl_product WHERE category_id='18'";
} ?>



<div class="tab_content active" data-tab="">
  <div class="row ">
  <?php
$redStoc = 0;
  $rsprod = $conn->query($sqlprod);
  if($rsprod->num_rows >0){
    while($rowprod = $rsprod->fetch_assoc()){
      $id = $rowprod['id'];
      $av_qnty = currentStockCount($conn,$id);
       ?>

    <div class="col-lg-3 col-sm-6 d-flex">
      <div class="productset flex-fill">

        <div class="productsetcontent"
        onclick="selectProduct(<?= $rowprod['id'] ?>,<?= $av_qnty ?>)" id="product"
        prod_id="<?= $rowprod['id'] ?>" name="<?= $rowprod['name'] ?>"
        price="<?= $rowprod['price'] ?>">

          <img src="<?= $rowprod['image'] ?>" style="width:100%;" alt="">
          <h4><?= $rowprod['name'] ?></h4>
          <h6>Rs <?= $rowprod['price'] ?></h6> <br>
          <?php if ($av_qnty == 0): ?>
              <p style="background:#000;color:#fff;font-weight:bold;padding:5px 5px 5px 5px;border-radius:20px;width:200px;font-size:12px;">Out Of Stock  </p>
          <?php endif; ?>
        </div>

      </div>
    </div>
<?php }} ?>
  </div>
</div>
