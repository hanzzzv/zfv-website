

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Sidebar Dashboard Template With Sub Menu</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        body {
            background: #0F8640FF;
        }

        .wrapper .header {
            z-index: 1;
            background: #22242A;
            position: fixed;
            width: calc(100% - 0%);
            height: 60px;
            display: flex;
            top: 0;
        }

        .wrapper .header .header-menu {
            width: calc(100% - 0%);
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .wrapper .header .header-menu .title {
            color: #fff;
            font-size: 20px;
            text-transform: uppercase;
            font-weight: 900;
        }

        .wrapper .header .header-menu .title span {
            color: #4CCEE8;
        }

        .wrapper .header .header-menu .sidebar-btn {
            color: #fff;
            position: absolute;
            margin-left: 240px;
            font-size: 22px;
            font-weight: 900;
            cursor: pointer;
            transition: 0.3s;
            transition-property: color;
        }

        .wrapper .header .header-menu .sidebar-btn:hover {
            color: #4CCEE8;
        }

        .wrapper .header .header-menu ul {
            display: flex;
        }

        .wrapper .header .header-menu ul li a {
            background: #fff;
            color: #000;
            display: block;
            margin: 0 10px;
            font-size: 16px;
            width: 30px;
            height: 30px;
            line-height: 32px;
            text-align: center;
            border-radius: 50%;
            transition: 0.3s;
            transition-property: background, color;
        }

        .wrapper .header .header-menu ul li a:hover {
            background: #4CCEE8;
            color: #fff;
        }

        .wrapper .sidebar {
            z-index: 1;
            background: #2F323A;
            position: fixed;
            top: 60px;
            width: 250px;
            height: calc(100% - 9%);
            transition: 0.3s;
            transition-property: width;
            overflow-y: auto;
        }

        .wrapper .sidebar .sidebar-menu {
            overflow: hidden;
        }

        .wrapper .sidebar .sidebar-menu .profile img {
            margin: 20px 0;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .wrapper .sidebar .sidebar-menu .profile p {
            color: #bbb;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .wrapper .sidebar .sidebar-menu .item {
            width: 250px;
            overflow: hidden;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn {
            display: block;
            color: #fff;
            position: relative;
            padding: 25px 20px;
            transition: 0.3s;
            transition-property: color;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn:hover {
            color: #4CCEE8;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn i {
            margin-right: 20px;
        }

        .wrapper .sidebar .sidebar-menu .item .menu-btn .drop-down {
            float: right;
            font-size: 12px;
            margin-top: 3px;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu {
            background: #3498DB;
            overflow: hidden;
            max-height: 0;
            transition: 0.3s;
            transition-property: background, max-height;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu a {
            display: block;
            position: relative;
            color: #fff;
            white-space: nowrap;
            font-size: 15px;
            padding: 20px;
            transition: 0.3s;
            transition-property: background;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu a:hover {
            background: #55B1F0;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu a:not(last-child) {
            border-bottom: 1px solid #8FC5E9;
        }

        .wrapper .sidebar .sidebar-menu .item .sub-menu i {
            padding-right: 20px;
            font-size: 10px;
        }

        .wrapper .sidebar .sidebar-menu .item:target .sub-menu {
            max-height: 500px;
        }

        .wrapper .main-container {
            width: (100% - 250px);
            margin-top: 60px;
            margin-left: 250px;
            padding: 15px;
            /*background: url(assets/img/adminbg2.gif)no-repeat;*/
            /*background: #0F8640;*/
            background-size: cover;
            height: 100vh;
            transition: 0.3s;
        }

        .wrapper.collapse .sidebar {
            width: 70px;
        }

        .wrapper.collapse .sidebar .profile img,
        .wrapper.collapse .sidebar .profile p,
        .wrapper.collapse .sidebar a span {
            display: none;
        }

        .wrapper.collapse .sidebar .sidebar-menu .item .menu-btn {
            font-size: 23px;
        }

        .wrapper.collapse .sidebar .sidebar-menu .item .sub-menu i {
            font-size: 18px;
            padding-left: 3px;
        }

        .wrapper.collapse .main-container {
            width: calc(100% - 70px);
            margin-left: 70px;
        }

        .wrapper .main-container .card {
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            font-size: 14px;
        }
        /* Add your custom styles here */
        .container {
            margin-top: 50px;
        }
        h2 {
            margin-top: 30px;
        }
        .btn-container {
            margin-bottom: 10px;
        }
        .bold-btn {
            font-weight: bold;
        }
        .italic-btn {
            font-style: italic;
        }


    </style>
</head>
<body>

<!--wrapper start-->
<div class="wrapper">
    <!--header menu start-->
    <div class="header">
        <div class="header-menu">
            <div class="title">ZFV Enterprises</div>
            <div class="sidebar-btn">
                <i class="fas fa-bars"></i>
            </div>
            <ul>
                <li><a href="logout.php""><i class="fas fa-power-off"></i></a></li>
            </ul>
        </div>
    </div>
    <!--header menu end-->
    <!--sidebar start-->
    <div class="sidebar">
        <div class="sidebar-menu">
            <center class="profile">
                <img src="assets/img/logozfv.png" alt="">
                <p>Admin Control</p>
            </center>
            <li class="item">
                <a href="admin-dashboard.php" class="menu-btn">
                    <i class="fas fa-desktop"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="item" id="profile">
                <a href="#profile" class="menu-btn">
                    <i class="fas fa-cog"></i><span>Manage Products <i class="fas fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href="manage_hardwares.php"><i class="fas fa-image"></i><span>Hardware Supplies</span></a>
                    <a href="manage_scaffoldings.php"><i class="fas fa-image"></i><span>Scaffoldings</span></a>
                    <a href="manage_plumbings.php"><i class="fas fa-image"></i><span>Plumbings</span></a>
                    <a href="manage_roofings.php"><i class="fas fa-image"></i><span>Roofings</span></a>
                    <a href="manage_electricals.php"><i class="fas fa-image"></i><span>Electricals</span></a>
                    <a href="manage_cctvs.php"><i class="fas fa-image"></i><span>CCTV's</span></a>
                </div>
            </li>
            <li class="item" id="messages">
                <a href="#messages" class="menu-btn">
                    <i class="fas fa-envelope"></i><span>Manage Service <i class="fas fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href="#"><i class="fas fa-address-card"></i><span>Renting</span></a>
                    <a href="#"><i class="fas fa-address-card"></i><span>Contracts</span></a>
                    <a href="#"><i class="fas fa-address-card"></i><span>Estimation</span></a>
                    <a href="#"><i class="fas fa-address-card"></i><span>Reservation</span></a>
                    <a href="#"><i class="fas fa-address-card"></i><span>Installation</span></a>
                    <a href="#"><i class="fas fa-address-card"></i><span>Deliveries</span></a>

                </div>
            </li>
            <!--            <li class="item" id="settings">-->
            <!--                <a href="#settings" class="menu-btn">-->
            <!--                    <i class="fas fa-cog"></i><span>Settings <i class="fas fa-chevron-down drop-down"></i></span>-->
            <!--                </a>-->
            <!--                <div class="sub-menu">-->
            <!--                    <a href="#"><i class="fas fa-lock"></i><span>Password</span></a>-->
            <!--                    <a href="#"><i class="fas fa-language"></i><span>Language</span></a>-->
            <!--                </div>-->
            <!--            </li>-->
            <li class="item">
                <a href="#" class="menu-btn">
                    <i class="fas fa-info-circle"></i><span>ZFV Technologies</span>
                </a>
            </li>
        </div>
    </div>
    <!--sidebar end-->
    <!--main container start-->
    <div class="main-container">

        <?php
        // Database connection configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zfventerprise";

        // Create a new PDO instance
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        // Get the current service description
        $currentDescription = "";
        try {
            $stmt = $conn->prepare("SELECT description FROM services WHERE id = 1 LIMIT 1");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row && isset($row['description'])) {
                $currentDescription = $row['description'];
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Check if a description already exists
        $descriptionExists = !empty($currentDescription);

        // Add or update service description
        if (isset($_POST['save'])) {
            $description = $_POST['description'];

            try {
                if ($descriptionExists) {
                    // Update existing description
                    $stmt = $conn->prepare("UPDATE services SET description = ? WHERE id = 1");
                    $stmt->execute([$description]);
                    echo "Service description updated successfully.";
                } else {
                    // Add new description
                    $stmt = $conn->prepare("INSERT INTO services (id, description) VALUES (1, ?)");
                    $stmt->execute([$description]);
                    echo "Service description added successfully.";
                    $descriptionExists = true;
                }
                // Update the current description after adding or updating
                $currentDescription = $description;
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>

        <div class="container">
            <h1 class="text-center">Admin Control</h1>

            <!-- Description Customization -->
            <h2>Rentings Description</h2>
            <div class="btn-container">
                <button onclick="addBold()" class="btn btn-primary bold-btn">Bold</button>
                <button onclick="addItalic()" class="btn btn-primary italic-btn">Italic</button>
            </div>
            <form action="" method="POST">
                <div class="form-group">
                    <textarea id="custom-description" class="form-control" rows="4" name="description" required><?php echo $currentDescription; ?></textarea>
                </div>
                <div class="btn-container">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
<!--wrapper end-->

<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-btn").click(function(){
            $(".wrapper").toggleClass("collapse");
        });
    });
</script>
        <script>
            function addBold() {
                var textarea = document.getElementById('custom-description');
                textarea.value += '<b></b>';
            }

            function addItalic() {
                var textarea = document.getElementById('custom-description');
                textarea.value += '<i></i>';
            }
        </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>












