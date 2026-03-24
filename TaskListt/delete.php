<?php
session_start();
include('config.php');
$user_id = $_SESSION['user_id'];
$ID=$_GET['id'];
mysqli_query($con ,"DELETE FROM tasks where id=$ID AND user_id=$user_id ");
header('location:task.php');
?>