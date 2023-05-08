<?php

include '../appends/dbconnect.php';
include_once '../appends/authenticate.php';

$users_id = $_SESSION['auth_id'];

// Retrieves Pending Car Approval
$sql = "SELECT * FROM tblcars WHERE drivers_id = '$users_id';";
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
    endif
    ?>

    <hr>

    <h1> Personal Cars </h1>
    <hr>

    <table class="table table-responsive table-striped table-hover" style="width:100%;background: linear-gradient(90deg, #ff8c00, #ffd700);">
        <thead>
        <tr>
            <th scope="col" class="text-center">no.</th>
            <th scope="col" class="text-center">Plate Number</th>
            <th scope="col" class="text-center">Brand</th>
            <th scope="col" class="text-center">Model</th>
            <th scope="col" class="text-center">Color</th>
            <th scope="col" class="text-center">Status</th>
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
                    <td class="text-center"> <?= $row['cars_plate_num'] ?> </td>
                    <td class="text-center"> <?= $row['cars_brand'] ?> </td>
                    <td class="text-center"> <?= $row['cars_model'] ?> </td>
                    <td class="text-center"> <?= $row['cars_color'] ?> </td>

                    <td class="text-center">

                        <?php
                        if ($row['cars_decline'] == 1) :
                            ?>
                            <p class="text-danger align-center"> Declined </p>

                        <?php elseif (is_null($row['cars_stamp_confirm'])) : ?>
                            <p class="text-warning"> In process </p>

                        <?php else : ?>
                            <a class="btn btn-primary" style="background: linear-gradient(90deg, #ff8c00, #ffd700); border-color: #ff8c00;">Route Access</a>


                        <?php endif; ?>
                    </td>
                    <!-- <td> <?= date("M d, Y H:i A", strtotime($row['users_stamp_verification'])) ?> </td> -->

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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>