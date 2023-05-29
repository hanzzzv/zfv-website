<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='profile.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Carpool App</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <style>
        hr{
            height: 1px;
            background-color: black; 
        }
        .one{
            width: 100%;
            height: 600px;
            
            display:block;
        }
        .two{
            width: 100%;
            height: 635px;
          
            display:none;
        }
        .styled-table {
           
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }.styled-table thead tr { 
       
        background-color: #0171f9;
        color: #ffffff;
        text-align: left;
    }.styled-table th,
    .styled-table td {
       
        padding: 12px 15px;
    }.styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }.styled-table tbody tr:nth-of-type(odd) {
        background-color: white;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #0171f9;
    }.styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
    body {
            background: linear-gradient(to right, yellow, orange);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    
        </style>
        <script>
            function layer1(){
                document.getElementById("lyr1").style.display = 'block';
                document.getElementById("lyr2").style.display = 'none';
                document.getElementById("lyr3").style.display = 'none';

            }function layer2(){
                document.getElementById("lyr1").style.display = 'none';
                document.getElementById("lyr2").style.display = 'block';
                document.getElementById("lyr3").style.display = 'none';
            }
            function layer3(){
                document.getElementById("lyr2").style.display = 'none';
                document.getElementById("lyr1").style.display = 'none';
                document.getElementById("lyr3").style.display = 'block';
            }function hide(){
                document.getElementById("lyr1").style.display = 'none';
                document.getElementById("lyr2").style.display = 'none';
                document.getElementById("lyr3").style.display = 'none';
            }

            function Location(){
               loc = window.prompt("Enter Meet up Location: ");
               document.getElementById(loc).innerHTML = loc;

             
            }
        </script>
  </head>
<body style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);">
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
 
    // session_start();
    $id = $_SESSION['auth_id'];


    $sql = "SELECT * FROM tblusers WHERE users_id = '$id'";
    $result = mysqli_query($connection, $sql);  
    $row = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                  
                   <a href='landing_page_admin.php' class='logo'>
                        <h1>CARPOOL</h1>
                    </a>      
                    <ul class="nav">
                      <li><a href='landing_page_admin.php' >Home</a></li>
                      <!-- <li><a href="#">Reports</a></li>
                      <li><a href="transac.php">Transactions</a></li> -->
                      <li><a href='logout.php?id=$id2'>Log out</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    
                </nav>
            </div>
        </div>
    </div>
  
    <hr>
    <center>
    <input type="button" onclick="layer1()" id="btn1" value="All">
 
<br>

    <div class="one" id="lyr1">
    <table class="styled-table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Amount</th>
      <th scope="col">Pro Fee</th>
      <th scope="col">Con Fee</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody >
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
    
            $sql1="SELECT * FROM tbreload WHERE transac_status = 'Approved'";
            $result1 = mysqli_query($connection, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            
            while($row1 = $result1->fetch_assoc()) {
                $id1 = $row1['users_id'];
                $sql="SELECT * FROM tblusers WHERE $id1";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
                $id2 = $row1['reloading_id'];
          echo "<tr><td>" . $row1["reloading_id"]. "</td><td>" . $row["firstname"]." ".$row["lastname"]. "</td><td>" . $row1["type"] . "</td><td>"
          . $row1["amount"]. "</td><td>".$row1["process_fee"]."</td><td>".$row1["conversion_fee"]."</td><td>".$row["balance"]."</td></tr>";
            
        }
            
          ?>
  </tbody>
</table>
    </div>

    
    <center>
</body>
</html>