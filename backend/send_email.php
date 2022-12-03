<?php 
     session_start();
     include '../includes/connection.php';
     require '../phpmailer/PHPMailer.php';
     require '../phpmailer/SMTP.php';
     require '../phpmailer/Exception.php';

     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
	 use PHPMailer\PHPMailer\Exception;

          //Create instance of PHPMailer
	     $mail = new PHPMailer();
         
          //Set mailer to use smtp
          $mail->isSMTP();
        
          //$mail->SMTPDebug = 3;

          //Define smtp host
          $mail->Host = "smtp.gmail.com";
    
          //Enable smtp authentication
          $mail->SMTPAuth = true;
     
          //Set smtp encryption type (ssl/tls)
          $mail->SMTPSecure = "tls";
    
          //Port to connect smtp
          $mail->Port = "587";


          //Set email     
          $mail->Username = 'rsinventory2022zc@gmail.com';
          
          //Set gmail password
          $mail->Password = 'hkiwxsndsegljmby';
    
          $mail->setFrom('rsinventory2022zc@gmail.com');
          $mail->FromName = "Electronics Parts Sales And Inventory";

          //Enable HTML              
          $mail->isHTML(true);
            
          $mail->Subject = "UPDATE | Electronics Parts Sales And Inventory";
       

?>