<?php

include '../../appends/dbconnect.php';

$cars_id = $_GET['cars_id'];

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Asia/Manila'));
$timestamp = $now->format('Y-m-d H:i:s');

// Prepared Statement & Binding (Avoid SQL Injections)
$stmnt = $connection->prepare("UPDATE tblcars SET cars_decline = 1 WHERE cars_id='$cars_id'");
//NOTE PAREMETER

$stmnt->execute();
$stmnt->close();
$connection->close();

$_SESSION['bg'] =  "danger";
$_SESSION['message'] = "Transportation registration declined";
header('Location: ' . $baseline . '/manager/manage-cars/transpo-plugin.php');
