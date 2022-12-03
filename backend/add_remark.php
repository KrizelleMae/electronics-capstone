<?php

include '../includes/connection.php';


$id = $_GET['id'];
$content = $_POST['content'];


$stmt = $db->prepare("INSERT INTO remarks (JOB_ORDER_NO, content) VALUES (?, ?)");
$stmt->bind_param("ss", $id, $content);

if($stmt->execute()){
    echo '<script>alert("Success! Remark has been added.")</script>';
    header("location: ../pages/repmore.php?id=".$id);
} else {
    echo '<script>alert("Failed to add remark. Please try again!")</script>';
    header('location: ../pages/repmore.php?ms=error');
}



?>