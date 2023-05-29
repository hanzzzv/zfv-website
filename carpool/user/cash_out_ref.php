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
        body {
            background: linear-gradient(to right, #FFA500, #FFD700);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
  </head>
<body style="background: -webkit-linear-gradient(left, #3931af, #00c6ff);">
<?php 
include '../appends/dbconnect.php';
    session_start();
    $id = $_SESSION['auth_id'];


    $sql = "SELECT * FROM tblusers WHERE users_id = '$id'";
    $result = mysqli_query($db_connection, $sql);  
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
                  
                    <?php echo "<a href='landing_page.php?id=$id' class='logo'>" ?>
                        <h1>CARPOOL</h1>
                    </a>      
                    <ul class="nav">
                
                      <li><a href="user-profile.php" class='active'>My Profile</a></li>
                      <li><a href="car_list.php">My Cars</a></li>
                      <?php if($row['id_num'] == null){
                        echo "<li style='background-color:rgba(0,0,0,0.4);border-radius: 25px; '> <a href='car_register_license.php'>Register a Car</a> </li>";
                        }else{
                          echo "<li style='background-color:rgba(0,0,0,0.4);border-radius: 25px; '> <a href='car_register.php'>Register a Car</a> </li>";
                        }?>
                      <li><a href='logout.php'>Log out</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    
                </nav>
            </div>
        </div>
    </div>
  </header>
          <!-- /Breadcrumb -->
    <center>
          <div class="row gutters-sm" style="padding-top:10%;">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  
                    <div class="mt-3">
                    <h3 style="color:#0171f9;">Cash Out</h3><br>
                      <form method="post" action="cash_out_process.php">
                        
                        <input type="number" id="amount" name="amount" placeholder="Enter Amount *" value="" required>
                     
                        <input type="number" id="mobile" name="mobile" placeholder="Mobile Number *" value="" required>
                        <br>
                        <br>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                      </form>
                     <br>
                     <a href="user-profile.php" ><button class="btn btn-primary">back</button></a>
                    
                    </div>
                   
                  </div>
                </div>
              </div>
      </center>
              
</body>
</html>