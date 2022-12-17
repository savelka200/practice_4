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

    <title>Акции</title>
</head>

<body>
    <?php
    require('include/nav.html');
    ?>
    <main>
        <section class="cart__title">
            <nav class="breadcrumb container">
                <h1 class="cart__title-text">Акции</h1>
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.php">Главная</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb-item-active"><a class="breadcrumb-link breadcrumb-link-active" href="catalog.php">Акции</a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="catalog container">
            <br>
            <ul class="catalog__list">
            <?php
                    $today = date("Y-m-d");
                    $today = new DateTime("$today");
                    require_once('scripts/connect.php');
                    $news = $link->query("SELECT * FROM `stock`");
                    $news = mysqli_fetch_all($news);
                    foreach ($news as $news) {
                        $start = $news[5];
                        $finish = $news[6];
                        $start = new DateTime("$start");
                        $finish = new DateTime("$finish");

                        if($start < $today && $today < $finish){
                            $stockUpdate = $link->query("UPDATE `stock` SET `status` = '1' WHERE `stock`.`id` = '$news[0]';");
                        }
                        else{
                            $stockUpdate = $link->query("UPDATE `stock` SET `status` = '0' WHERE `stock`.`id` = '$news[0]';");
                        }
                    }
                    ?>
                <?php
                require_once('scripts/connect.php');
                $product = $link->query("SELECT * FROM `stock` WHERE `status` = '1'");
                $product = mysqli_fetch_all($product);
                foreach ($product as $product) {
                ?>
                    <li class="catalog__item">
                        <img class="catalog__img" src="<?= $product[3] ?>" alt="alt">

                        <div class="catalog__description">
                            <h3 class="catalog__title"><?= $product[1] ?></h3>

                            <p class="catalog__price"><?= $product[7] ?></p>
                            <p><?= $product[5]?> - <?= $product[6]?></p>
                            <a href="stockinfo.php?id=<?= $product[0] ?>" style="text-decoration:none" >Подробнее</a>
                        </div>
                    </li>
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