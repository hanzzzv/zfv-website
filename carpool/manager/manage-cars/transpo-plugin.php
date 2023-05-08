<?php

include '../../appends/dbconnect.php';
include_once '../../appends/authenticate.php';

// Retrieves Pending Car Approval
$sql = "SELECT * FROM tblcars 
INNER JOIN tblusers
ON tblcars.drivers_id = tblusers.users_id
WHERE cars_stamp_confirm IS NULL AND cars_decline = 0;
";
$result = $connection->query($sql);

if (!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $bg = $_SESSION['bg'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCV Carpool App</title>
    <link rel="icon" type="image/png" href="mainlogo.png">


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
        /*FOR BUTTONS*/
        .bg-gradient {
            background: linear-gradient(to bottom right, #FF6B6B, #FFE66D);
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
                    <a class="nav-link" href="../manage-ids/identification-plugin.php">Drivers ID Review</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../manage-users/plugin-users.php">Verified Users Reports</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mvX8a9lGmdKsR7ZpfVSs+GO8xHkT3q04cV7bqv2vX8F7t3E3t4zPjKw2tHRBLx/Z" crossorigin="anonymous"></script>

<div class="container my-3">
    <?php
    if (!empty($_SESSION['message'])) :
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
    <h1> Vehicle Review </h1>
    <hr>

    <table class="table table-bordered table-striped table-gradient">
        <thead>
        <tr>
            <th scope="col" class="text-center">no.</th>
            <th scope="col" class="text-center">Email Address</th>
            <th scope="col" class="text-center">User Full Name</th>
            <th scope="col" class="text-center">Plate Number</th>
            <th scope="col" class="text-center">Brand</th>
            <th scope="col" class="text-center">Model</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php
        if ($result->num_rows > 0) :
            $x = 1;
            while ($row = $result->fetch_assoc()) :
                ?>
                <tr>
                    <th class="text-center"> <?= $x ?> </th>

                    <td class="text-center"> <?= $row['users_email'] ?> </td>
                    <td class="text-center"> <?= $row['users_firstname'] . " ".$row['users_middlename'] . " " . $row['users_lastname'] ?> </td>
                    <td class="text-center"> <?= $row['cars_plate_num'] ?> </td>
                    <td class="text-center"> <?= $row['cars_brand'] ?> </td>
                    <td class="text-center"> <?= $row['cars_model'] ?> </td>

                    <td class="text-center">
                        <a href="transpo-success.php?cars_id=<?= $row['cars_id'] ?>&users_id=<?= $row['users_id'] ?>"
                           class="btn btn-primary btn-gradient"> Approve </a>
                        <a href="transpo-fail.php?cars_id=<?= $row['cars_id'] ?>&users_id=<?= $row['users_id'] ?>" class="btn btn-primary btn-gradient"> Decline </a>

                    </td>
                </tr>
                <?php
                $x++;
            endwhile;
        endif;
        ?>
        </tbody>
    </table>
    <hr>
</div>

<style>
    .table-gradient {
        background: linear-gradient(to bottom right, #febb2d, #fbae17);
    }

    /*.btn-gradient {*/
    /*    background: linear-gradient(to bottom right, #febb2d, #fbae17);*/
    /*    border: none;*/
    /*}*/

    /*.btn-gradient:hover {*/
    /*    background: linear-gradient(to bottom right, #fbae17, #febb2d);*/
    /*    border: none;*/
    /*}*/
</style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>