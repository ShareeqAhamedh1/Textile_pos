<?php

include './conn.php';

// $user_id = $_SESSION['u_id'];

$return_date = $_REQUEST['return_date'];
$grm_id = $_REQUEST['grm_id'];



$query = "INSERT INTO tbl_return_pos (grm_ref,status,return_date) VALUES('$grm_id',2,'$return_date')";
mysqli_query($conn, $query);


echo json_encode(array("statusCode"=>200));
exit();
