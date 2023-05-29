<?php
include '../appends/dbconnect.php';
include_once '../appends/authenticate.php';
// session_start();
// $id=$_SESSION['id'];
$id = $_SESSION['auth_id'];

$amount = $_POST['amount'];
$ref = $_POST['ref'];
$mobile = $_POST['mobile'];

if($amount == 50){
    $conversion_fee = 10;
    $amount1 = $amount - 10;
}if($amount == 100){
    $conversion_fee = 20;
    $amount1 = $amount - 20;
}if($amount == 250){
    $conversion_fee = 50;
    $amount1 = $amount - 50;
}if($amount == 500){
    $conversion_fee = 50;
    $amount1 = $amount - 50;
}
$sql2 = "INSERT INTO tbreload (user_id, gcash_ref_num, gcash_mobile_num, amount, type, process_fee, conversion_fee, transac_status) VALUES ('$id','$ref','$mobile','$amount','Cash In', '0', '$conversion_fee', 'Pending')";
$result = mysqli_query($connection, $sql2);   

header("Location:user-profile.php");
?>