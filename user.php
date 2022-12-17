<?php
session_start();
if (empty($_SESSION)) {
    header('Location: auth.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Личный кабинет</title>
</head>

<body>
    <?php
    require('include/nav.html');
    ?>
    <main>
        <section class="registration__title">
            <h2 class="registration__title-text container">Личный кабинет</h2>
        </section>
        <div class="container">
            <?php
            if(empty($_SESSION['user'])){
                header('Location: auth.php');
            }
            require_once('scripts/connect.php');
            $userId = $_SESSION['user']['id'];
            $user = $link->query("SELECT * FROM `users` WHERE `id` = '$userId'");
            $user = mysqli_fetch_all($user);
            foreach ($user as $user) {
            ?>
                <div class="avatar mt-5">
                    <img src="<?= $user[8] ?>" width="300px" height="300px" alt="avatar">
                </div>
                <div class="user_info">
                    <ul class="Data">
                        <li>Имя: <?= $user[1] ?></li>
                        <li>Фамилия: <?= $user[2] ?></li>
                        <li>Пол: <?= $user[3] ?></li>
                        <li>Номер телефона: <?= $user[5] ?> </li>
                        <li>E-mail: <?= $user[4] ?></li>
                        <li>Страна: <?= $user[9] ?></li>
                        <li>Город: <?= $user[10] ?></li>
                    </ul>
                    <a href="updateuser.php?id=<?= $user[0] ?>" class="update">Редактировать профиль</a>
                    <?php
                    $userAdmin = $user[7];
                    if ($userAdmin == 1) {
                    ?>
                        <a href="admin/admin.php" class="update">Панель администратора</a>
                    <?php
                    }
                    ?>
                    <a href="scripts/logout.php" class="update">Выйти</a>

                </div>
            <?php
            }
            ?>

            <?php
            $order = $link->query("SELECT * FROM `orders` WHERE `user_id` = '$userId' ");
            $order = mysqli_fetch_all($order);
            foreach ($order as $order) {
                $token = $order[5];
            ?>
                <h4 class="mt-5">Заказ №<?= $order[0] ?></h4>
                <table class="table table-bordered" style="border:1px solid black;">
                    <thead>
                        <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $basket = $link->query("SELECT * FROM `korz` WHERE `user_id`='$userId' AND `status` = '1' AND `token` = '$token'");
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
                    <td><a href="../scripts/deleteorderuser.php?id=<?= $order[0] ?>" style="color:#F16D71;">Отменить заказ</a></td>
                </form>
            <?php
            }
            ?>

        </div>

    </main>
    <?php
    require('include/footer.html');
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>