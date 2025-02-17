<?php include './backend/conn.php';
 $u_id = $_SESSION['u_id'];
 
 $make_unique = array();
 
 
 
 ?>

<table class="table  datanew" id="table_id">
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Unit Price</th>
     
      <th>quantity</th>
      <th>Total Value</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql_prod = "SELECT * FROM tbl_product";
      $rs_prod = $conn->query($sql_prod);
      if($rs_prod->num_rows > 0){
        while ($rowProd = $rs_prod->fetch_assoc()) {
            $prod_id = $rowProd['id'];


            $redStoc = 0;
            $redStocCall = 0;

            $sqlMinStock = "SELECT SUM(quantity) AS qnty FROM tbl_order WHERE product_id='$prod_id'";
            $rsMinStock = $conn->query($sqlMinStock);

            if($rsMinStock->num_rows > 0){
              $rowMinStock = $rsMinStock->fetch_assoc();
              $redStoc = $rowMinStock['qnty'];
            }

            $sqlMinStockCall = "SELECT SUM(quantity) AS qnty_call FROM tbl_order_temp WHERE product_id='$prod_id' AND status !='0' AND status !='1'";
            $rsMinStockCall = $conn->query($sqlMinStockCall);

            if($rsMinStockCall->num_rows > 0){
              $rowMinStockCall = $rsMinStockCall->fetch_assoc();
              $redStocCall = $rowMinStockCall['qnty_call'];
            }

            $redStoc +=$redStocCall;

           $st_tot = 0;
           $cat_id = $row['sub_category_id'];

           $exp_hold_date =array();
           $current_stock = 0;
           $tally_qnty =0;
           $stop_status = 0;
           $hold_qnty = 0;

           $tot_stock_do =0;


                           $sql_tally_one = "SELECT SUM(new_quantity) AS qnty_add FROM tbl_tally_stock WHERE product_id='$prod_id' AND add_minus='1' AND exp_date ='0000-00-00'";
                            $rs_tally_one = $conn->query($sql_tally_one);
                            $row_tally_one = $rs_tally_one->fetch_assoc();

                            $tot_stock_do +=$row_tally_one['qnty_add'];

                            $sql_tally_one = "SELECT SUM(new_quantity) AS qnty_minus FROM tbl_tally_stock WHERE product_id='$prod_id' AND add_minus='2' AND exp_date ='0000-00-00'";
                            $rs_tally_one = $conn->query($sql_tally_one);
                            $row_tally_one = $rs_tally_one->fetch_assoc();

                            $tot_stock_do -=$row_tally_one['qnty_minus'];

           $sqlSub = "SELECT * FROM tbl_expiry_date WHERE product_id='$prod_id' AND user_id='3' ORDER BY `tbl_expiry_date`.`expiry_date` ASC";
           $rsSub = $conn->query($sqlSub);
           if($rsSub->num_rows >0){

             while($rowSub = $rsSub->fetch_assoc()){
               $current_stock = $rowSub['quantity'];
               $stock_exp_date = $rowSub['expiry_date'];


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
               //end of Sales

               if($stock_exp_date == ""){
                 if($tot_stock_do > 0){
                   $current_stock += $tot_stock_do;
                   $tot_stock_do = 0;
                 }
                 elseif ($tot_stock_do < 0) {
                   $tot_stock_do_temp = $tot_stock_do;
                   $pos_value = abs($tot_stock_do_temp);

                 if($pos_value > $current_stock){
                   $tot_stock_do +=$current_stock;
                   $current_stock =0;

                 }
                 elseif($current_stock > $pos_value){
                   $current_stock -=$pos_value;
                   $tot_stock_do = 0;
                 }

                 }
             }
             else {
               if(!in_array($stock_exp_date,$exp_hold_date)){
                 $sql_tally_two = "SELECT SUM(new_quantity) AS qnty_add FROM tbl_tally_stock WHERE product_id='$prod_id'
                AND add_minus='1' AND exp_date='$stock_exp_date'";
                  $rs_tally_two = $conn->query($sql_tally_two);
                  $row_tally_two = $rs_tally_two->fetch_assoc();

                   $tot_stock_do +=$row_tally_two['qnty_add'];


                 $sql_tally_one = "SELECT SUM(new_quantity) AS qnty_minus FROM tbl_tally_stock WHERE product_id='$prod_id' AND
                 add_minus='2' AND exp_date='$stock_exp_date'";
                 $rs_tally_one = $conn->query($sql_tally_one);
                 $row_tally_one = $rs_tally_one->fetch_assoc();

                 $tot_stock_do -=$row_tally_one['qnty_minus'];
                 if($tot_stock_do > 0){
                   $current_stock += $tot_stock_do;
                   $tot_stock_do = 0;
                   $exp_hold_date[] =$stock_exp_date;
                 }
                 elseif ($tot_stock_do < 0) {
                  $tot_stock_do_temp = $tot_stock_do;
                  $pos_value = abs($tot_stock_do_temp);
                  if($hold_qnty > 0){
                    $pos_value = $hold_qnty;
                  }

                if($pos_value > $current_stock){
                  $hold_qnty = $pos_value - $current_stock;
                  $tot_stock_do +=$current_stock;
                  $current_stock =0;

                }
                elseif($current_stock >= $pos_value){
                   $current_stock -=$pos_value;
                   $tot_stock_do = 0;
                   $hold_qnty =0;
                   $exp_hold_date[] =$stock_exp_date;
                }

                }

               }

             }




               //end of tally stock




               $st_tot +=$current_stock;
               $price_tot = getDataBack($conn,'tbl_product','id',$prod_id,'price');

               $tot_value +=$price_tot * $current_stock;
                ?>
                <tr>
                  <td> <?= getDataBack($conn,'tbl_product','id',$prod_id,'name') ?> </td>
                  <td> <?= $price_tot ?> </td>
                  
                  <td>
                      <?= $current_stock ?><?= $unit ?>
                  </td>
                  <td> <?= $price_tot * $current_stock ?> </td>
                </tr>
              


          <?php } } } } ?>
          <tr>
            <td colspan="3">Total Value: <?= $tot_value ?></td>
          </tr>

  </tbody>
</table>
