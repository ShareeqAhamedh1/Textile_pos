
<?php
include './backend/conn.php';

$grm_ref = $_REQUEST['order_id'];

// $customer_id = $_REQUEST['customer_id']; ?>

<div style="margin-bottom:10px"class="row">
  <h4 style="text-align:center">Order Details</h4>

</div>
<div class="row">

    <input type="hidden" id="grm_ref_modal" name="order_id" value="<?= $grm_ref ?>">


    <?php
    $sql = "SELECT * FROM tbl_order_customer WHERE order_id='$grm_ref' ";
    $rs = $conn->query($sql);
    if($rs->num_rows >0){
      while($row = $rs->fetch_assoc()){ ?>
        <div class="col-lg-6 col-sm-6 col-6">
          <div class="form-group">
            <label>Delivery Charge</label>
            <input name="del_charge_modal" id="del_charge_modal" type="quantity" value="<?= $row['delivery_charge'] ?>"class="form-control">
          </div>
        </div>

        <div class="col-lg-4 col-sm-6 col-12">
          <div class="form-group">
            <label>Payment Type</label>
            <select name="pay_type_modal" id="pay_type_modal" class="form-control select">
              <?php
              $methods = ['Cash','Online Payment','Bank Transfer','Credit','Cash on delivery'];
              for ($i=0; $i < 5; $i++){
                if($i == $row['payment_type']){
               ?>
                  <option selected value="<?= $i ?>"><?= $methods[$i] ?></option>
                <?php }else{ ?>
                  <option value="<?= $i ?>"><?= $methods[$i] ?></option>
                <?php }} ?>
            </select>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-6">
          <div class="form-group">
            <label>Delivery Method</label>
            <select name="pickup" id="pickup_modal" class="form-control select">
              <?php
              $brand_id = $row['del_method'];
              $sqlSub = "SELECT * FROM tbl_delivery_methods";
              $rsSub = $conn->query($sqlSub);
              if($rsSub->num_rows >0){
                while($rowSub = $rsSub->fetch_assoc()){
                  if($rowSub['dlm_id']==$brand_id){?>
                    <option selected value="<?=$rowSub['dlm_id'] ?>"><?= $rowSub['dlm_name'] ?></option>
                  <?php }else{ ?>
                    <option value="<?=$rowSub['dlm_id'] ?>"><?= $rowSub['dlm_name'] ?></option>
                  <?php }}} ?>
            </select>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-6">
        <div class="form-group">
          <label>Pickup</label>
          <select name="pickup" id="pickup_modal" class="form-control select">
            <?php
            $methods = ['Daraz','Pick Me','Kiddoz','Website','Social Media','Call','Walk In Customer','Mint Pay','Koko Pay'];
            for ($i=0; $i < 9; $i++){
              if(($i+1) == $row['pickup']){
             ?>
                <option selected value="<?= $i+1 ?>"><?= $methods[$i] ?></option>
              <?php }elseif(0 == $row['pickup']){ ?>
                <option value="0">To be updated</option>
              <?php }else{ ?>
                <option value="<?= $i+1 ?>"><?= $methods[$i] ?></option>
              <?php }} ?>
          </select>
        </div>
      </div>
    <div class="col-lg-6">
      <div class="form-group">
        <select name="pay_st" id="pay_st" class="form-control">
          <option value="2" <?php if($row['pay_st'] == 2){ echo "selected"; } ?>>PAID</option>
          <option value="1" <?php if($row['pay_st'] == 1){ echo "selected"; } ?>>NOT PAID</option>
        </select>
      </div>
    </div>
        <div class="">
          <div class="form-group">
            <button onclick="updateOrderDetails(<?= $grm_ref ?>)" type="button" class="btn btn-primary btn-sm">Update Details</button><br><br>
          </div>
        </div>
</div>
<div class="row">
        <h4 style="text-align:center">Customer Details</h4><br><br>
        <?php
        $cust_id = $row['customer_id'];
        $sqlS = "SELECT * FROM tbl_customer WHERE c_id='$cust_id';";
        $rsS = $conn->query($sqlS);
        if($rsS->num_rows >0){
          while($rowS = $rsS->fetch_assoc()){
         ?>
          <div class="col-lg-6 col-sm-6 col-6">
            <div class="form-group">
              <label>Customer Name</label>
              <span><?= $rowS['c_name']  ?></span>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-6">
            <div class="form-group">
              <label>Phone</label>
              <span><?= $rowS['c_phone']  ?></span>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-6">
            <div class="form-group">
              <label>Email</label>
              <span><?= $rowS['c_email']  ?></span>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6 col-6">
            <div class="form-group">
              <label>City</label>
              <span><?= $rowS['c_city']  ?></span>
            </div>
          </div>
          <div class="col-lg-12 col-sm-6 col-12">
            <div class="form-group">
              <label>Address</label>
              <span><?= $rowS['c_address']  ?></span>
            </div>
          </div>


        <?php }} ?>

    <?php }} ?>
</div>
