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
$stmnt->close();
$connection->close();

//$_SESSION['bg'] =  "success";
//$_SESSION['message'] = "Transportation registration approved";
header('Location: ' . $baseline . '/manager/manage-cars/transpo-plugin.php');
