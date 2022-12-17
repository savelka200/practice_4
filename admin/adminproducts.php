<?php
session_start();
if (empty($_SESSION)) {
    header('Location: /');
}
if ($_SESSION['user']['rights'] == 0) {
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
                <h1 class="mt-5 text-center">Список товаров</h1>
                <ul class="catalog__list mt-5">
                    <?php
                    require_once('../scripts/connect.php');
                    $product = $link->query("SELECT * FROM `products`");
                    $product = mysqli_fetch_all($product);
                    foreach ($product as $product) {
                    ?>
                        <li class="catalog__item">
                            <img class="catalog__img" src="../<?= $product[3] ?>" alt="fds" width="auto" height="auto">

                            <div class="catalog__description">
                                <h3 class="catalog__title"><?= $product[1] ?></h3>
                                <p class="catalog__description"><?= $product[2] ?></p>
                                <p class="catalog__price"><?= $product[4] ?>₽</p>
                                <p class="catalog__price"><a class="catalog__price" href="deleteproduct.php?id=<?= $product[0] ?>">Удалить</a></p>
                                <p class="catalog__price"><a class="catalog__price" href="productupdate.php?id=<?= $product[0] ?>"> Редактировать</a></p>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <br>
                <br>
                <h4 class="mt-5">Добавить товар</h4>
                <form action="addprod.php" method="POST" class="mt-5" enctype="multipart/form-data">

                    <label>Название:</label>
                    <input type="text" name="name" class="form-control" required>
                    <label>Цена:</label>
                    <input type="number" name="price" class="form-control" required>
                    <label>Описание:</label>
                    <input type="text" name="opis" class="form-control" required>
                    <br>
                    <label>Категория:</label>
                    <input type="text" name="category" class="form-control" required>
                    <br>
                    <input type="file" class="form-control" name="img" multiple accept="image/jpeg,image/png">
                    <br>
                    <button type="submit" class="form-control" style="margin-left:auto;margin-right:auto;width:50%;border:none;color:#000;background-color:#d9f2c7;">Добавить</button>
                </form>
            </div>
    </main>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>