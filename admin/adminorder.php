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
    <title>Подписки</title>
</head>

<body>

    <main>
        
    <section class="registration__title">
    <h2 class="registration__title-text container">Список Подписок</h2>
    <?php
require_once('../include/adminnav.html');
?>
        
        <div class="container">
            <h1 class="mt-5 text-center">Заказы</h1>
            
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Номер пользователя</th>
      <th scope="col">Сумма</th>
      <th scope="col">Статус</th>
      <th scope="col">Дата</th>
      <th scope="col">Адрес</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>


                <?php
                require_once('../scripts/connect.php');
                $product = $link->query("SELECT * FROM `orders`");
                $product = mysqli_fetch_all($product);
                foreach($product as $product){
                $usId = $product[1];
                $userNumber = $link->query("SELECT `number` FROM `users` WHERE `id` = '$usId'");
                $userNumber = mysqli_fetch_all($userNumber);
                foreach($userNumber as $userNumber);
                ?>
    <tr>
      <td scope="row"><?=$product[0]?></td>
      <td><?=$userNumber['0']?></td>
      <td><?=$product[2]?></td>
      <td><?=$product[3]?></td>

      <td><?=$product[4]?></td>
      <td><?=$product[6]?></td>
      
      <td><a href="orderinfo.php?id=<?=$product[0]?>" style="text-decoration:none;color:green;">Информация</a></td>
      <td><a href="conforder.php?id=<?=$product[0]?>&status='Отменён'" style="text-decoration:none;color:#F16D71;">Отменить</a></td>
      <td><a href="conforder.php?id=<?=$product[0]?>&status='Обрабатывается'" style="text-decoration:none;color:green;">Обрабатывается</a></td>
      <td><a href="conforder.php?id=<?=$product[0]?>&status='Доставляется'" style="text-decoration:none;color:green;">Доставляется</a></td>
      <td><a href="conforder.php?id=<?=$product[0]?>&status='Выполнен'" style="text-decoration:none;color:green;">Выполнен</a></td>
    </tr>
                <?php
                }
                ?>


</tbody>
</table>

</div>
    </main>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>