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
    <title>Панель администратора</title>
</head>

<body>

    <main>
        <section class="registration__title">
            <h2 class="registration__title-text container">Панель администратора</h2>
            <?php
            require_once('../include/adminnav.html');
            ?>
        </section>
        <section class="eg">
            <h4>Вы попали на панель админстратора</h4>
        </section>
    </main>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>