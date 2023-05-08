<?php

include '../appends/dbconnect.php';

$users_id = $_SESSION['auth_id'];

// Selects the Users & Passengers
$sql = "SELECT * FROM tblusers INNER JOIN tblpassengers ON tblusers.users_id = tblpassengers.users_id WHERE tblusers.users_id='$users_id'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

if (is_null($row['passengerID_stamp_confirmation'])) {
    $passengerID_confirmed = 'false';
} else {
    $passengerID_confirmed = 'true';
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
    /* Remove Arrows on Number Textfield */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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


    <div class="container my-3 col-lg-5" style="background: linear-gradient(to bottom right, #47ffff, #47ffa3); border-radius: 20px; padding: 30px; color: #2c4c50;">

        <form action="user-update-process.php" method="post">

            <h1 class="mb-3"> Profile Information Update </h1>
            <hr>
            <div class="row">
                <h4> Identification </h4>
                <div class="mb-3 col-6">
                    <label for="id_type" class="form-label">Identification Type:</label>
                    <select class="form-select" name="id_type" id="id_type" aria-label="Default select example">
                        <option value="" <?= $row['passengerID_type'] == '' ? 'selected' : '' ?> <?= $passengerID_confirmed == 'true' ? 'disabled' : '' ?>>-- Select -- </option>
                        <option value="Driver's License" <?= $row['passengerID_type'] == 'Driver\'s License' ? 'selected' : '' ?> <?= $passengerID_confirmed == 'true' ? 'disabled' : '' ?>>Drivers License</option>
                        <option value="Philippine National ID" <?= $row['passengerID_type'] == 'Philippine National ID' ? 'selected' : '' ?> <?= $passengerID_confirmed == 'true' ? 'disabled' : '' ?>>Philippine National ID</option>
                        <option value="Government Voters ID" <?= $row['passengerID_type'] == 'Government Voters ID' ? 'selected' : '' ?> <?= $passengerID_confirmed == 'true' ? 'disabled' : '' ?>>Government Voters ID</option>
                        <option value="Passport ID" <?= $row['passengerID_type'] == 'Passport ID' ? 'selected' : '' ?> <?= $passengerID_confirmed == 'true' ? 'disabled' : '' ?>>Passport ID</option>
                        <option value="Student ID" <?= $row['passengerID_type'] == 'Student ID' ? 'selected' : '' ?> <?= $passengerID_confirmed == 'true' ? 'disabled' : '' ?>>Student ID</option>

                    </select>
                </div>

                <div class="mb-3 col-6">
                    <label for="id_number" class="form-label">Identification Number:</label>
                    <input type="text" name="id_number" id="id_number" class="form-control" value="<?= $row['passengerID_number'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : ($row['passengerID_type'] == '' ? 'readonly' : '') ?>>
                </div>
            </div>
            <hr>
            <div class="row">
                <h4> Personal Details </h4>
                <div class="mb-3 col-5">
                    <label for="lastname" class="form-label">Last Name <span class="text-danger"></span></label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required value="<?= $row['users_lastname'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                </div>
                <div class="mb-3 col-5">
                    <label for="firstname" class="form-label">First Name <span class="text-danger"></span></label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required value="<?= $row['users_firstname'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                </div>
                <div class="mb-3 col-5">
                    <label for="middlename" class="form-label">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" class="form-control" value="<?= $row['users_middlename'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                </div>
                <div class="mb-3 col-5">
                    <label for="contact_num" class="form-label">Contact Number</label>
                    <input type="text" minlength="11" maxlength="11" name="contact_num" id="contact_num" class="form-control" required value="<?= $row['users_contact_num'] ?>" >
                </div>

            </div>

            <div class="row">
                <div class="mb-3 col-8">
                    <label for="street" class="form-label">Street: <span class="text-danger"></span></label>
                    <input type="text" name="street" id="street" class="form-control" required value="<?= $row['users_street'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                </div>

                <div class="mb-3 col-8">
                    <label for="barangay" class="form-label">Barangay: <span class="text-danger"></span></label>
                    <input type="text" name="barangay" id="barangay" class="form-control" required value="<?= $row['users_barangay'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <div class="mb-3 col-8">
                        <label for="city" class="form-label">Municipality/City: <span class="text-danger"></span></label>
                        <input type="text" name="city" id="city" class="form-control" required value="<?= $row['users_city'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                    </div>

                <div class="mb-3 col-8">
                    <label for="province" class="form-label">Province: <span class="text-danger"></span></label>
                    <input type="text" name="province" id="province" class="form-control" required value="<?= $row['users_province'] ?>" <?= $passengerID_confirmed == 'true' ? 'readonly' : '' ?>>
                </div>


            </div>

            <hr>



            <div class="row">
                <div class="col">
                    <input type="submit" name="register" value="Update" class="btn btn-primary btn-lg w-100" style="background: linear-gradient(to bottom right, #ff6a00, #dbc534); border-radius: 20px; padding: 10px; color: white;">
                </div>

            </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous">


    </script>

    <script>
        $('select').on('change', function() {
            if (this.value != '') {
                $("#id_number").prop('readonly', false);
                $("#id_number").prop('required', true);
            } else {
                $("#id_number").prop('readonly', true);
                $("#id_number").prop('required', false);
                $("#id_number").val('');
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>