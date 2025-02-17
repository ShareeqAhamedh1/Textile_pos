<?php
include './conn.php';


$username = $_REQUEST['username'];
$pass = $_REQUEST['pass'];

$sqlLogin = "SELECT * FROM tbl_user WHERE username='$username' AND password='$pass'";
$rsLogin = $conn->query($sqlLogin);

if ($rsLogin->num_rows > 0) {
    $rowLogin = $rsLogin->fetch_assoc();
    if($rowLogin['user_id']==5){
      $_SESSION['user_logged_final'] = true;
      $_SESSION['u_id'] = $rowLogin['user_id'];
      header('location:../call_order_final.php');
      exit();
    }
    $_SESSION['user_logged'] = true;
    $_SESSION['u_id'] = $rowLogin['user_id'];
    header('location:../index.php');
    exit();

  }else {

    $_SESSION['invalid'] = true;
    header('location:../signin.php?error');
    exit();
}
 ?>
