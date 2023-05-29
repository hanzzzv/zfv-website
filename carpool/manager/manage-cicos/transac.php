<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='profile.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>HCV Carpool App</title>
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
            height: 700px;
            
            display:block;
        }
        .two{
            width: 100%;
            height: 635px;
          
            display:none;
        }.three{
            width: 100%;
            height: 635px;
          
            display:none;
        }.four{
            width: 100%;
            height: 635px;
          
            display:none;
        }.one_div{
            display:none;
        }.two_div{
            display:none;
        }.three_div{
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
       
        /* background-color: #0171f9;
        color: #ffffff; */
        text-align: left;
    }.styled-table th,
    .styled-table td {
       
        padding: 12px 15px;
    }.styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        /* background-color: #f3f3f3; */
    }.styled-table tbody tr:nth-of-type(odd) {
        /* background-color: white; */
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
                document.getElementById("lyr4").style.display = 'none';
                document.getElementById("lyr2_div").style.display = 'none';
                document.getElementById("lyr3_div").style.display = 'none';
                document.getElementById("lyr4_div").style.display = 'none';
            }function layer2(){
                document.getElementById("lyr1").style.display = 'none';
                document.getElementById("lyr2").style.display = 'block';
                document.getElementById("lyr3").style.display = 'none';
                document.getElementById("lyr4").style.display = 'none';
                document.getElementById("lyr2_div").style.display = 'block';
                document.getElementById("lyr3_div").style.display = 'none';
                document.getElementById("lyr4_div").style.display = 'none';
            }
            function layer3(){
                document.getElementById("lyr2").style.display = 'none';
                document.getElementById("lyr1").style.display = 'none';
                document.getElementById("lyr3").style.display = 'block';
                document.getElementById("lyr4").style.display = 'none';
                document.getElementById("lyr2_div").style.display = 'none'; 
                document.getElementById("lyr3_div").style.display = 'block';
                document.getElementById("lyr4_div").style.display = 'none';
            }function layer4(){
                document.getElementById("lyr1").style.display = 'none';
                document.getElementById("lyr2").style.display = 'none';
                document.getElementById("lyr3").style.display = 'none';
                document.getElementById("lyr4").style.display = 'block';
                document.getElementById("lyr2_div").style.display = 'none';
                document.getElementById("lyr3_div").style.display = 'none';
                document.getElementById("lyr4_div").style.display = 'block';
            }

            function Location(){
               loc = window.prompt("Enter Meet up Location: ");
               document.getElementById(loc).innerHTML = loc;

             
            }
        </script>
  </head>
<body style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);">

<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                  
                   <a href='landing_page_admin.php' class='logo'>
                        <h1>HCV CARPOOL</h1>
                    </a>      
                    <ul class="nav">
                      <!-- <li><a href='landing_page_admin.php' >Home</a></li>
                      <li><a href="reports.php">Reports</a></li>
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
    <input type="button" onclick="layer2()" id="btn1" value="Casn In">
    <input type="button" onclick="layer3()" id="btn1" value="Cash Out">
    <input type="button" onclick="layer4()" id="btn1" value="Balance">
