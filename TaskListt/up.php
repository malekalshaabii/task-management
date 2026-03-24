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
      if(isset($_POST['update']))

        {   $ID=$_POST['id'];
            $user_id = $_SESSION['user_id'];
            $query = "UPDATE tasks SET title='$title',description='$description',status='$status' 
                       WHERE id=$ID AND user_id=$user_id";
               if( mysqli_query($con, $query)){
                   echo "<script>
        alert('تمت الإضافة بنجاح');
        window.location.href='task.php';
        </script>";
        exit();
            
               }
                
        }
      
?>