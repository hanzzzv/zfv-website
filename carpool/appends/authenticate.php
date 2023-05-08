<?php

if (isset($_SESSION['auth_id'])) {
    $id = $_SESSION['auth_id'];
} else {
    $_SESSION['bg'] =  "warning";
    $_SESSION['message'] = "You Should login first!";
    header('Location: ' . $baseline . '/sign-in.php');
    exit;
}
