<?php
session_start();
if (empty($_SESSION)) {
  header('Location: /');
}
if ($_SESSION['user']['rights'] == 0) {
  header('Location: /');
}
$token = $_SESSION['user']['basket_token'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="./css/custom.css">
  <title>Заказ</title>
</head>

<body>

  <main>

    <section class="registration__title">
      <h2 class="registration__title-text container">Подробности заказа</h2>
      <?php
      require_once('../include/adminnav.html');
      ?>

      <div class="container mb-5">
        <?php
        require_once('../scripts/connect.php');
        $id = $_GET['id'];
        $userId = $_SESSION['user']['id'];
        $order = $link->query("SELECT * FROM `orders` WHERE `id` = '$id' AND `user_id` = '$userId' ");
        $order = mysqli_fetch_all($order);
        foreach ($order as $order);
        ?>
        <h4 class="mt-4">Подробности заказа</h4>
        <div class="row align-items-md-stretch">

          <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h4>Заказчик: </h4>
              <br>
              <?php
              $user = $link->query("SELECT * FROM `users` WHERE `id` = '$order[1]'");
              $user = mysqli_fetch_all($user);
              foreach ($user as $user);
              ?>
              <img src="../<?= $user[8] ?>" width="300px" height="300px" alt="">
              <h4>ID: <?= $user[0] ?></h4>
              <h4>Имя: <a href="" style="color:black; text-decoration:none;"><?= $user[1] ?></a></h4>
              <h4>Фамилия: <a href="" style="color:black; text-decoration:none;"><?= $user[2] ?></a></h4>
              <h4>Пол: <a href="" style="color:black; text-decoration:none;"><?= $user[3] ?></a></h4>
              <h4>Номер телефона:<a href="" style="color:black; text-decoration:none;"> <?= $user[5] ?></a></h4>
              <h4>E-mail: <a href="" style="color:black; text-decoration:none;"><?= $user[4] ?></a></h4>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3" style="color:white!important;">

              <h4>Заказ №<?= $order[0] ?></h4>
              <table class="table table-bordered" style="border:1px solid black;">
                <thead>
                  <tr>
                    <th scope="col">Товар</th>
                    <th scope="col">Цена</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $basket = $link->query("SELECT * FROM `korz` WHERE `user_id`='$order[1]' AND `status` = '1' AND `token` = '$order[5]'");
                  $basket = mysqli_fetch_all($basket);
                  foreach ($basket as $basket) {
                    $trash = $link->query("SELECT * FROM `products` WHERE `id` = '$basket[1]'");
                    $trash = mysqli_fetch_all($trash);
                    foreach ($trash as $trash) {
                  ?>
                      <tr>
                        <td><?= $trash[1] ?></td>
                        <td><?= $trash[3] ?></td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
              </table>

              <p>Сумма заказа: <?= $order[2] ?></p>
              <td style="color:green;">Статус: <?= $order[3] ?></td>
              <form action="php_scripts/order.php" method="POST">
                <input type="hidden" name="id" value="<?= $order[0] ?>">

                <br>
                <td><a href="deleteorder.php?id=<?= $order[0] ?>" style="color:#F16D71;">Отменить заказ</a></td>
              </form>

            </div>
          </div>

        </div>
      </div>
      <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>