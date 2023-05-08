<?php

include '../appends/dbconnect.php';

    unset($_SESSION['auth_id']);
//    $_SESSION['bg'] =  "success";
//    $_SESSION['message'] = "Account Logout Performed";
    header('Location: ' . $baseline .'/sign-in.php');

    
