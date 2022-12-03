<?php
include '../includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Repair and Sales Inventory</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/stepprog.css">

  <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center">
      <div class="col-sm-8">
          <div class="card mt-4 p-4 mb-2">
            <div class="card-body p-2 text-center">
              <h4 class="">WELCOME!</h4>
              <small class='text-center'>To track your Job Order, input the Job Order No then click 'Track' </small>
            </div>
            <!-- <h6 class="text-dark">Please input your job order number here.</h6> -->
            <!-- <form action="./search_order.php" method="post"> -->
              <div class="form-outline  mr-0 ml-0 mx-auto text-center mt-3 d-flex align-items-center mb-3" >

              <?php
              if(isset($_GET['id'])){
                echo '<input type="search" id="searchValue" class="col-sm-10 form-control mr-4 ml-0 text-center" placeholder="Search Job Order No." value='.$_GET["id"].'>
                <button id="searchbtn" class="btn btn-outline-info px-4" onclick="search()">Track</button>';
              
                
              } else {

                echo ' <input type="search" id="searchValue" class="col-sm-10 form-control mr-4 ml-0 text-center" placeholder="Search Job Order No."/>
                <button id="searchbtn" class="btn btn-outline-info px-4" onclick="search()">Track</button> ';
               
              }
              
              ?>
                <!-- <a class="btn btn-primary float-right" href="./track.php" role="button" name="submit">Track Order</a>
                </button> -->
                
              </div>
            <!-- </form> -->
           
               
            <?php 

           
            if(isset($_GET['id'])){
             
              
              $search = $_GET['id'];
    

              $sql = "SELECT *
                  FROM repairs r 
                  INNER JOIN customer c ON r.CUST_ID = c.CUST_ID
                  WHERE JOB_ORDER_NO = '$search'";

              $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");
              if(mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  ?>

            <div class=" px-0 pt-4 pb-0">
                <div>
                  <!-- <h5 class="text-center"><strong>JOB ORDER STATUS</strong></h5> -->
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
            </div>
            <h5 class="text-center my-0 mt-5"><b>JOB ORDER DETAILS</b></h5>
            <hr class='w-75 mx-auto'/>
            <div class="pt-2 mx-5">
              <div class='d-flex mt-2'>
                <h6 class="">Job Order Number:</h6>
                <p class="text-right mr-3  ml-auto"><b><?php echo $row['JOB_ORDER_NO'];?></b></p>
                
              </div>
              <div class='d-flex mt-2'>
                <h6 class="">Customer's Name:</h6>
                    <p class=" mr-3 ml-auto"><b><?php echo $row['FIRST_NAME']. ' '. $row['LAST_NAME']?></b></p>
              </div>
              <div class='d-flex mt-2'>
                <h6 class=" ">Repair Item:</h6>
                    <p class="text-right mr-3 ml-auto"><b><?php echo $row['REPAIR_NAME'].'('.$row['FIRST_NAME'].')';?></b></p>
              </div>

              <div class='d-flex mt-2'>
                <h6 class=" ">Date to Claim:</h6>
                <?php  
                  $new=date_create($row['DATE_TO_FIX']);
                  $newDate = date_format($new,"F j, Y");
                ?>
                    <p class="text-right mr-3 ml-auto"><b><?php echo $newDate;?></b></p>
              </div>

            </div>
            <a class="btn btn-light mt-3" href="../">Go back</a> 
        </div>


        <?php
              }
            } else {
              echo '<div class="alert alert-primary mt-3" role="alert">
              Invalid Job order number. Kindly double check and try again!
            </div>';
            }

       
            } else {
             

                // $search = $_GET['id'];
    
                // header("location: ./search_order.php?.$search.");
             
            }
            ?> 
      </div>
    </div>

  </div>

  
  <script>
    
    // let button = document.getElementById('searchbtn').addEventListener('click', search);

    function search() {
      let value = document.getElementById("searchValue").value;
     
      window.location.href = `?id=${value}`
    }
   
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>









