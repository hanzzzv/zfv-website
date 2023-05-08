<?php

include 'appends/dbconnect.php';
include 'appends/prevail.php';

if (!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $bg = $_SESSION['bg'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCV Carpool App</title>
    <link rel="icon" type="image/png" href="images/mainlogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-image: url("images/carpoolbgmain.png");
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
                    <a class="nav-link" href="register.html">Register</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mvX8a9lGmdKsR7ZpfVSs+GO8xHkT3q04cV7bqv2vX8F7t3E3t4zPjKw2tHRBLx/Z" crossorigin="anonymous"></script>
<div class="container my-3 col-lg-5 p-5" style="background: linear-gradient(45deg, #FEE140, #FA709A);">
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

    <h1 class="text-center mb-4">HCV Carpool Application</h1>

    <form method="POST" action="settings/sign-in.php">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input name="email" type="email" required class="form-control" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input minlength="5" required name="password" type="password" class="form-control" id="inputPassword">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg btn-block bg-gradient fw-bold">Log In</button>
            <a href="register.html" class="btn btn-primary btn-lg btn-block bg-gradient fw-bold">Sign Up</a>
        </div>
    </form>
</div>

    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>