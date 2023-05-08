<?php

include '../../appends/dbconnect.php';

$passengerID = $_GET['passengerID'];

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Asia/Manila'));
$timestamp = $now->format('Y-m-d H:i:s');

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $connection->prepare("UPDATE tblpassengers SET passengerID_rejected = 1 WHERE passengerID='passengerID'");
$stmnt->execute();
$stmnt->close();
$connection->close();

$_SESSION['bg'] =  "danger";
$_SESSION['message'] = "Drivers Identification was declined";
header('Location: ' . $baseline . '/manager/manage-ids/identification-plugin.php');
