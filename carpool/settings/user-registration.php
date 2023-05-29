<?php

include '../appends/dbconnect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = 'passenger';
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $contact_num = $_POST['contact_num'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_type = $_POST['id_type'];
    $id_number = $_POST['id_number'];

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Invalid format!";
        header('Location: ' . $baseline .'/index.php');
        return;
    }

    // Checks the Email 
    $sql = "SELECT * FROM tblusers WHERE users_email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Email already exist in the system";
        header('Location: ' . $baseline .'/index.php');
        return;
    }

    // Prepared Statement & Binding (Avoid SQL Injections)
    $stmnt = $connection->prepare("INSERT INTO tblusers (users_type, users_firstname, 
                                    users_middlename, users_lastname, users_contact_num, 
                                    users_email, users_password, users_street, users_barangay, 
                                    users_city, users_province)
            VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)");
    $stmnt->bind_param('sssssssssss', $type, $firstname, $middlename, $lastname, $contact_num,
                                    $email, $password, $street, $barangay, $city, $province);
    $stmnt->execute();

    // Adding to Passenger
    $sql = "SELECT users_id, users_stamp_verification, users_type  FROM tblusers WHERE users_email='$email' AND users_password='$password'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $users_id = $row['users_id'];

    $stmnt = $connection->prepare("INSERT INTO tblpassengers (users_id, passengerID_type, passengerID_number)
            VALUES (?, ?, ?)");
    $stmnt->bind_param('sss', $users_id, $id_type, $id_number);
    $stmnt->execute();

    // Update balance with 10 free tickets
    $sql = "UPDATE tblusers SET users_verified = 'Y', users_balance = users_balance + 10 WHERE users_id = '$users_id'";
    $result = $connection->query($sql);

    $stmnt->close();
    $connection->close();


    // Mailling Part
    $name = $lastname . ", " . $middlename." ". $firstname;
    $subject = "Carpool Account Verification: " . $name;
    $link = $baseline . "/settings/user-verification.php?user=" . $email . "";
    $message = ' 
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">

    </head>
    <body>
    <b> Good Day!  </b>
    <p> Hi, <strong>' . $name . '!</strong></p>

    <p> This is your verification notice, from registering your account! Click the link below.</p>
        <br><br>
        <a id="verify" href="' . $link . '"> Authenticate Me</a>
        <br>
        <br>
     
       
        <b>Love, HCV Carpool Application</b>
    </p>
</body>
    </html>
    ';

    $mail = new PHPMailer(true);
    $mail->isSMTP();

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = 'true';
    $mail->Username = 'carpool.hcv888@gmail.com';
    $mail->Password = 'wlodfpokhmjjvath';
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';
    
    $mail->setFrom('carpool.hcv888@gmail.com', 'HCV Carpool App');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();

    $_SESSION['bg'] =  "warning";
    $_SESSION['message'] = "Please check your email to verify your carpool account.";
    header('Location: ' . $baseline .'/sign-in.php');
}
