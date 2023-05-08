<?php

include '../../appends/dbconnect.php';

$passengerID= $_GET['passengerID'];

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Asia/Manila'));
$timestamp = $now->format('Y-m-d H:i:s');

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $connection->prepare("UPDATE tblpassengers SET passengerID_stamp_confirmation= '$timestamp' WHERE passengerID='$passengerID'");
$stmnt->execute();
$stmnt->close();
$connection->close();

//$_SESSION['bg'] =  "success";
//$_SESSION['message'] = "Congrats! Drivers ID is verified";
header('Location: ' . $baseline . '/manager/manage-ids/identification-plugin.php');