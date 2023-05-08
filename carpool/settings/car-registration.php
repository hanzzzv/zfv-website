
<?php

include '../appends/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_SESSION['auth_id'];

    $id = $_SESSION['auth_id'];

    $plate_num = $_POST['plate_num'];
//    $field_office = $_POST['field_office'];
//    $office_code = $_POST['office_code'];
    $receipt_num = $_POST['receipt_num'];
    $tin_num = $_POST['tin_num'];

    $model = $_POST['model'];
    $color = $_POST['color'];
    
    $brand = $_POST['brand'];
//    $classification = $_POST['classification'];
    $engine = $_POST['engine'];

    $chassis = $_POST['chassis'];
    $cars_year = $_POST['cars_year'];
//    $car_type = $_POST['car_type'];

//    $car_category = $_POST['car_category'];
//    $car_fuel = $_POST['car_fuel'];
    $cars_renewal = $_POST['cars_renewal'];

    // Checks the Plate
    $sql = "SELECT * FROM tblcars WHERE cars_plate_num='$plate_num'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Plate Number exist!";
        header('Location: ' . $baseline .'/user/car-registration.php');
        return;
    }

    // Checks the Receipt No. 
    $sql = "SELECT * FROM tblcars WHERE cars_receipt_num='$receipt_num'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Receipt Number exist!";
        header('Location: ' . $baseline .'/user/car-registration.php');
        return;
    }

    // Checks the Engine No. 
    $sql = "SELECT * FROM tblcars WHERE cars_engine_num='$engine'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Engine Number exist!";
        header('Location: ' . $baseline .'/user/car-registration.php');
        return;
    }

    // Checks the Chassis
    $sql = "SELECT * FROM tblcars WHERE cars_chassis_num='$chassis'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['bg'] =  "danger";
        $_SESSION['message'] = "Chassis Number exist!";
        header('Location: ' . $baseline .'/user/car-registration.php');
        return;
    }


    // Prepared Statement & Binding (Avoid SQL Injections)
    $stmnt = $connection->prepare("INSERT INTO tblcars (drivers_id, cars_receipt_num, cars_tin_num, cars_plate_num, cars_model, cars_color, cars_brand,cars_engine_num, cars_chassis_num, cars_year,cars_cor_renew_date)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmnt->bind_param('sssssssssss', $id,  $receipt_num, $tin_num, $plate_num, $model, $color, $brand, $engine, $chassis, $cars_year,
    $cars_renewal);
    $stmnt->execute();
    $stmnt->close();
    $connection->close();

    $_SESSION['bg'] =  "warning";
    $_SESSION['message'] = "Transportation is now in process, Please Wait";
    header('Location: ' . $baseline .'/user/transpo-list.php');
   
}
