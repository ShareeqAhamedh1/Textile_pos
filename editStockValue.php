
<?php
include './backend/conn.php';

$stock_id = $_REQUEST['st_id'];

$sql = "SELECT * FROM tbl_expiry_date WHERE id='$stock_id'";
$rs = $conn->query($sql);
if($rs->num_rows >0){
  $row = $rs->fetch_assoc();

    $barcode = $row['barcode'];
    $shipping_type = $row["shipping_type"];

    $sqlPr = "SELECT * FROM tbl_product WHERE barcode ='$barcode'";
    $rsPr = $conn->query($sqlPr);
    $rowPr = $rsPr->fetch_assoc();
    ?>
    <h2><?= $rowPr['name'] ?></h2>
    <form action="backend/editValue.php" method="post">
      <input type="hidden" name="page_id" value="<?= $_REQUEST['page_id'] ?>">
      <input type="hidden" name="id" value="<?= $stock_id ?>">
      <div class="form-group">
        <label for="">Barcode</label>
        <input type="text" class="form-control" name="barcode" value="<?= $row['barcode'] ?>">
      </div>
      
      <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" class="form-control" name="quantity" value="<?= $row['quantity'] ?>">
      </div>
      
      
     
      <button type="submit" class="btn btn-primary" name="button">Edit</button>
    </form>
<?php } ?>
