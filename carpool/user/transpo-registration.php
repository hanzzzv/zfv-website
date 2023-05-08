<?php

include '../appends/dbconnect.php';
include_once '../appends/authenticate.php';

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
                    <a class="nav-link" href="user-profile.php">Home</a>
                </li>


            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mvX8a9lGmdKsR7ZpfVSs+GO8xHkT3q04cV7bqv2vX8F7t3E3t4zPjKw2tHRBLx/Z" crossorigin="anonymous"></script>

<div class="container my-3 col-lg-6 bg-gradient-warning text-white">

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

    <!-- Car Registration -->
    <form action="../settings/car-registration.php" method="post">

        <h1 class="mb-3"> Transportation Registration </h1>
        <hr>

        <h4> LTO Information </h4>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="receipt_num" class="form-label"> Receipt No. <span class="text-danger">*</span></label>
                <input type="text" placeholder="999-999-999"name="receipt_num" id="receipt_num" class="form-control" required>
            </div>
            <div class="mb-3 col-6">
                <label for="tin_num" class="form-label">TIN<span class="text-danger">*</span></label>
                <input type="text" placeholder="999-999-999" minlength="9" maxlength="9" name="tin_num" id="tin_num" class="form-control" required>
            </div>
        </div>

        <br>
        <h4> Basic Car Information </h4>

        <div class="row">
            <div class="mb-3 col-4">
                <label for="plate_num" class="form-label">Plate Number: <span class="text-danger"></span></label>
                <input type="text" name="plate_num" id="plate_num" class="form-control" required placeholder="YYY-9999" minlength="7" maxlength="7">
            </div>
            <div class="mb-3 col-4">
                <label for="model" class="form-label">Model: <span class="text-danger"></span></label>
                <input type="text" name="model" id="model" placeholder="Vios" class="form-control" required>
            </div>
            <div class="mb-3 col-4">
                <label for="color" class="form-label">Color: <span class="text-danger"></span></label>
                <input type="text" name="color" id="color" placeholder="Blue" class="form-control" required>
            </div>
        </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="brand" class="form-label">Brand: <span class="text-danger"></span></label>
                    <input type="text" name="brand" id="brand" placeholder="Toyota"class="form-control" required>
                </div>



                <div class="mb-3 col-4">
                    <label for="engine" class="form-label">Engine No: <span class="text-danger"></span></label>
                    <input type="text" name="engine" id="engine" placeholder="888-888" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="chassis" class="form-label">Chassis No: <span class="text-danger"></span></label>
                    <input type="text" placeholder="999-999-999" minlength="9" maxlength="9" name="chassis" id="chassis" class="form-control" required>
                </div>

                <div class="mb-3 col-4">
                    <label for="cars_year" class="form-label">Year: <span class="text-danger"></span></label>
                    <input type="text" minlength="4" maxlength="4" placeholder="2222" name="cars_year" id="cars_year" class="form-control" required>
                </div>


            </div>

            <div class="row">

                <div class="mb-3 col-4">
                    <label for="cars_renewal" class="form-label">COR Renewal Date <span class="text-danger"></span></label>
                    <input type="date" name="cars_renewal" id="cars_renewal" class="form-control" required>
                </div>
            </div>

        <div class="col">
            <input type="submit" name="register" value="Register" class="btn btn-primary" style="background: linear-gradient(to right, #ffbb33, #ff8800); border: none; width: 100%; height: 50px; border-radius: 30px; font-size: 20px; color: #fff; cursor: pointer; transition: all 0.3s ease-in-out;">
        </div>



    </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>