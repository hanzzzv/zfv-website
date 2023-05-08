<?php

if (isset($_SESSION['auth_id'])) {
    $id = $_SESSION['auth_id'];
    $auth_type = $_SESSION['auth_type'];

    if ($auth_type == 'manager') {
        header('Location: ' . $baseline . '/manager/index.php');
    } else {
        header('Location: ' . $baseline . '/user/user-profile.php');
    }

    exit;
}
