<!-- JOB ORDER PAYMENT PROCESSING -->
<?php

    session_start();
    include'../includes/connection.php';
  
    $jobOrderId = $_POST['jobOrderId'];
    $discount = $_POST['discount'];
    $total = $_POST['total'];
    $cash = $_POST['cash'];
    $cashierId = $_SESSION['EMPLOYEE_ID'];

    // QUERY
    $sql = "SELECT CUST_ID, PRICE, BALANCE FROM repairs r WHERE JOB_ORDER_NO = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $jobOrderId);
    
    if($stmt->execute()) {
        $result = $stmt->get_result()->fetch_assoc();
        // echo json_encode($result['CUST_ID']);
        $custId = $result['CUST_ID'];
        $subTotal = $result['PRICE'];
        $balance = $result['BALANCE'];

        // INSERT TO TBL REPAIRS_PAYMENT
        $sql = "INSERT INTO repairs_payment (CASHIER_ID, CUST_ID, JOB_ORDER_NO, SUB_TOTAL, DISCOUNT, TOTAL, CASH) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insert = $db->prepare($sql);
        $insert->bind_param('iisdddd', $cashierId, $custId, $jobOrderId, $subTotal, $discount, $total, $cash);

        if($insert->execute()) {
            $newBal = $total - $balance;

            $updateBal = $db->prepare("UPDATE repairs SET BALANCE = ? WHERE JOB_ORDER_NO = ? ");
            $updateBal->bind_param('ds', $newBal, $jobOrderId);

            if($updateBal->execute()) {
                header("location: ../pages/job_order_payment.php?cust_id=$custId");
            } else {
                echo $updateBal->error;
            }

        } else {
            echo $stmt->error;
        }

        
    }


?>