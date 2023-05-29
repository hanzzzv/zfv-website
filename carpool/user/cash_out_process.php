<?php
include '../appends/dbconnect.php';
include_once '../appends/authenticate.php';
// session_start();
// $id=$_SESSION['id'];
$id = $_SESSION['auth_id'];

$amount = $_POST['amount'];
$mobile = $_POST['mobile'];

if($amount <= 1000){
    $process_fee = 20;
}if($amount <= 2000 && $amount >= 1000){
    $process_fee = 40;
}if($amount <= 3000 && $amount >= 2000){
    $process_fee = 60;
}if($amount <= 4000 && $amount >= 3000){
    $process_fee = 80;
}if($amount <= 5000 && $amount >= 4000){
    $process_fee = 100;
}
$sql2 = "INSERT INTO tbreload (user_id, gcash_ref_num, gcash_mobile_num, amount, type, process_fee, conversion_fee, transac_status) VALUES ('$id','0','$mobile','$amount','Cash Out', '$process_fee', '0', 'Pending')";
$result = mysqli_query($connection, $sql2);   

header("Location:user-profile.php");
?>