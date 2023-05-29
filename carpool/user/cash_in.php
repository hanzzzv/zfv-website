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
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

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
<body>
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
            <div class="row justify-content-center" style="padding-top: 10%;">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h3 style="color: #0171f9;">Cash In</h3><br>
                                    <form method="post" action="cash_in_process.php">
                                        <input type ="radio" id="fifty" name="amount" value="50">
                                        <label for="fifty">50</label>
                                        <input type ="radio" id="one" name="amount" value="100">
                                        <label for="one">100</label>
                                        <input type ="radio" id="two" name="amount" value="250">
                                        <label for="two">250</label>
                                        <input type ="radio" id="five" name="amount" value="500">
                                        <label for="five">500</label>
                                        <br>
                                        <input type="number" id="ref" name="ref" placeholder="Gcash Ref. Number *" value="" required>
                                        <br>
                                        <input type="number" id="mobile" name="mobile" placeholder="Mobile Number *" value="" required>
                                        <br>
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>
                                    <br>
                                    <a href="user-profile.php"><button class="btn btn-primary">Back</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 30%;">
                <h5>NOTE*</h5>
                <center><h5>Selling of Ticket Currency</h5></center>
                <br>
                <table>
                    <tr>
                        <td>Denominations</td>
                        <td style="width: 30px;"></td>
                        <td>Conversion Rate</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">50 Pesos</td>
                        <td style="width: 30px;text-align: center;">=</td>
                        <td style="text-align: center;">40 Tickets</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">100 Pesos</td>
                        <td style="width: 30px;text-align: center;">=</td>
                        <td style="text-align: center;">80 Tickets</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">250 Pesos</td>
                        <td style="width: 30px;text-align: center;">=</td>
                        <td style="text-align: center;">200 Tickets</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">500 Pesos</td>
                        <td style="width: 30px;text-align: center;">=</td>
                        <td style="text-align: center;">450 Tickets</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
