<!DOCTYPE html>
<html lang="en">
<head>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<link rel="stylesheet" href="task.css">
    <title>ادارة المهام </title>

</head>
<body>
    <header>
        <h1>ادارة المهام</h1>
    </header>
<div class="menue">
    <center>
    <form action="taskinssert.php" method="post" class="form">
        <label>عنوان المهمة</label>
        <input type="text" name="title" id="text">
        <br>
        <label>وصف المهمة</label>
        <textarea name="description" id="description" cols="55" rows="10"></textarea>
        <br>
        <label>حالة المهمة</label>
        <select name="status"  >
             <option value="">الحالة</option>
            <option value="pending">pending</option>
            <option value="done">done</option>
        </select>
        <br><br>
        <button name='upload' id='button1'>أنشاء مهمة</button>
         <br><br>
         <a href="#c">عرض كل المهام </a>
    </form>
    </center>
</div>
        <div class="A">
      <div id="show">
         <h2>المهام</h2>
       </div>
    </div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>العنوان</th>
            <th>الوصف</th>
            <th>الحالة</th>
            <th>العمليات</th>
        </tr>
    </thead>
    <tbody>

<?php
session_start();
include('config.php');

$user_id = $_SESSION['user_id'];
$result = mysqli_query($con, "SELECT * FROM tasks WHERE user_id=$user_id");

while ($row = mysqli_fetch_array($result)) {

    $status = $row['status'];

    $status_text = ($status == 'done')
        ? "<span style='color:green;font-weight:bold;'>فعال</span>"
        : "<span style='color:red;font-weight:bold;'>غير فعال</span>";
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $status_text; ?></td>
    <td>
        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">حذف</a>
        <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">تعديل</a>
         <a href="status.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">تغيير الحالة</a>
    </td>
</tr>

<?php
}
?>

</tbody>
</table>     
</body>
</html>