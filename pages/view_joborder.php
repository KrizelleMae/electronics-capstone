<?php
$page = 'repairs';
include'../includes/connection.php';
include'../includes/sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Order</title>
    <link rel="stylesheet" href="../css/stepprog.css">        
</head>
<body>
<?php

$jobId = $_GET['jobId'];

$sql = "SELECT *
FROM repairs r 
INNER JOIN customer c ON r.CUST_ID = c.CUST_ID
INNER JOIN category cat ON r.CATEGORY_ID = cat.CATEGORY_ID
INNER JOIN employee e ON r.TECHNICIAN_ID = e.EMPLOYEE_ID
WHERE JOB_ORDER_NO = '$jobId'";

$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
while ($val = mysqli_fetch_assoc($res)) {

?>
    <!-- Start of Job Order Step Progress -->
    <div class="container-fluid">
    <a href="repairs.php"> <button class="btn btn-outline-secondary"> << Back to Repairs</button></a>
	    <div class="row justify-content-center">
		    <div class="col-sm text-center  mb-2">
            <div class=" px-0 pt-4 pb-0 mt-1 mb-3">
                <div>
                  <h2><strong>JOB ORDER STATUS OVERVIEW</strong></h2>
                </div>
                <br>
                <div class="stepper-wrapper">
                  <div class="stepper-item completed">
                    <div class="step-counter"><i class="fas fa-ellipsis-h"></i></div>
                    <div class="step-name">In Progress</div>
                  </div>
                  <div class="stepper-item active">
                    <div class="step-counter"><i class='fas fa-tools'></i></i></div>
                    <div class="step-name">Fixing the Problems</div>
                  </div>
                  <div class="stepper-item active">
                    <div class="step-counter"><i class="fas fa-check"></i></div>
                    <div class="step-name">Completed</div>
                  </div>
                </div>
                <br>
                
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="table-info">
                        <th>Order Number</th>
                        <th>Technician</th>
                        <th>ITEM</th> 
                        <th>Serial Number</th>
                        <th>Problems</th>
                        <th>Total Amount</th>
                   
                        <th>Balance</th>

                      </tr>
                    </thead>
                    <tbody>

                    
                      <tr>
                        <td><?php echo $val['JOB_ORDER_NO'];?></td>
                        <td class=""><strong><?php echo $val['FIRST_NAME']. ' '. $val['LAST_NAME']?></strong></td>
                        <td><?php echo $val['REPAIR_NAME'].'('.$val['CNAME'].')';?></td>
                        <td><?php echo $val['SERIAL_NO'];?></td>
                        <td><?php echo $val['PROBLEMS'];?></td>
                        <td>₱ <?php echo $val['PRICE'];?></td>
                
                        <td>₱ <?php echo $val['BALANCE'];?></td>
                      </tr>
                   

                    </tbody>
                  </table>
                </div>
            </div>
            
	        </div>
          
          <div class="container col-sm-11"> 
            <div class="float-right mb-10">
              <a class="btn btn-outline-danger" href="../backend/update_stat  .php?action=cancel&id=<?php echo $_GET['jobId']; ?>">Cancel Job Order</a>
            </div>
            <h5><b>REMARKS (Technician)</b></h5> 

            <hr style="margin-top: 25px; margin-bottom: 40px"/>
            <div>
              <?php

                if(isset($_GET['jobId'])) {
                  $jobId = $_GET['jobId'];
                } else {
                  $jobId = 0;
                }

                $sql = "SELECT * FROM remarks WHERE JOB_ORDER_NO = '$jobId' ORDER BY timestamp DESC";

                $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

                if(mysqli_num_rows($res) !== 0) {
                  while ($row = mysqli_fetch_assoc($res)) {

                    $tstamp=date_create($row['timestamp']);

              ?>
              <div class="mt-5">   
                
             
                <p ><?php echo $row['content']?></p> <p><small>September 24, 2022 12:30 PM</small></p></div> 
                


                <hr/>
                

                <?php
                  }
                    } else {
                ?>
                  
                  <!-- NO DATA SHOWN -->
                  <div>No remarks available.</div>
                  
                <?php
                  }
                  
                ?>
            </div>
          </div>
      </div>

     

      </div>
      <?php 
                    } 
                    ?>
  <!-- End of Job Order Step Progress -->
</body>
</html>