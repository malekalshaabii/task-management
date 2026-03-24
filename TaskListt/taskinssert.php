<?php
session_start();
include ('config.php');
$title='';
$description='';
$status='';
if(isset($_POST['title']))
    {
          $title=$_POST['title'];
    }
if(isset($_POST['description']))
    {
          $description=$_POST['description'];
    }
    if(isset($_POST['status']))
    {
          $status=$_POST['status'];
    }
      if(isset($_POST['upload']))
        { 
               $user_id = $_SESSION['user_id'];
           $query = "INSERT INTO tasks (title, description, status,user_id) 
               VALUES('$title','$description','$status',$user_id)";
               if( mysqli_query($con, $query)){
                   echo "<script>
        alert('تمت الإضافة بنجاح');
        window.location.href='task.php';
        </script>";
        exit();
            
               }
                
        }
      
?>