<?php
    $server = "localhost";
    $server_username = "root";
    $server_password = "";
    $server_database = "villafuertecarpool";
    $baseline = "http://localhost/newprojectzfv/carpool";
    
    // $server = "localhost";
    // $server_username = "u235219407_hanz";
    // $server_password = "HanzCharles@15";
    // $server_database = "u235219407_carpool_hanz";
    // $baseline = "https://carpool.zfv-enterprises.tech";
    
    $connection = mysqli_connect($server, $server_username, $server_password, $server_database);
    session_start();

$id=$_GET['id'];

$sql1="UPDATE tbreload SET status = 'Rejected' WHERE users_id = '$id'";
$result1 = mysqli_query($connection, $sql1);

header("Location:index.php");

?>