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
    <title>Новости</title>
</head>

<body>

    <main>
        <section class="registration__title">
            <?php
            require_once('../include/adminnav.html');
            ?>

            <div class="container">
                <h2 class="mt-5 text-center">Список акций</h2>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
                    <h4>Неопубликованные акции</h4>
                    <?php
                    $today = date("Y-m-d");
                    $today = new DateTime("$today");
                    require_once('../scripts/connect.php');
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
                    require_once('../scripts/connect.php');
                    $news = $link->query("SELECT * FROM `stock` WHERE `status` = '0'");
                    $news = mysqli_fetch_all($news);
                    foreach ($news as $news) {
                    ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img class="bd-placeholder-img card-img-top" src="<?= $news[3] ?>" width="100%" height="225">

                                <div class="card-body">
                                    <h4 class="card-text text-center"><?= $news[1] ?></h4>
                                    <p class="card-text"><?= $news[2] ?></p>
                                    <div class="d-flex justify-content-between align-items-flex-end" style="flex-direction:row-reverse;">
                                        <small class="text-muted" style="margin-right:0;"><a href="deletestock.php?id=<?= $news[0] ?>">Удалить</a></small>
                                        <small class="text-muted" style="margin-right:0;"><a href="updatestock.php?id=<?= $news[0] ?>">Опубликовать</a></small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
                <h4>Опубликованные акции</h4>
                <?php
                require_once('../scripts/connect.php');
                $news = $link->query("SELECT * FROM `stock` WHERE `status` = '1'");
                $news = mysqli_fetch_all($news);
                foreach ($news as $news) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="<?= $news[3] ?>" width="100%" height="600">

                            <div class="card-body">
                                <h4 class="card-text text-center"><?= $news[1] ?></h4>
                                <p class="card-text"><?= $news[2] ?></p>
                                <div class="d-flex justify-content-between align-items-flex-end" style="flex-direction:row-reverse;">
                                    <small class="text-muted" style="margin-right:0;"><a href="deletestock.php?id=<?= $news[0] ?>">Удалить</a></small>
                                    <small class="text-muted" style="margin-right:0;"><a href="disablestock.php?id=<?= $news[0] ?>">Убрать</a></small>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

                <h4 class="mt-5">Добавить акцию</h4>
                <form action="addstock.php" method="POST" enctype="multipart/form-data">
                    <label>Название:</label>
                    <input class="form-control" type="text" name="name" required>
                    <label>Описание:</label>
                    <input type="text" class="form-control" name="info" required>
                    <br>
                    <label>Дата начала:</label>
                    <input type="date" name="sdate" class="form-control" required>
                    <label>Дата конца:</label>
                    <input type="date" name="fdate" class="form-control" required>
                    <input type="file" class="form-control" name="img" multiple accept="image/jpeg,image/png">
                    <br>
                    <button type="submit" class="form-control" style="margin-left:auto;margin-right:auto;width:50%;border:none;color:#000;background-color:#d9f2c7;">Добавить</button>
                </form>
            </div>
    </main>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>