<?php
error_reporting(0);
date_default_timezone_set('Asia/Colombo');


session_start();
// $servername = "localhost";
// $username = "posfkpop_card_system_admin";
// $password = "Dh{Ad{qew{Rr";
// $dbname = "posfkpop_card_system";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_poscard_2";

$conn = new mysqli($servername,$username,$password,$dbname);

function currentStockCount($conn,$p_id){

  $sqlMinStock = "SELECT SUM(quantity) AS qnty FROM tbl_order WHERE product_id='$p_id'";
  $rsMinStock = $conn->query($sqlMinStock);

  if($rsMinStock->num_rows > 0){
    $rowMinStock = $rsMinStock->fetch_assoc();
    $redStoc = $rowMinStock['qnty'];
  }

  $sqlMinStockCall = "SELECT SUM(quantity) AS qnty_call FROM tbl_order_temp WHERE product_id='$p_id' AND status !='0' AND status !='1'";
  $rsMinStockCall = $conn->query($sqlMinStockCall);

  if($rsMinStockCall->num_rows > 0){
    $rowMinStockCall = $rsMinStockCall->fetch_assoc();
    $redStocCall = $rowMinStockCall['qnty_call'];
  }

  $redStoc +=$redStocCall;

  $sqlSub = "SELECT SUM(quantity) AS quantity FROM tbl_expiry_date WHERE product_id='$p_id'";
  $rsSub = $conn->query($sqlSub);
  if($rsSub->num_rows >0){
    $rowSub = $rsSub->fetch_assoc();

    $quantity = $rowSub['quantity'] - $redStoc;
 }
 else {
    $quantity = 0;
 }


  $sql_tally = "SELECT * FROM tbl_tally_stock WHERE product_id='$p_id'";
  $rs_tally = $conn->query($sql_tally);
  if($rs_tally->num_rows > 0){
    while($row_tally = $rs_tally->fetch_assoc()){
      $tally_qnty = $row_tally['new_quantity'];
      $plus_minus = $row_tally['add_minus'];
      if($plus_minus == 1){
        $quantity += $tally_qnty;
      }
      elseif ($plus_minus == 2) {
        $quantity -=$tally_qnty;
      }
    }


  }


 return $quantity;
}


function currentStockCountByLocation($conn,$p_id,$s_point_id){

  $sqlMinStock = "SELECT SUM(quantity) AS qnty FROM tbl_order WHERE product_id='$p_id'";
  $rsMinStock = $conn->query($sqlMinStock);

  if($rsMinStock->num_rows > 0){
    $rowMinStock = $rsMinStock->fetch_assoc();
    $redStoc = $rowMinStock['qnty'];
  }

  $sqlMinStockCall = "SELECT SUM(quantity) AS qnty_call FROM tbl_order_temp WHERE product_id='$p_id' AND status !='0' AND status !='1'";
  $rsMinStockCall = $conn->query($sqlMinStockCall);

  if($rsMinStockCall->num_rows > 0){
    $rowMinStockCall = $rsMinStockCall->fetch_assoc();
    $redStocCall = $rowMinStockCall['qnty_call'];
  }

  $redStoc +=$redStocCall;

  $sqlSub = "SELECT SUM(quantity) AS quantity FROM tbl_expiry_date WHERE product_id='$p_id' AND s_point_id='$s_point_id'";
  $rsSub = $conn->query($sqlSub);
  if($rsSub->num_rows >0){
    $rowSub = $rsSub->fetch_assoc();

    $quantity = $rowSub['quantity'] - $redStoc;
 }
 else {
    $quantity = 0;
 }


  $sql_tally = "SELECT * FROM tbl_tally_stock WHERE product_id='$p_id'";
  $rs_tally = $conn->query($sql_tally);
  if($rs_tally->num_rows > 0){
    while($row_tally = $rs_tally->fetch_assoc()){
      $tally_qnty = $row_tally['new_quantity'];
      $plus_minus = $row_tally['add_minus'];
      if($plus_minus == 1){
        $quantity += $tally_qnty;
      }
      elseif ($plus_minus == 2) {
        $quantity -=$tally_qnty;
      }
    }


  }


 return $quantity;
}


function getDataBack($conn,$table,$col_id,$id,$coulmn){
  $sql = "SELECT * FROM $table WHERE $col_id = '$id'";
  $rs = $conn->query($sql);

  if ($rs->num_rows > 0) {
    $row = $rs->fetch_assoc();

    return $row[$coulmn];
  }
}

function getPickup($id){
  switch ($id) {
    case "9":
        return "Koko Pay";
        break;
    case "8":
        return "Mint Pay";
        break;
    case "1":
        return "Daraz";
        break;
    case "2":
        return "Pick Me";
        break;
    case "3":
        return "Kiddoz";
        break;
    case "4":
        return "Website";
        break;
    case "5":
        return "Social Media";
        break;
    case "6":
        return "Call";
        break;
    case "7":
        return "Walk In Customer";
        break;
    case "0":
        return "Others";
        break;
      }
    }

    function getPayment($id){
      switch ($id) {
        case "0":
            return "Cash";
        case "1":
            return "Online Payment";
            break;
        case "2":
            return "Bank Transfer";
            break;
        case "3":
            return "Credit";
            break;
        case "4":
            return "Cash On Delivery";
            break;
          }
        }

function getData($conn,$table,$col_id,$id,$coulmn){
  $sql = "SELECT * FROM $table WHERE $col_id = '$id'";
  $rs = $conn->query($sql);

  if ($rs->num_rows > 0) {
    $row = $rs->fetch_assoc();

    echo $row[$coulmn];
  }
  else {
    echo "Nothing Found";
  }
}

function uploadImage($fileName,$filePath,$allowedList,$errorLocation){

  $img = $_FILES[$fileName];
  $imgName =$_FILES[$fileName]['name'];
  $imgTempName = $_FILES[$fileName]['tmp_name'];
  $imgSize = $_FILES[$fileName]['size'];
  $imgError= $_FILES[$fileName]['error'];

  $fileExt = explode(".",$imgName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = $allowedList;

  if(in_array($fileActualExt, $allowed)){
    if($imgError == 0){
      $GLOBALS['fileNameNew']='posfive'.uniqid('',true).".".$fileActualExt;
        $fileDestination = $filePath.$GLOBALS['fileNameNew'];

        $resultsImage = move_uploaded_file($imgTempName,$fileDestination);

      }
      else{
        header('location:'.$errorLocation.'?imgerror');
        exit();
      }
  }
  else{
    header('location:'.$errorLocation.'?extensionError&'.$fileActualExt);
    exit();
  }
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>
