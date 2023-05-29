<?php
include '../../appends/dbconnect.php';

$cars_id = $_GET['cars_id'];
$users_id = $_GET['users_id'];

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Asia/Manila'));
$timestamp = $now->format('Y-m-d H:i:s');

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $connection->prepare("UPDATE tblcars SET cars_stamp_confirm = '$timestamp' WHERE cars_id='$cars_id'");
$stmnt->execute();

$stmnt = $connection->prepare("UPDATE tblusers SET users_type = 'driver' WHERE users_id='$users_id'");
$stmnt->execute();

// Check if it's the first registered car for the user
$sql = "SELECT COUNT(*) AS car_count FROM tblcars WHERE drivers_id='$users_id'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$carCount = $row['car_count'];

if ($carCount == 1) {
    // First registered car, provide 40 free tickets
    $stmnt = $connection->prepare("UPDATE tblusers SET users_balance = users_balance + 40 WHERE users_id='$users_id'");
    $stmnt->execute();
}

$stmnt->close();
$connection->close();

//$_SESSION['bg'] =  "success";
//$_SESSION['message'] = "Transportation registration approved";
header('Location: ' . $baseline . '/manager/manage-cars/transpo-plugin.php');
?>
