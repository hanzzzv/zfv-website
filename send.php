<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["send"])){
        $email = $_POST["email"];
        $name = $_POST["name"];
        $subject = $_POST["subject"];
        // $msg = $_POST["message"];

        $msg = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <p> Hi, <strong> ' .$name . ' !</strong></p>
            <p>
                <br> Thank you for your interest in our construction company and for reaching out to us for your project needs. 
                <br> We have received your inquiry and are excited to explore the opportunity to work with you.
    
                <br> 
    
                <br>
                Our team of experts is currently reviewing the details of your request, and we will get back to you with a comprehensive response as soon as possible.
                <br> We understand that time is of the essence and we assure you that we will make every effort to provide you with a prompt and thorough reply.
    
                 <br> 
                 <br>
                 If you have any questions or additional information that you would like to share with us in the meantime, <br>  please do not hesitate to reach out to us.
                  We are here to help you and are committed to delivering the best solutions for your construction needs.
                  <br>
                  <br> 
                  Thank you again for considering our services, and we look forward to the opportunity to work with you.
    
            </p>
            <br><br>
              Best regards,<br>
            <strong></b>ZFV Enterprises</strong>
            <br><br>
        </body>
        </html>
        ';
        $mail = new PHPMailer(true);
        $mail -> isSMTP();
        $mail ->Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'contact.zfventerprises@gmail.com';
        $mail -> Password = 'qypbpkaeccofwusz';
        $mail -> SMTPSecure ='tls';
        $mail -> Port = 587;


 
        // $mail->SMTPSecure = 'ssl';
        // $mail->Port = '465';
 
        $mail-> setFrom('contact.zfventerprises@gmail.com', 'ZFV Enterprises');
        
        $mail ->addAddress($email);

        $mail -> isHTML(true);

        $mail ->Subject = "Your Project Partner:";
        $mail -> Body = $msg;
        $mail ->send();

        $email2 = $_POST["email"];
        $name2 = $_POST["name"];
        $subject2 = $_POST["subject"];
        $messages2 = $_POST["message"];

        $msg2 = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
        <p> <strong> Customer Inquiries: <strong></p><br>
            <p> <strong>From: </strong>' . $name2 . ' </p><br>
            <p><strong> Subject: </strong>' . $subject2 . '</p>
            <br>
            <p><strong> Message: </strong>' . $messages2 . '
            </p>
            <br><br>
         <p>(ZFV Enterprises, 2023)</p>
            <br><br>
        </body>
        </html>
        ';
        $mail2 = new PHPMailer(true);
        $mail2 -> isSMTP();
        $mail2 ->Host = 'smtp.gmail.com';
        $mail2 -> SMTPAuth = true;
        $mail2 -> Username = 'contact.zfventerprises@gmail.com';
        $mail2 -> Password = 'qypbpkaeccofwusz';
        $mail2 -> SMTPSecure ='tls';
        $mail2 -> Port = 587;
        
        $mail2 ->addAddress('contact.zfventerprises@gmail.com');
        $mail2 -> isHTML(true);
        
        $mail2 ->Subject = $subject2;
        $mail2 -> Body = $msg2;
        $mail2 ->send();
        header('location:contact.html');    
    }
?>

