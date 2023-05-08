<?php

include '../appends/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Invalid email format!";
        header('Location: ' . $baseline . '/sign-in.php');
        return;
    }

    // Checks the Email & Password
    $sql = "SELECT users_id, users_stamp_verification, users_type FROM tblusers WHERE users_email='$email' AND users_password='$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            // Check if the Account is Verified or Not
            if (is_null($row['users_stamp_verification'])) {
                $_SESSION['bg'] =  "warning";
                $_SESSION['message'] = "Go to your email to verify your account, before sign IN";
                header('Location: ' . $baseline . '/sign-in.php');
                return;
            } else {

                $_SESSION['auth_id'] =  $row['users_id'];
                $_SESSION['auth_type'] =  $row['users_type'];

                if($row['users_type'] == 'manager'){
                    header('Location: ' . $baseline . '/manager/index.php');
                    return;
                }

                header('Location: ' . $baseline . '/user/user-profile.php');
                return;
            }
        }
    } else {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Sorry you have enter wrong credentials!";
        header('Location: ' . $baseline . '/sign-in.php');
        return;
    }
}
