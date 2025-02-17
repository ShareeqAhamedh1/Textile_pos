<!-- <div style="position: fixed; z-index: -99; width: 100%; height: 100%">
  <iframe
    frameborder="0"
    height="100%"
    width="100%"
    src="https://www.youtube.com/embed/CFj1HXUGhaY?autoplay=1&mute=1&controls=0enablejsapi=1"
  >
  </iframe>
</div> -->
<?php
$time = strtotime('23-Dec');

$newformat = date('Y-m-d',$time);

echo $newformat;
 ?>

 <?php
  $st_tot = 0;
  $cat_id = $row['sub_category_id'];
  $sqlSub = "SELECT * FROM tbl_expiry_date WHERE product_id='$product_id' AND user_id='3'";
  $rsSub = $conn->query($sqlSub);
  if($rsSub->num_rows >0){
    while($rowSub = $rsSub->fetch_assoc()){
      $st_tot +=$rowSub['quantity'];
       ?>
       <tr>
         <td><?= $rowSub['expiry_date'] ?></td>
         <td>
           <?php
           if($rowSub['shipping_type']=="Sea Cargo"){ ?>
           <a style="width:100%" class="btn btn-block btn-outline-primary active" href="javascript:void(0);"><i class="fa fa-anchor"></i> </a>
         <?php }elseif($rowSub['shipping_type']=="Air Cargo"){  ?>
           <a style="width:100%" class="btn btn-block btn-outline-primary active" href="javascript:void(0);"><i class="fa fa-fighter-jet"></i> </a>
         <?php } ?>
         </td>
         <td>
             <?= $rowSub['quantity'] ?><?= $unit ?>
         </td>
         <td>
           <?php if($u_id == 3){ ?>
           <a href="editStock.php?barcode=<?= $rowSub['barcode'] ?>&id=<?= $rowSub['id'] ?>"
              onclick="return confirm('Are you sure want to edit this?')"> <img src="assets/img/icons/edit.svg" alt="img"> </a> <br>
           <a href="backend/delStock.php?id=<?= $rowSub['id'] ?>&pid=<?= $product_id ?>" onclick="return confirm('Are you sure want to delete this?')" class="btn btn-danger"> <img src="assets/img/icons/delete.svg" alt="img"> </a>
         <?php } ?>
         </td>
       </tr>
       <tr>
         <td colspan="4">Total Stock Value: </td>
       </tr>

      <?php }} ?>
