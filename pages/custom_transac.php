<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}
            ?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $zz = $_POST['id'];
              $c = $_POST['category'];

              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO category
                    (CATEGORY_ID, CNAME)
                    VALUES (Null,'{$c}')";
                    mysqli_query($db,$query)or die ('Error in updating Database');
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "custom.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>