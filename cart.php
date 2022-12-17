<?php
session_start();

if (empty($_SESSION['user'])) {
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

    <title>Shop</title>
</head>

<body>
    <?php
    require('include/nav.html');
    include_once('scripts/connect.php');
    ?>
    <?php
    $user_id = $_SESSION['user']['id'];
    $count = $link->query("SELECT count(*) FROM `korz` WHERE `user_id` = '$user_id'");
    $count = mysqli_fetch_all($count);
    foreach ($count as $count);
    ?>
    <main class="cart">
        <section class="cart__title">
            <h1 class="cart__title-text container">Корзина</h1>
        </section>
        <section class="cart__products">
            <form action="#" class="cart__products-form container">
                <ul class="cart__products-list">
                    <?php
                    $basket = $link->query("SELECT * FROM `korz` WHERE `user_id`='$user_id' AND `status` = '0'");
                    $basket = mysqli_fetch_all($basket);
                    foreach ($basket as $basket) {
                        $trash = $link->query("SELECT * FROM `products` WHERE `id` = '$basket[2]'");
                        $trash = mysqli_fetch_all($trash);
                        foreach ($trash as $trash) {
                    ?>
                            <a href="scripts/deleteshop.php?id=<?= $basket[0] ?>" style="float:right; text-decoration:none; color:red;">X</a>

                            <li class="cart__products-item">

                                <img class="cart__products-img" src="<?= $trash[3] ?>" alt="pshenica" width="262" height="306">

                                <div class="cart__products-info">

                                    <h2 class="cart__products-info-title"><?= $trash[1] ?></h2>

                                    <p class="cart__products-info-text">Цена: <span class="cart__products-info-text-price"><?= $trash[4] ?>₽</span>

                                    </p>
                                </div>

                            </li>

                    <?php
                        }
                    }
                    $summ = mysqli_query($link, "SELECT SUM(`price`) FROM `korz` WHERE `user_id` = '$user_id' AND `status` = '0' ");
                    $summ = mysqli_fetch_all($summ);
                    foreach ($summ as $summ);

                    ?>
                    <?php
                    if (!empty($trash[3])) {
                    ?>
                        <li class="cart__products-button">
                            <a style="text-decoration:none;display:flex;justify-content:center;align-items:center;" href="scripts/deletesshop.php" class="cart__products-button-clear">Очистить корзину</a>
                            <a href="catalog.php" class="cart__products-button-back">Продолжить покупку</a>
                        </li>
                </ul>
                <ul class="cart__arrage">
                    <li class="cart__checkout">
                        <p class="cart__checkout-grand">Общая сумма <span class="cart__checkout-grand-price"><?= $summ[0] ?>₽</span>
                        </p>
                        <hr class="cart__checkout-hr">
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action = "#" method="GET">
                            <input type="text" class="form-control form-control-dark" placeholder="Введите адрес доставки"  name="adress">

                        <input type="submit"></input>
                        
                        </form>
                        <p>Ваш адрес доставки:<?= @$_GET["adress"]?></p>
                        <a class="btn btn-success" style="text-decoration:none;" href="scripts/addorder.php?summ=<?= $summ[0] ?>&adress=<?= @$_GET["adress"] ?>">Оформление заказа</a>
                    </li>
                </ul>
            <?php
                    } else {

            ?>

                <h2 class="mt-5">Корзина пуста</h2>
                <h5 class="mb-5"><a href="catalog.php" style="color:#000;">Выбрать товары</a></h5>
            <?php
                    }
            ?>
            </form>
        </section>
    </main>
    <?php
    require('include/footer.html');
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>