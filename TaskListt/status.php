<?php
session_start();
include('config.php');
$user_id = $_SESSION['user_id'];
$ID=$_GET['id'];
$get= mysqli_query($con, "SELECT status FROM tasks WHERE user_id=$user_id AND id=$ID ");
$row=mysqli_fetch_assoc($get);
if($row['status']=='done')
    {
         $new_status = 'pending';
    }
    else
        {
             $new_status = 'done';
        }
mysqli_query($con ,"UPDATE tasks SET status='$new_status' where id=$ID AND user_id=$user_id ");
header('location:task.php');
?>