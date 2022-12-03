<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>
        
 
                  
<script language="JavaScript" type="text/javascript" > 

function selectCustomer(e) {
  window.location.href = `?cust_id=${e}`
  }
  function selectJobOrder(e, i) {
  window.location.href = `?cust_id=${i}&id=${e}`
  }

  

  // function selectCustomer(e) {
  // window.location.href = `?id=${e}`
  // }

  function getTotal() {
    document.getElementById("change").innerHTML = '0';
    let sub_total = document.getElementById('subtotal').value;
    let discount = document.getElementById('discount').value;

    discount.defaultValue = '0';

    let total = sub_total - discount;
  
    document.getElementById("total").defaultValue = total;
    document.getElementById("grand").innerHTML = total + '.00';

    let cash = document.getElementById('cash').value;

    // set mivalue to total pay
    document.getElementById('cash').min = total;
    document.getElementById('discount').max = sub_total;

    // let change_total = 0;
    const change_total = cash - total;

    if (cash != '') {
      document.getElementById("change").innerHTML = change_total;
    }

    // document.getElementById("balance").defaultValue = sub_total - total;

  };
  getTotal();
</script>
<form action="../backend/pay_JO.php" method="POST">
  <div class="container-fluid"> 

    <div class="row my-5">
      <div class="col-sm">
      <label>Select Customer: </label>
        <select class="form-control col-sm-8" onchange="selectCustomer(value)" >  
            <option value="" disabled selected>Select Customer</option>
            <?php 
            
            if(isset($_GET['cust_id'])) {
                 $cust_id = $_GET['cust_id'];
              $sql = "SELECT CONCAT(FIRST_NAME, ' ', LAST_NAME)
              FROM customer where CUST_ID = $cust_id";
              $res = mysqli_query($db, $sql);
              $row = mysqli_fetch_row($res);
              ?>
              <option selected><?php echo $row[0]; ?></option>
               
            <?php
            }
            ?>
        
            <?php
            
            if (isset($_GET['cust_id'])) {
              $cust_id = $_GET['cust_id'];
              $sql = "SELECT *
              FROM repairs r INNER JOIN customer c ON r.CUST_ID = c.CUST_ID WHERE r.CUST_ID != $cust_id";
            } else {
                $sql = "SELECT *
                FROM repairs r INNER JOIN customer c ON r.CUST_ID = c.CUST_ID";
            }
    
            $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
            
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <option value="<?php echo $row['CUST_ID']; ?>"><?php echo $row['FIRST_NAME']." ".$row['LAST_NAME']; ?></option>
            <?php
            }
            ?>  
        </select> 
      </div>

     
      <div class="col-sm">
      <label>Select Job Order: </label>
        <select class="form-control col-sm-8" onchange="selectJobOrder(value, <?php echo $_GET['cust_id']; ?>)" >  
            <option value="" disabled selected>Select Job Order</option>
            <?php 
            if(isset($_GET['id'])) {
                ?>
                <option selected><?php echo $_GET['id']; ?></option>
            <?php
            }
            ?>
            <?php
            if(isset($_GET['id'])) {

                $cust_id = $_GET['cust_id'];
                $sql = "SELECT *
                FROM repairs r INNER JOIN customer c ON r.CUST_ID = c.CUST_ID WHERE r.CUST_ID = $cust_id AND r.JOB_ORDER_NO != '$_GET[id]'";
            } else {
                $sql = "SELECT *
                FROM repairs r INNER JOIN customer c ON r.CUST_ID = c.CUST_ID WHERE r.CUST_ID = $cust_id";
            }
    
            $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
            
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <option value="<?php echo $row['JOB_ORDER_NO'];?>"><?php echo $row['JOB_ORDER_NO']; ?></option>
            <?php
            }
            ?>  
        </select>
      </div>
    </div>

    <div>

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
    <div class="row shadow-sm mb-5" style="padding: 40px; margin: 25px">
       <div class="col-md-7">
            <h5 class="text-uppercase">Job Order Details</h5>
            <br/>
            <div class="row mt-10">
            <div class="col-4 font-weight-bold">Job Order Number:</div>
            <div class="col-8"><b><?php echo $row['JOB_ORDER_NO'];?></b></div>

            <div class="col-4 font-weight-bold">Customer Name:</div>
            <div class="col-8 "><?php echo $row['CUSTOMER_NAME'];?></div>

            <div class="col-4 font-weight-bold">Model Name:</div>
            <div class="col-8"><?php echo $row['MODEL_NAME'];?></div>

            <div class="col-4 font-weight-bold">Category:</div>
            <div class="col-8"><?php echo $row['CNAME'];?></div>

            <div class="col-4 font-weight-bold">Date started:</div>
            <div class="col-8"><?php echo date_format($tstamp, "F d, Y ");?></div>

            <div class="col-4 font-weight-bold">Total Price:</div>
            <div class="col-8 ">₱ <?php echo $row['PRICE'];?></div>

            <div class="col-4 font-weight-bold">Balance:</div>
            <div class="col-8 text-danger">₱ <?php echo $row['BALANCE'];?></div>
    
            <div class="col-4 font-weight-bold">Estimated date to fix:</div>
            <div class="col-8 text-danger"><b><?php echo date_format($date, "F d, Y ");?></b></div>
            </div>
            
            </div>
            <div class="col-md-5">
                <h5 class="text-uppercase">Payment</h5>
                <br/>
                
                <?php
                
                if($row['BALANCE'] != 0.00) {
                  echo "Today's date is : ";
                  date_default_timezone_set("Asia/Hong_Kong"); 
                  $today = date("F d, Y h:i A"); 
                  echo $today; 
                ?> 
                <input type="hidden" name="date" value="<?php echo $today; ?>">
                <div class="form-group row text-left mb-3"> 
                  <div class="col-sm-12 text-primary btn-group">

                  <!-- <a  href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> -->
                  </div>

                </div>
                <div class="form-group row mb-2">

                  <div class="col-md-3 text-left text-primary py-2">
                    <h6>
                      Subtotal
                    </h6>
                  </div>
                  <div class="col-sm-7">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="text" class="form-control text-right " value="<?php echo $row['BALANCE']; ?>" readonly name="subtotal" id="subtotal">
                    </div>
                  </div>

                </div>
                <div class="form-group row mb-2">

                  <div  class="col-md-3 text-left text-primary py-2">
                    <h6>
                    Discount
                    </h6>
                  </div>

                  <div class="col-sm-7">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                      </div>
                      <input type="number" class="form-control text-right" id="discount" name="discount" oninput="getTotal()" min='0'>
                    </div>
                  </div>
                </div>

        
          <div class="form-group row text-left mb-2">

            <div  class="col-md-3 text-primary">
              <h6 class="font-weight-bold py-2">
                Total
              </h6>
            </div>

            <div class="col-sm-7">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text">₱</span>
                </div>
                <input type="text" class="form-control text-right " id="total" readonly name="total">
              </div>
            </div>

            <div>
              <button class="btn btn-primary" data-toggle="modal" data-target="#posMODAL">Pay now</button>
            </div>

          </div>
            </div>  
        </div>
        </div>

        <?php 
          } else  {
            ?>

           <h5><div class="badge badge-info">FULLY PAID</div></h5> 
          <?php 
          }
          ?>


        <!-- <button onclick="getTotal()">Pay now</button> -->
      
        <?php
                }
            ?>

        
    </div>



    <!-- Modal for payment-->
    <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
   
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
             
                  <div class="form-group row text-left mb-2">

                    <div class="col-sm-12 text-center">
                      <h3 class="py-0">
                        GRAND TOTAL
                      </h3>

                      <h3 class="font-weight-bold py-3 bg-light">
                        ₱ <span id="grand" readonly/>
                      </h3>
                    </div>

                  </div>

                    <div class="col-sm-12 mb-2">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">₱</span>
                        </div>
                          <input oninput="getTotal()" class="form-control text-right" type="number" id="cash" placeholder="ENTER CASH" name="cash" required>

                          <input type="hidden" name="jobOrderId" value="<?php echo $_GET['id'];?>" required>
                    </div>

                    <!-- Change -->
                    <div class="row mt-4">
                      <div class="col-sm-4">
                        <h5>Your change: </h5>
                      </div>

                      <div class="col-sm float-right">
                      
                        <h4 class="font-weight-bold float-right">
                          ₱ <span id="change" readonly>0</span> 
                        </h4>
                      
                      </div>
                      
                  </div>

                 
              </div>
              <div class="modal-footer">
                <button type="submit" id='submit' class="btn btn-primary btn-block">PROCEED TO PAYMENT</button>
              </div>
            </div>
          </div>
      
        </div>

</form>

   


<?php

include'../includes/footer.php';
?>