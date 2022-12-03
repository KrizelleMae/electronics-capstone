
<?php
$page = 'repairs';
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
?>
<link rel="stylesheet" href="../css/stepprog.css">          
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-2 font-weight-bold text-primary">Repair Order&nbsp;<a  href="#" data-toggle="modal" data-target="#orderModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
  </div>
            
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
        <thead>
          <tr>
            <th width="15%">Job order No</th>
            <th width="25%">Customer</th>
            <th width="25%">Item Name</th>
            <th width="12%">Repair Status</th>
            <th width="12%">Balance</th>
            <th class="text-center" >Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT *
          FROM repairs r INNER JOIN customer c ON r.CUST_ID = c.CUST_ID WHERE status != 'cancelled'
          order by tstamp asc";
          
          $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
          <tr>
            <td><?php echo $row['JOB_ORDER_NO'];?></td>
            <td><?php echo $row['FIRST_NAME']. " ". $row['LAST_NAME'];?></td>
            <td><?php echo $row['REPAIR_NAME'];?></td>
            <td class="text-center "><span class="badge badge-info"><?php echo $row['STATUS'];?></span></td>
            <td>₱ <?php echo $row['BALANCE'];?></td>
            <td><a href="./view_joborder.php?jobId=<?php echo $row['JOB_ORDER_NO']; ?>"  type="button"
            class="btn btn-primary">View</a>
            <!-- <a class="btn btn-danger" href="#" role="button">Delete</a></td> -->
          </tr>
        <?php
          }
          ?>
        </tbody>
      </table>
    </div>
</div>
</div>
              
<?php
//  DROPDOWN FOR CUSTOMER 
$sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME
        FROM customer
        order by FIRST_NAME asc";
$res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

$cust = "<select class='form-control'  style='border-radius: 0px;' name='customer' required>
        <option value='' disabled selected hidden>Select Customer</option>";
  while ($row = mysqli_fetch_assoc($res)) {
    $cust .= "<option value='".$row['CUST_ID']."'>".$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
  }
$cust .= "</select>";
// END OF DROP DOWN

$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }
$aaa .= "</select>";

$query = "SELECT CONCAT(FIRST_NAME, ' ', LAST_NAME) AS TNAME, EMPLOYEE_ID FROM employee WHERE JOB_ID = 3  order by TNAME asc";
$result = mysqli_query($db, $query) or die ("Bad SQL: $sql");

$technician = "<select class='form-control' placeholder='Assign Technician-In-Charge' name='technician' required>
        <option disabled selected hidden>Select Technician</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $technician .= "<option value='".$row['EMPLOYEE_ID']."'>".$row['TNAME']."</option>";
  }
$technician .= "</select>";

?> 

<?php
include'../includes/footer.php';
?> 

 <!-- Product Modal-->
  <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong>Add Job Order</strong></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="../backend/repair_transac.php?action=add">

           <div class="form-group">
            <label>Job Order No:</label>
             <input class="form-control" placeholder="Order Number" name="orderno" value="<?php echo uniqid(); ?>" required>
           </div>
           <div class="form-group">
             <?php
               echo $cust;
             ?>
           </div>
           <div class="form-group">
           <?php
               echo $technician;
             ?>
            </div>
           <div class="form-group">
             <input class="form-control" placeholder="Model Name" name="repairname" required>
           </div>
           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
              <input class="form-control" placeholder="Serial no" name="serialno" required>
           </div>
           <div class="form-group">
             <textarea rows="2" cols="50" textarea class="form-control" placeholder="Problems" name="description" required></textarea>
           </div>
           
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date to be Fix" name="date" required>
           </div>
            <hr>
          <div class="float-right">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="reset" class="btn btn-danger"><i class="fas fa-undo-alt"></i>&nbsp;Reset</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>&nbsp;Save</button> 
          </div>   
          </form>  
        </div>
      </div>
    </div>
  </div>


<script>
      $(document).ready(function() {
          $(".viewMore").on("click", function() {
              let dataId = $(this).attr("data-id");
              $("#showStat").modal();
            });
        });

      
    </script>

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script> 