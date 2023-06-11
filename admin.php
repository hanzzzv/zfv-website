<?php
// Database connection details
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'zfventerprise';

// Establishing a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Handling the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the username and password match in the database
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Successful login, redirect to a dashboard or home page
        header('Location: admin-dashboard.php');
        exit();
    } else {
        // Invalid login, display an error message
        $error = 'Invalid email or password';
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ZFV Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(to bottom right, #00ccff, #cc99ff);
        }

        .container {
            background: linear-gradient(to bottom, #63c23e, #00a94f);
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 100px;
        }

        .container h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .container .alert {
            margin-bottom: 20px;
        }

        .container form {
            margin-bottom: 0;
        }

        .container .form-group label {
            color: #fff;
        }

        .container .form-control {
            border-color: #fff;
        }

        .container .btn-primary {
            background-color: #63c23e;
            border-color: #63c23e;
        }

        .container .btn-primary:hover {
            background-color: #00a94f;
            border-color: #00a94f;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>ZFV Login Form</h2>
    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <div class="form-group">
            <label for="email">Username</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
