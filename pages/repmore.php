<?php
include'../includes/connection.php';
include'../includes/toptechnician.php';
  
?>
     
<div class="container-fluid" style="margin-top: 100px">

<div class="d-flex bd-highlight">
  <!-- FIRST CONTAINER -->
  <div class="col-4 flex-fill bd-highlight">
    <div class="list-group">

    <?php
      $techId =  $_SESSION['EMPLOYEE_ID'];     

      $sql = "SELECT *, CONCAT(c.FIRST_NAME, ' ', c.LAST_NAME) as CUSTOMER_NAME
      FROM repairs r  
      INNER JOIN customer c ON r.CUST_ID = c.CUST_ID
      INNER JOIN category cat ON r.CATEGORY_ID = cat.CATEGORY_ID
      INNER JOIN employee e ON r.TECHNICIAN_ID = e.EMPLOYEE_ID
      WHERE r.TECHNICIAN_ID = $techId ORDER BY r.tstamp DESC";

      $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
      while ($row = mysqli_fetch_assoc($res)) {

        $date=date_create($row['DATE_TO_FIX']);
        $tstamp=date_create($row['tstamp']);
        
    ?>
      <a href="?id=<?php echo $row['JOB_ORDER_NO']; ?>" class="list-group-item list-group-item-action <?php 
      if (isset($_GET['id'])) {
        if ($_GET['id'] === $row['JOB_ORDER_NO']) {
          echo 'active'; 
        }
      }
      ?>">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="mb-2 text-bold">J.O #: <b><?php echo $row['JOB_ORDER_NO'];?></b></h5>
          <small> <?php echo date_format($tstamp, "Y/m/d");?></small>
        </div>
        <p class="mb-0 mt-2 fs-6"><?php echo $row['CUSTOMER_NAME'];?></p>
        <small class="text-warning"> Due: <b><?php echo date_format($date,"M d, Y H:i A");?></b></small>
      </a>
    <?php
    } 
    ?>
     
    </div>
  </div>

  <!-- SECOMD CONTAINER -->
  <div class=" flex-fill bd-highlight">
    <div class=" card shadow mb-4  p-10">
  <div class="card-header py-3">
      <div class="row">
          <div class="col-12">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase"> Job Order Details</h6>
          </div>
          
      </div>
  </div>
  <div class="container">

  <br>
      
      <?php

        if(isset($_GET['id'])) {
          $jobId = $_GET['id'];
        } else {
          $jobId = 0;
        }
     
        $sql = "SELECT *, CONCAT(c.FIRST_NAME, ' ', c.LAST_NAME) as CUSTOMER_NAME
        FROM repairs r
        INNER JOIN customer c ON r.CUST_ID = c.CUST_ID
        INNER JOIN category cat ON r.CATEGORY_ID = cat.CATEGORY_ID
        INNER JOIN employee e ON r.TECHNICIAN_ID = e.EMPLOYEE_ID
        WHERE JOB_ORDER_NO = '$jobId'";

        $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
        while ($row = mysqli_fetch_assoc($res)) {

          $tstamp=date_create($row['tstamp']);
          $date=date_create($row['DATE_TO_FIX']);
      ?>
      <div class="row mt-10">
     
          <div class="col-4 font-weight-bold">Job Order Number:</div>
          <div class="col-8"><b><?php echo $row['JOB_ORDER_NO'];?></b></div>

          <div class="col-4 font-weight-bold">Customer Name:</div>
          <div class="col-8 "><?php echo $row['CUSTOMER_NAME'];?></div>

          <div class="col-4 font-weight-bold">Model Name:</div>
          <div class="col-8"><?php echo $row['MODEL_NAME'];?></div>

          <div class="col-4 font-weight-bold">Category:</div>
          <div class="col-8"><?php echo $row['CNAME'];?></div>

          <div class="col-4 font-weight-bold">Serial Number:</div>
          <div class="col-8"><?php echo $row['SERIAL_NO'];?></div>

          <div class="col-4 font-weight-bold">Problems:</div>
          <div class="col-8"><?php echo $row['PROBLEMS'];?></div>

          <div class="col-4 font-weight-bold">Total Price:</div>
          <div class="col-8">₱<?php echo $row['PRICE'];?></div>

          <div class="col-4 font-weight-bold">Date started:</div>
          <div class="col-8"><?php echo date_format($tstamp, "F d, Y ");?></div>

          <div class="col-4 font-weight-bold">Estimated date to fix:</div>
          <div class="col-8 text-danger"><b><?php echo date_format($date, "F d, Y ");?></b></div>
          </div>
    <?php
            }
    ?>
   
 

      <?php
      if(isset($_GET['id'])) {
         ?>

        <!--   SHOW DATA-->
        <hr>
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <!-- <thead>
              <tr class="bg-light">
                <th>Date</th>
                <th>Technician Remark/s</th>

              </tr>
            </thead> -->
            <tbody>
            <form action="../backend/add_remark.php?id=<?php echo $_GET['id'];?>" method='POST'>
                <div class="form-group">
                    <textarea autofocus class="form-control" placeholder="Post remarks here" name="content" rows="4"></textarea>
                </div>
                <div class="float-right mb-4" >
                
                <button type="submit" class="btn btn-info d-flex">Submit <i class="bx bxs-send p-1"></i></button>

                </div>
                
            </form>

            <tr class="table-primary"><td class="fw-bolder">REMARKS:</td></tr>
            
              
              <?php

                if(isset($_GET['id'])) {
                  $jobId = $_GET['id'];
                } else {
                  $jobId = 0;
                }

                $sql = "SELECT * FROM remarks WHERE JOB_ORDER_NO = '$jobId' ORDER BY timestamp DESC";

                $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

                if(mysqli_num_rows($res) !== 0) {
                  while ($row = mysqli_fetch_assoc($res)) {

                    $tstamp=date_create($row['timestamp']);
          
                
                
                ?>
                      <tr>
                        <td>
                          <div><?php echo $row['content']?></div>
                          <br>
                          <small class="float-right"><i>Posted at: <?php echo date_format($tstamp, "F d, Y h:i A");?></i></small>
                        </td>
                      </tr>

                <?php
                  }
                } else {

                  ?>
                  <tr>
                  <td>
                    <div>No remarks available</div>
                  
                  </td>
                </tr>

                <?php
                }
                ?>
 
             

            </tbody>
          </table>
        </div>

        

       <?php
          
        } else {
        ?>
       
       <!-- NO DATA SHOWN -->
       <div>Select Job Order to show</div>
       
          <?php
        }

      ?>

     
  </div>
  <div class="card-body">
  </div>
    
  <tbody>
</div>
 
</div>

  
</div>


<?php
include'../includes/footer.php';
?> 
