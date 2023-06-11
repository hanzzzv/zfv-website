<?php
// Check if the user is logged in, otherwise redirect to the login page
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin.php');
    exit();
}

// Handle logout request
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit();
}
?>