<?php
include'../includes/connection.php';
include'../includes/toptechnician.php'; 
?>

<div class="card shadow mb-10">
  <div class="card-header py-3">
    <h5 class="m-1 font-weight-bold text-primary text-uppercase">Job Order</h5>
  </div>
  <div class="table-responsive p-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr class="table-info">
          <th>Job Order Number</th>
          <th>Customer Name</th>
          <th>Model Name</th>
          <th>Category</th> 
          <th>Serial Number</th>
          <th>Price</th>
          <th>Problems</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
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

          <tr>
            <td><?php echo $row['JOB_ORDER_NO'];?></td>
            <td class="text-primary"><strong><?php echo $row['CUSTOMER_NAME'];?></strong></td>
            <td><?php echo $row['MODEL_NAME'];?></td>
            <td><?php echo $row['CNAME'];?></td>
            <td><?php echo $row['SERIAL_NO'];?></td>
            <td>₱<?php echo $row['PRICE'];?></td>
            <td><?php echo $row['PROBLEMS'];?></td>
            <td><a href="repmore.php" type="button" class="btn viewMore"><i class="fas fa-eye" ></i>&nbsp;More</a></td>
          </tr>
            <?php
              }
            ?>
      </tbody>
    </table>
  </div>
  <div class="card-body">
  </div>
<tbody>

<?php
include'../includes/footer.php';
?> 
