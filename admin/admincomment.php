<?php
session_start();
if(empty($_SESSION)){
    header('Location: /');
}
if($_SESSION['user']['rights']==0){
  header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <title>Товары</title>
</head>

<body>

    <main>
    <section class="registration__title">
    <h2 class="registration__title-text container">Товары</h2>
    <?php
require_once('../include/adminnav.html');
?>
        
        <div class="container">
        <h1 class="text-center mt-5">Отзывы</h1>
    <table class="table">
    <thead>
      
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Дата</th>
        <th scope="col">ID Пользователя</th>
        <th scope="col">Текст</th>
        <th scope="col"></th>
        
      </tr>
    </thead>
<?php
require('../scripts/connect.php');
$students = $link->query("SELECT * FROM `feedback` WHERE `agreement` = 1");
$students = mysqli_fetch_all($students);
foreach($students as $students){
?>
    <tbody?>
      <tr class="table-active">
        <th scope="row"><?=$students[0]?></th>
        <td><?=$students[3]?></td>
        <td><?=$students[1]?></td>
        <td><?=$students[2]?></td>
        <td><a href="updatefeedback.php?id=<?=$students[0]?>&status=0" style="text-decoration:none;color:red;">Скрыть</a></td>
      </tr>
</tbody>
<?php
}
?>
  </table>
  <h1 class="text-center mt-5">Неодобренные комментарии</h1>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Дата</th>
        <th scope="col">Пользователь</th>
        <th scope="col">Текст</th>
        <th scope="col"></th>
        <th scope="col"></th>
        
      </tr>
    </thead>

<?php
$students = $link->query("SELECT * FROM `feedback` WHERE `agreement` !=1");

$students = mysqli_fetch_all($students);
foreach($students as $students){
?>
    <tbody?>
      <tr class="table-active">
        <th scope="row"><?=$students[0]?></th>
        <td><?=$students[3]?></td>
        <td><?=$students[1]?></td>
        <td><?=$students[2]?></td>
        <td><a href="updatefeedback.php?id=<?=$students[0]?>&status=1" style="text-decoration:none;color:green;"> Опубликовать</a></td>
        <td><a href="deleteotz.php?id=<?=$students[0]?>&status='delete'" style="text-decoration:none;color:red;">Не публиковать</a></td>
      </tr>
</tbody>
<?php
}
?>
  </table>
</div>
</div>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>
