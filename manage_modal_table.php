
<?php
include './backend/conn.php';

$id = $_REQUEST['id']; ?>




<table class="table">
  <thead>
    <tr>
      <th>Expiry Date</th>
      <th>Shipping Type</th>
      <th>Quantity</th>
      <th>Note</th>
    </tr>
  </thead>
  <tbody>
    <?php

      $redStoc = 0;
      $redStocCall = 0;
      $sqlMinStock = "SELECT SUM(quantity) AS qnty FROM tbl_order WHERE product_id='$id'";
      $rsMinStock = $conn->query($sqlMinStock);

      if($rsMinStock->num_rows > 0){
        $rowMinStock = $rsMinStock->fetch_assoc();
        $redStoc = $rowMinStock['qnty'];
      }

      $sqlMinStockCall = "SELECT SUM(quantity) AS qnty_call FROM tbl_order_temp WHERE product_id='$id' AND status !='0' AND status !='1'";
      $rsMinStockCall = $conn->query($sqlMinStockCall);

      if($rsMinStockCall->num_rows > 0){
        $rowMinStockCall = $rsMinStockCall->fetch_assoc();
        $redStocCall = $rowMinStockCall['qnty_call'];
      }

      $redStoc +=$redStocCall;

     $st_tot = 0;
     $sqlSub = "SELECT * FROM tbl_expiry_date WHERE product_id='$id' AND user_id='3' ORDER BY `tbl_expiry_date`.`expiry_date` ASC";
     $rsSub = $conn->query($sqlSub);
     if($rsSub->num_rows >0){
       while($rowSub = $rsSub->fetch_assoc()){
         $current_stock = $rowSub['quantity'];

         if($redStoc != 0){
           if($current_stock <= $redStoc){
             $redStoc =$redStoc - $current_stock;
             $current_stock = 0;
           }
           else {
             $current_stock -= $redStoc;
             $redStoc = 0;
           }
         }
         // Retrieve old and new quantities from tbl_manage_stock table
    $manageStockQuery = "SELECT old_quantity, new_quantity FROM tbl_tally_stock WHERE record_id={$rowSub['id']}";
    $manageStockResult = $conn->query($manageStockQuery);

    if ($manageStockResult->num_rows > 0) {
      $manageStockRow = $manageStockResult->fetch_assoc();
      $oldQuantity = $current_stock;
      $newQuantity = $manageStockRow['new_quantity'];

      // Calculate the difference between old and new quantities
      $quantityDiff = $newQuantity - $oldQuantity;

      // Add or subtract the quantity difference from the current stock
      $current_stock += $quantityDiff;
    }

         $st_tot +=$current_stock;
          ?>
          <tr>
            <input type="hidden" name="product_id<?= $rowSub['id']; ?>" value="<?= $rowSub['product_id']; ?>">
            <td><?= $rowSub['expiry_date'] ?></td>
            <td >
            <?= $rowSub['shipping_type'] ?>
            </td>
            <td class="prod_row">
              <input type="hidden" name="old_quantity<?= $rowSub['id']; ?>" value="<?= $current_stock ?>">
                <input type="text" name="new_quantity<?= $rowSub['id']; ?>" value="<?= $current_stock ?>">
            </td>

            <td class="prod_row">
                <input type="text" name="note<?= $rowSub['id']; ?>" value="">
            </td>

            <td class="prod_row" ><input type="checkbox" name="rec_id[]" value="<?= $rowSub['id']; ?>"></td>

          </tr>
         <?php } ?>

         <tr>

           <td></td>
           <td >Current Total Stock Quantity:  </td>
           <td><?= $st_tot ?></td>
           <td></td>
           <td>

             <button  type="submit" class="btn btn-primary btn-sm ">Update Stock</button>
           </td>
         </tr>
         <?php
       } ?>
  </tbody>
</table>
<script type="text/javascript">
$(document).ready(function(){
  $('.prod_row').css('cursor', 'pointer').click(function() {
      var checkBoxes = $(this).parent('tr').find('input:checkbox')
      checkBoxes.prop("checked", true);
  });
});



</script>
