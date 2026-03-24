<?php
session_start();
include('config.php');

if(isset($_POST['register'])){
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  =$_POST['password'];

    mysqli_query($con, "INSERT INTO users(name,email,password) 
    VALUES('$name','$email','$pass')");

   //  جيب id المستخدم الجديد
    $user_id = mysqli_insert_id($con);

    //  خزنه في session
    $_SESSION['user_id'] = $user_id;

     
    header("Location: login.php");
    exit;
}
?>