<?php

include '../appends/dbconnect.php';
include_once '../appends/authenticate.php';

// Retrieves User
$sql = "SELECT * FROM tblusers WHERE users_id=$id";
$result = $connection->query($sql);

// Retrieves Pending Car Approval
$car_sql = "SELECT * FROM tblcars WHERE drivers_id = '$id';";
$car_result = $connection->query($car_sql);

// Retrieves Passenger
$pass_sql = "SELECT * FROM tblpassengers WHERE users_id=$id";
$pass_result = $connection->query($pass_sql);
$pass_row = $pass_result->fetch_assoc();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        // Check if the Account is Verified or Not
        if (is_null($row['users_stamp_verification'])) {
            $_SESSION['bg'] =  "warning";
            $_SESSION['message'] = "Not yet Verified, Kindly Check your email!";
            header('Location: ' . $baseline . '/sign-in.php');
            return;
        }

        if (!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $bg = $_SESSION['bg'];
        }

        $type = $row['users_type'];
        $firstname = $row['users_firstname'];
        $middlename = $row['users_middlename'];
        $lastname = $row['users_lastname'];
        $contact_num = $row['users_contact_num'];
        $street = $row['users_street'];
        $barangay = $row['users_barangay'];
        $city = $row['users_city'];
        $province = $row['users_province'];
        $verification = $row['users_stamp_verification'];
        $creation = $row['users_stamp_creation'];
        $users_balance = $row['users_balance'];

    }
} else {
    $_SESSION['bg'] =  "warning";
    $_SESSION['message'] = "User profile not found in the system";
    header('Location: ' . $baseline . '/sign-in.php');
    return;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCV Carpool App</title>
    <link rel="icon" type="image/png" href="../images/mainlogo.png">

    <link rel="icon" type="image/png" href="../images/mainlogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-image: url("alltimebg.png");
            background-size: cover;
        }

        .navbar {
            background-image: linear-gradient(to bottom right, #FF6B6B, #FFE66D);
            margin-bottom: 2rem;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 2px rgba(0,0,0,0.5);
            padding-left: 1rem; /* Add padding to the left */
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
            margin: 0 1rem;
            color: #ffffff;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }



    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HCV Carpool</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="user-profile-update.php">Update My Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user-profile-update.php">Register ID</a>
                </li>
   
                <li class="nav-item">
                    <a class="nav-link" href="../settings/sign-out.php">Sign Out</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mvX8a9lGmdKsR7ZpfVSs+GO8xHkT3q04cV7bqv2vX8F7t3E3t4zPjKw2tHRBLx/Z" crossorigin="anonymous"></script>

<div class="container my-3 col-lg-5" style="background: linear-gradient(to bottom right, #ff6a00, #dbc534); border-radius: 20px; padding: 30px; color: white;">

    <?php
    if (!empty($_SESSION['message'])) :
        $bg = $_SESSION['bg'];
        $message = $_SESSION['message'];
        ?>
        <div class="alert alert-<?= $bg ?> alert-dismissible fade show" role="alert">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['message']);
        unset($_SESSION['bg']);
    endif ?>
    <hr>
    <h1> Carpool Profile Information </h1>
    <hr>

    <?php
    if (!is_null($pass_row['passengerID_stamp_confirmation'])) :
        ?>
        <a href="transpo-registration.php" class="btn btn-primary btn-lg" style="background: linear-gradient(to bottom right, #39b98e, #007f5f); border-color: #ffffff;">Register Vehicle</a>
    <?php endif; ?>

    <?php
    if ($car_result->num_rows > 0) :
        ?>
        <a href="transpo-list.php" class="btn btn-primary btn-lg" style="background: linear-gradient(to bottom right, #39b98e, #008c72); border-color: #ffffff;">My Car List</a>
    <?php endif; ?>


    <hr>
    <table style="width:100%">
        <h5> Personal Information </h5>
        <tr>
            <th> Fist Name: </th>
            <td> <?= $firstname ?> </td>
        </tr>
        <tr>
            <th> Middle Name: </th>
            <td> <?= $middlename  ?> </td>
        </tr>
        <tr>
            <th> Last Name: </th>
            <td> <?= $lastname  ?> </td>
        </tr>
        <tr>
            <th> Account Status: </th>
            <th class="<?= $pass_row['passengerID_rejected'] == 1 ? 'text-danger' : ($pass_row['passengerID_stamp_confirmation'] == null ? 'text-warning' : 'text-success') ?>"> <?= $pass_row['passengerID_rejected'] == 1 ? 'Failed Verification' : ($pass_row['passengerID_stamp_confirmation'] == null ? 'Not Verified' : 'Verified User') ?> </th>
        </tr>
        <tr>
            <th> Identification: </th>
            <td> <?= $pass_row['passengerID_type'] == '' ? 'No Valid ID Submission' : $pass_row['passengerID_type'] ?> </td>
        </tr>

        </table>
        <table style="width:100%">

            <hr>
            <h5> Other details </h5>

            <tr>
                <th> Phone Number: </th>
                <td> <?= $contact_num == '' ? 'N/A' : $contact_num ?> </td>
            </tr>
            <tr>
                <th> Street: </th>
                <td> <?= $street ?> </td>
            </tr>
            <tr>
                <th> Barangay: </th>
                <td> <?= $barangay  ?> </td>
            </tr>
          <tr>
          <th> Municipality/City: </th>
          <td> <?=  $city ?> </td>
          </tr>
            <tr>
                <th> Province: </th>
                <td> <?= $province ?> </td>
            </tr>
            <tr>
                <th> Account Balance: </th>
                <td> <?= $users_balance ?> </td>
            </tr>
            <tr>
        <th> Actions: </th>
        <td>
            <?php
            if ($type == "passenger") {
                echo "<a href='cash_in.php'><button class='btn btn-primary'>Cash In</button></a>";
            } else {
                echo "<a href='cash_in.php'><button class='btn btn-primary'>Cash In</button></a>";
                echo "<a href='cash_out.php'><button class='btn btn-primary'>Cash Out</button></a>";
            }
            ?>
        </td>
    </tr>

        </table>

        <hr>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>

