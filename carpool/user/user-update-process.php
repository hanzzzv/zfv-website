<?php

include '../appends/dbconnect.php';

$users_id = $_SESSION['auth_id'];

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$contact_num = $_POST['contact_num'];
$street = $_POST['street'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$id_type = $_POST['id_type'];
$id_number = $_POST['id_number'];

$stmnt = $connection->prepare("UPDATE tblusers SET users_firstname = '$firstname', users_middlename = '$middlename', users_lastname = '$lastname',
    users_contact_num = '$contact_num', users_street = '$street',users_barangay = '$barangay', users_city = '$city', users_province = '$province' WHERE users_id='$users_id'");
$stmnt->execute();

// Selects the Users & Passengers
$sql = "SELECT * FROM tblusers INNER JOIN tblpassengers ON tblusers.users_id = tblpassengers.users_id WHERE tblusers.users_id='$users_id'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if (is_null($row['passengerID_stamp_confirmation'])) {
    $stmnt = $connection->prepare("UPDATE tblpassengers SET passengerID_type=?, passengerID_number=?, passengerID_rejected=0 WHERE users_id=?");
    $stmnt->bind_param('sss', $id_type, $id_number, $users_id);
} else {
    $stmnt = $connection->prepare("UPDATE tblpassengers SET passengerID_number=?, passengerID_rejected=0 WHERE users_id=?");
    $stmnt->bind_param('ss', $id_number, $users_id);
}

$stmnt->execute();
$stmnt->close();

$connection->close();

$_SESSION['bg'] =  "success";
$_SESSION['message'] = "User Profile is updated";
header('Location: ' . $baseline . '/user/user-profile.php');
