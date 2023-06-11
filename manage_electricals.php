
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
        <!--        <div class="card">-->
        <!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>-->
        <!--        </div>-->

        <?php
        // Database configuration
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'zfventerprise';

        // Create a database connection
        $connection = mysqli_connect($hostname, $username, $password, $database);

        // Check if the connection was successful
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Fetch portfolio items from the database
        $query = "SELECT * FROM electricals";
        $result = mysqli_query($connection, $query);

        // Process the query result
        $portfolioItems = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Add new item
        if (isset($_POST['add_item'])) {
            // Retrieve the form data
            $title5 = $_POST['title5'];
            $category5 = $_POST['category5'];
            $image = $_FILES['image'];

            // Process the image upload
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imagePath = 'uploads5/' . $imageName; // Change 'uploads/' to your desired directory

            // Validate file extension
            $allowedExtensions = array('png', 'jpg', 'jpeg', 'gif');
            $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                echo '<script>alert("Invalid file format. Only PNG, JPG, JPEG, and GIF files are allowed.");</script>';
                echo '<script>window.location.href = "manage_electricals.php";</script>';
                exit();
            }

            move_uploaded_file($imageTmpName, $imagePath);

            // Insert the new item into the database
            $query = "INSERT INTO electricals (title5, category5, image_path5) VALUES ('$title5', '$category5', '$imagePath')";
            mysqli_query($connection, $query);

            // Refresh the page to update the portfolio items
            echo '<script>window.location.href = "manage_electricals.php";</script>';
            exit();
        }

        // Delete item
        if (isset($_POST['delete_item'])) {
            // Retrieve the item ID
            $itemID = $_POST['item_id'];

            // Retrieve the image path for the item
            $query = "SELECT image_path5 FROM electricals WHERE id5 = '$itemID'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $imagePath = $row['image_path5'];

            // Delete the item from the database
            $query = "DELETE FROM electricals WHERE id5 = '$itemID'";
            mysqli_query($connection, $query);

            // Delete the image file if it exists
            if ($imagePath && file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Refresh the page to update the portfolio items
            echo '<script>window.location.href = "manage_electricals.php";</script>';
            exit();
        }

        // Update item
        if (isset($_POST['update_item'])) {
            // Retrieve the item ID and updated data
            $itemID = $_POST['item_id'];
            $updatedTitle = $_POST['title5'];
            $updatedCategory = $_POST['category5'];

            // Retrieve the previous image path for the item
            $query = "SELECT image_path5 FROM electricals WHERE id5 = '$itemID'";
            $result = mysqli_query($connection, $query);
            $previousImagePath = mysqli_fetch_assoc($result)['image_path5'];

            // Process the image upload if a new image is provided
            if ($_FILES['image']['name']) {
                $imageName = $_FILES['image']['name'];
                $imageTmpName = $_FILES['image']['tmp_name'];
                $imagePath = 'uploads5/' . $imageName; // Change 'uploads/' to your desired directory

                // Validate file extension
                $allowedExtensions = array('png', 'jpg', 'jpeg', 'gif');
                $fileExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                if (!in_array($fileExtension, $allowedExtensions)) {
                    echo '<script>alert("Invalid file format. Only PNG, JPG, JPEG, and GIF files are allowed.");</script>';
                    echo '<script>window.location.href = "manage_electricals.php";</script>';
                    exit();
                }

                move_uploaded_file($imageTmpName, $imagePath);

                // Delete the previous image file
                if ($previousImagePath && file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }

                // Update the item with the new image path in the database
                $query = "UPDATE electricals SET title5 = '$updatedTitle', category5 = '$updatedCategory', image_path5 = '$imagePath' WHERE id5 = '$itemID'";
            } else {
                // Update the item without changing the image path
                $query = "UPDATE electricals SET title5 = '$updatedTitle', category5 = '$updatedCategory' WHERE id5 = '$itemID'";
            }

            mysqli_query($connection, $query);

            // Refresh the page to update the portfolio items
            echo '<script>window.location.href = "manage_electricals.php";</script>';
            exit();
        }
        ?>

        <div class="container mt-5">
            <h2>Manage Electricals </h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title5">Title:</label>
                    <input type="text" class="form-control" name="title5" required>
                </div>
                <div class="form-group">
                    <label for="category5">Category:</label>
                    <select class="form-control" name="category5">
                        <option value="all" selected>All</option>
                        <option value="Top Selling">Top selling</option>
                        <option value="budget friendly">Budget Friendly</option>
                        <option value="New Arrival">New Arrivals</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add_item">Add Item</button>
            </form>

            <hr>

            <h2>Manage Portfolio Items</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($portfolioItems as $item): ?>
                    <tr>
                        <td><img src="<?php echo $item['image_path5']; ?>" alt="" width="100"></td>
                        <td><?php echo $item['title5']; ?></td>
                        <td><?php echo $item['category5']; ?></td>
                        <td>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="item_id" value="<?php echo $item['id5']; ?>">
                                <button type="submit" class="btn btn-danger" name="delete_item">Delete</button>
                            </form>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal<?php echo $item['id5']; ?>">Update</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Update modal -->
            <?php foreach ($portfolioItems as $item): ?>
                <div class="modal fade" id="updateModal<?php echo $item['id5']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel<?php echo $item['id5']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel<?php echo $item['id5']; ?>">Update Portfolio Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="item_id" value="<?php echo $item['id5']; ?>">
                                    <div class="form-group">
                                        <label for="title5">Title:</label>
                                        <input type="text" class="form-control" name="title5" value="<?php echo $item['title5']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="category5">Category:</label>
                                        <select class="form-control" name="category5" value="<?php echo $item['category5']; ?> " required>
                                            <option value="all" selected>All</option>
                                            <option value="Top Selling">Top selling</option>
                                            <option value="Budget Friendly">Budget Friendly</option>
                                            <option value="New Arrivals">New Arrivals</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control-file" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update_item">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
    <!--    main container end-->
</div>
<!--wrapper end-->

<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-btn").click(function(){
            $(".wrapper").toggleClass("collapse");
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>



