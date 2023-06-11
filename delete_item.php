<?php

// Database configuration
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'zfventerprise';

// Create a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);


// Update item
if (isset($_POST['update_item'])) {
// Retrieve the item ID and updated data
$itemID = $_POST['item_id'];
$updatedTitle = $_POST['title'];
$updatedCategory = $_POST['category'];

// Update the item in the database
$query = "UPDATE portfolio_items SET title = '$updatedTitle', category = '$updatedCategory' WHERE id = '$itemID'";
mysqli_query($connection, $query);

// Refresh the page to update the portfolio items
header("Location: dashboard.php");
exit();
}

?>
