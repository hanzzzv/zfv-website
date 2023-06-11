<?php

include '../appends/dbconnect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$now = new DateTime();
$now->setTimezone(new DateTimeZone('Asia/Manila'));
$timestamp = $now->format('Y-m-d H:i:s');

if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $email = $_GET['user'];
    
    // Checks the Email if Verified
    $sql = "SELECT * FROM tblusers WHERE users_email='$email'";
    $result = $connection->query($sql);

    $row = $result->fetch_assoc();
    if(!is_null($row['users_stamp_verification'])){
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Congrats! Email verification Successful";
        header('Location: index.html');
        return;
    }

    // Prepared Statement & Binding (Avoid SQL Injections)
    $stmnt = $connection->prepare("UPDATE tblusers SET users_stamp_verification=? WHERE users_email=?");
    $stmnt->bind_param('ss', $timestamp, $email);
    $stmnt->execute();
    $stmnt->close();
    $connection->close();

    $_SESSION['bg'] =  "success";
    $_SESSION['message'] = "Account is Verified, Proceed to Sign IN";
    header('Location: ' . $baseline .'/index.html');
}
