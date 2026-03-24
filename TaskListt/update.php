<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل مهمة</title>
    <link rel="stylesheet" href="task.css">
    <?php
     include('config.php');
      $ID = $_GET['id'];
      $up = mysqli_query($con ,"SELECT * FROM tasks where id =$ID" );
      $data = mysqli_fetch_array($up);
    ?>
   
</head>
<body>
     <header>
        <h1>ادارة المهام</h1>
    </header>
<div class="menue">
    <center>
    <form action="up.php" method="post" class="form">
       
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
         <br>
        <label>عنوان المهمة</label>
        <input type="text" name="title" id="text"value="<?php echo $data['title']; ?>">
        <br>
        <label>وصف المهمة</label>
        <textarea name="description" id="description" cols="55" rows="10"><?php echo $data['description']; ?></textarea>
        <br>
        <label>حالة المهمة</label>
        <select name="status" id="status"  value="<?php echo $data['status']; ?>">
             <option value="">الحالة</option>
            <option value="pending" <?php if($data['status']=='pending') echo 'selected'; ?>>pending</option>
            <option value="done"<?php if($data['status']=='done') echo 'selected'; ?>>done</option>
        </select>
        <br><br>
        <button name='update' id='button1'>تعديل مهمة</button>
         <br><br>
         <a href="task.php">رجوع</a>
    </form>
    </center>
</div>
</body>
</html>