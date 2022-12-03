<?php

// session_start();
include '../includes/connection.php';
include './send_email.php';

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

    $stmt = $db->prepare("INSERT INTO `repairs` (`JOB_ORDER_NO`, `TECHNICIAN_ID`, `CUST_ID`, `MODEL_NAME`, `PROBLEMS`, `PRICE`, `DATE_TO_FIX`, `SERIAL_NO`, `REPAIR_NAME`, `CATEGORY_ID`, `BALANCE`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('siissdsssid', $jobOrder, $technician, $cust_id, $repair_name,  $problem, $price, $date, $serial, $repair_name, $category, $price);
    
    if ($stmt->execute()) {

        
        $getEmail  = $db->prepare("SELECT * FROM customer WHERE CUST_ID = ?");
        $getEmail->bind_param('i', $cust_id);
        

        if($getEmail->execute()){
            $result = $getEmail->get_result()->fetch_assoc();

            $new=date_create($date);
            $newDate = date_format($new,"F j, Y");
             //Email bsody
          $mail->Body = "<h4>Job Order Update</h4>
         
          <p>The job order you requested is successfully added.</p><br/>

          <b>JOB ORDER DETAILS:</b> 
          <p>Job Order Number: $jobOrder</p>
          <p>Item: $repair_name</p>
          <p>Date to claim: $newDate </p><br>
          <p>NOTE: If the item was not claimed 15 days after the due date for claim, an additional 50 pesos will be charged.</p>";



            //Add recipient
            $mail->addAddress($result['EMAIL']);

            //Address to which recipient will reply
            $mail->addReplyTo("rsinvenory2022zc@gmail.com", "Reply");

            //Provide file path and name of the attachments
            // $mail->addAttachment("file.txt", "File.txt");        
            // $mail->addAttachment("images/profile.png"); //Filename is optional

            if(!$mail->send()){
                echo "Invalid email";
                echo $mail->SMTPDebug = 4;
            } else {
                header("location: ../pages/repairs.php");
            }
        }

         
          
        //   else {
        //        $sql = mysqli_query($con, "insert into otp (otp, user_id) values ($generate_otp, $user_id)");
        //          if($sql){
        //             $_SESSION['temp_id'] = $user_id;
        //             header("location: ../otp.php");
        //        }
        //   }

        // header('location: ./repairs.php');
    } else {
        echo  $stmt->error;
    }
}

?>