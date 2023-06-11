<?php
    $server = "localhost";
    $server_username = "root";
    $server_password = "";
    $server_database = "villafuertecarpool";
    $baseline = "http://localhost/newprojectzfv/carpool";
    
    $connection = mysqli_connect($server, $server_username, $server_password, $server_database);
    session_start();

    $id = $_GET['id'];

    $_SESSION['id1'] = $id;
    $id1 = $_SESSION['id1'];

    $sql = "SELECT * FROM tbreload WHERE reloading_id = '$id1'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    $id2 = $row['user_id'];

    $sql3 = "SELECT * FROM tblusers WHERE users_id = '$id2'";
    $result3 = mysqli_query($connection, $sql3);
    $row3 = mysqli_fetch_assoc($result3);

    if ($row['type'] == 'Cash In') {
        $new_amount = $row['amount'] - $row['conversion_fee'];

        $sql1 = "UPDATE tbreload SET transac_status = 'Approved' WHERE reloading_id = '$id1'";
        $result1 = mysqli_query($connection, $sql1);

        $sql2 = "UPDATE tblusers SET users_balance = users_balance + $new_amount WHERE users_id = '$id2'";
        $result2 = mysqli_query($connection, $sql2);
    } else if ($row['type'] == 'Cash Out') {
        $new_amount = $row['amount'] + $row['process_fee'];

        $sql2 = "UPDATE tbreload SET gcash_ref_num = '09876544', transac_status = 'Approved' WHERE reloading_id = '$id1'";
        $result2 = mysqli_query($connection, $sql2);

        $sql2 = "UPDATE tblusers SET users_balance = users_balance - $new_amount WHERE users_id = '$id2'";
        $result2 = mysqli_query($connection, $sql2);
    }

    header("Location: index.html");
    exit;
?>