<br>

    <div class="one" id="lyr1" style="height: 700px; overflow: auto;">
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
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody >
    <?php
     $server = "localhost";
     $server_username = "root";
     $server_password = "";
     $server_database = "villafuertecarpool";
     $baseline = "http://localhost/newprojectzfv/carpool";
    
     
     $connection = mysqli_connect($server, $server_username, $server_password, $server_database);
            $sql1="SELECT * FROM tbreload WHERE transac_status = 'Pending'";
            $result1 = mysqli_query($connection, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            
           
            while($row1 = $result1->fetch_assoc()) {
              $id1 = $row1['user_id'];
              $sql="SELECT * FROM tblusers WHERE users_id = '$id1'";
              $result = mysqli_query($connection, $sql);
              $row = mysqli_fetch_assoc($result);

              $id2 = $row1['reloading_id'];
        echo "<tr><td>" . $row["users_id"]. "</td><td>" . $row["users_firstname"]." ".$row["users_lastname"]. "</td><td>" . $row1["type"] . "</td><td>"
        . $row1["amount"]. "</td><td>".$row1["process_fee"]."</td><td>".$row1["conversion_fee"]."</td><td>".$row["users_balance"]."</td><td><a href='transac_approve.php?id=$id2'><input type='button' value='Approve'></a><a href='transac_reject.php?id=$id2'><input type='button' value='Reject'></a></tr>";
          
      }
            
          ?>
  </tbody>
</table>
    </div>

    <div class="two" id="lyr2" style="height: 700px; overflow: auto;">
    <table class="styled-table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
   
      <th scope="col">Amount</th>

      <th scope="col">Con Fee</th>

    </tr>
  </thead>
  <tbody >
    <?php
       $server = "localhost";
       $server_username = "root";
       $server_password = "";
       $server_database = "villafuertecarpool";
       $baseline = "http://localhost/newprojectzfv/carpool";
      
       
       $connection = mysqli_connect($server, $server_username, $server_password, $server_database);
            $sql1="SELECT * FROM tbreload WHERE transac_status = 'Approved' AND type = 'Cash In'";
            $result1 = mysqli_query($connection, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            
           
           
            while($row1 = $result1->fetch_assoc()) {
                $id1 = $row1['user_id'];
                $sql="SELECT * FROM tblusers WHERE users_id = '$id1'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);

                $id2 = $row1['reloading_id'];
          echo "<tr><td>" . $row1["user_id"]. "</td><td>" . $row["users_firstname"]." ".$row["users_lastname"]. "</td><td>" . $row1["amount"] . "</td><td>"
          . $row1["conversion_fee"]. "</td></tr>";
            
        }
            
          ?>
  </tbody>
</table>
    </div>

    <div class="three" id="lyr3" style="height: 700px; overflow: auto;">
    <table class="styled-table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Pro Fee</th>
     
   
    </tr>
  </thead>
  <tbody >
    <?php
        $server = "localhost";
        $server_username = "root";
        $server_password = "";
        $server_database = "villafuertecarpool";
        $baseline = "http://localhost/newprojectzfv/carpool";
       
        
        $connection = mysqli_connect($server, $server_username, $server_password, $server_database);
            $sql1="SELECT * FROM tbreload WHERE transac_status = 'Approved' AND type = 'Cash Out'";
            $result1 = mysqli_query($connection, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            
           
           
            while($row1 = $result1->fetch_assoc()) {
                $id1 = $row1['users_id'];
                $sql="SELECT * FROM tblusers WHERE users_id = '$id1'";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_assoc($result);

                $id2 = $row1['reloading_id'];
          echo "<tr><td>" . $row1["users_id"]. "</td><td>" . $row["users_firstname"]." ".$row["users_lastname"]. "</td><td>"
          . $row1["amount"]. "</td><td>".$row1["process_fee"]."</td></tr>";
            
        }
            
          ?>
  </tbody>
</table>
    </div>

    <div class="four" id="lyr4" style="height: 700px; overflow: auto;">
    <table class="styled-table" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
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
      
       
       $connection = mysqli_connect($server, $server_username, $server_password, $server_database);
           
    $sql="SELECT * FROM tblusers";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
           
           
            while($row = $result->fetch_assoc()) {

          echo "<tr><td>" . $row["users_id"]. "</td><td>" . $row["users_firstname"]." ".$row["users_lastname"]. "</td><td>".$row["users_balance"]."</td></tr>";
            
        }
            
          ?>
  </tbody>
</table>
    </div>

    <?php
        $sql = "SELECT SUM(amount) AS total_amount FROM tbreload WHERE type = 'Cash In' AND transac_status = 'Approved'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_amount = $row['total_amount'];

        $sql2 = "SELECT SUM(amount) AS total_amount FROM tbreload WHERE type = 'Cash Out' AND transac_status = 'Approved'";
        $result2 = mysqli_query($connection, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $total_amount2 = $row2['total_amount'];

        $sql3 = "SELECT SUM(conversion_fee) AS total_con FROM tbreload WHERE transac_status = 'Approved'";
        $result3 = mysqli_query($connection, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $total_con = $row3['total_con'];

        $sql4 = "SELECT SUM(process_fee) AS total_pro FROM tbreload WHERE transac_status = 'Approved'";
        $result4 = mysqli_query($connection, $sql4);
        $row4 = mysqli_fetch_assoc($result4);
        $total_pro = $row4['total_pro'];

        $sql5 = "SELECT SUM(users_balance) AS total_balance FROM tblusers";
        $result5 = mysqli_query($connection, $sql5);
        $row5 = mysqli_fetch_assoc($result5);
        $total_balance = $row5['total_balance'];
    ?>
    <div class="one_div" id="lyr2_div">
       <table class="styled-table">
        <tr>
            <td scope="col">Total</td>
            <td scope="col">:</td>
            <td scope="col"><?php echo $total_amount; ?></td>
            <td scope="col"><?php echo $total_con; ?></td>
    </tr>
    </table>
    </div>
    <div class="one_div" id="lyr3_div">
       <table class="styled-table">
        <tr>
            <td scope="col">Total</td>
            <td scope="col">:</td>
            <td scope="col"><?php echo $total_amount2; ?></td>
            <td scope="col"><?php echo $total_pro; ?></td>
    </tr>
    </table>
    </div>
    <div class="one_div" id="lyr4_div">
       <table class="styled-table">
        <tr>
            <td scope="col">Total</td>
            <td scope="col">:</td>
            <td scope="col" style="text-align: right;"><?php echo $total_balance; ?></td>
    </tr>
    </table>
    </div>
    <center>
</body>
</html>