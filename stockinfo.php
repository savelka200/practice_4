<?php
session_start();
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

    <title>Каталог</title>
</head>

<body>
    <?php
    require('include/nav.html');
    ?>
    <main>
        <section class="cart__title">
            <nav class="breadcrumb container">
                <h1 class="cart__title-text">Акция</h1>
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.php">Главная</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb-item-active"><a class="breadcrumb-link breadcrumb-link-active" href="catalog.php">Каталог</a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="catalog container">
            <br>
            <ul class="catalog__list">
                <?php
                $id = $_GET['id'];
                require_once('scripts/connect.php');
                $product = $link->query("SELECT * FROM `stock` WHERE `id` = '$id'");
                $product = mysqli_fetch_all($product);
                foreach ($product as $product) {
                ?>
                    <li class="w-100">
                        <img class="w-100" src="<?= $product[3] ?>" alt="1">
                        
                        <div class="catalog__description">

                            <h3 class="catalog__title"><?= $product[1] ?></h3>
                            
                        </div>

                    </li>
                    <p>Описание: <br><?= $product[2] ?></p>

                <?php
                }
                ?>
            </ul>

        </section>

    </main>
    <?php
    require('include/footer.html');
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
</body>


</html>