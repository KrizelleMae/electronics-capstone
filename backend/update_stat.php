<?php
include '../includes/connection.php';


$action = $_GET['action'];
$id=$_GET['id'];

if ($action == 'cancel') {

    $sql = "UPDATE repairs SET status = 'cancelled' WHERE JOB_ORDER_NO = '$id';";
    $result = mysqli_query($db,$sql);

    if ($result){
        echo ("<script>
                window.alert('Succesfully Cancelled!');
                window.location.href='../pages/repairs.php';
                </script>");
      } else {
        echo mysqli_error($db);
      }

}else if ($action == 'done') {

    $sql = "UPDATE repairs SET status = 'done' WHERE JOB_ORDER_NO = '$id';";
    $result = mysqli_query($db,$sql);

    if ($result){
        echo ("<script>
                window.alert('Succesfully Cancelled!');
                window.location.href='../pages/repairs.php';
                </script>");
      } else {
        echo mysqli_error($db);
      }

} else{
    die(mysqli_error($db));
}
