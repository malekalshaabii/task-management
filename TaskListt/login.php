<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body{
              background:#f5f5f5;
    font-family: "Cairo", sans-serif;
     display: flex;
    flex-direction: column;
    align-items: center; 
    direction: rtl;
     
        }
        .form input {
      margin-bottom: 10px ;
    padding: 5px;
    width: 60%;
    font-size: 15px;
    font-weight: bold;
    border-radius: 50px;

}
.form{
     width: 350px;
    box-shadow: 1px 1px 10px silver;
    padding: 20px;
    border-radius: 10px;
    background: white;
    margin-top: 30px;
}
    </style>
    <?php
session_start();
include('config.php');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    
    $result = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        // تحقق من كلمة المرور
        if($pass == $row['password']){
            
            // خزّن ID في session
            $_SESSION['user_id'] = $row['id'];

            // تحويل لصفحة المهام
            header("Location:task.php");
            exit;

        } else {
            echo "كلمة المرور خاطئة";
        }

    } else {
        echo "الإيميل غير موجود";
    }
}
?>
</head>
<body>
    <form method="POST" class ='form'>
    <label>الإيميل</label>
    <input type="email" name="email" required>
     <br>
    <label>كلمة المرور</label>
    <input type="password" name="password" required>
    <br>
    <button name="login">تسجيل دخول</button>
</form>
</body>
</html>