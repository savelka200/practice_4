<?php
session_start();
if (!empty($_SESSION)) {
    header('Location: /');
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
    <title>Авторизация</title>
</head>

<body>
    <?php
    require('include/nav.html');
    ?>
    <div class="container" style="height:100vh;display:flex;justify-content:center; align-items:center;">
        <h1>Поздравляем вы успешно оформили подписку</h1>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>