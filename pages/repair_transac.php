<?php

include'../includes/connection.php';

$action = $_GET['action'];

if ($action == 'add') {

    $jobOrder = $_POST['orderno'];
    $cust_id = $_POST['customer'];
    $repair_name = $_POST['repairname'];
    $technician = $_POST['technician'];
    $serial = $_POST['serialno'];
    $problem = $_POST['description'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $category = $_POST['category'];

    $stmt = $db->prepare("INSERT INTO `repairs` (`JOB_ORDER_NO`, `TECHNICIAN_ID`, `CUST_ID`, `MODEL_NAME`, `PROBLEMS`, `PRICE`, `DATE_TO_FIX`, `SERIAL_NO`, `REPAIR_NAME`, `CATEGORY_ID`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('siissdsssi', $jobOrder, $technician, $cust_id, $repair_name,  $problem, $price, $date, $serial, $repair_name, $category);
    
    if ($stmt->execute()) {
        header('location: ./repairs.php');
    } else {
        echo 'Failed';
    }
}

?>