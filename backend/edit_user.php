<?php

include 'conn.php';

$u_id = $_REQUEST['u_id'];
$username = $_REQUEST['u_name'];
$password = $_REQUEST['u_pass'];
$s_point = $_REQUEST['sale_point'];

$sqlEditUser = "UPDATE tbl_user SET username='$username',
                                    password='$password',
                                    sale_point='$s_point' WHERE user_id='$u_id'
                                    ";
$rsEditUser = $conn->query($sqlEditUser);

if($rsEditUser > 0){
    header('location:../add_user.php');
    exit();
}
else{
    header('location:../add_user.php');
    exit();
}