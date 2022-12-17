<?php
session_start();
if (empty($_SESSION)) {
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
        <div class="container mt-5 mb-5">
            <h4>Редактирование профиля</h4>
            <?php
            require_once('scripts/connect.php');
            $userId = $_SESSION['user']['id'];
            $user = $link->query("SELECT * FROM `users` WHERE `id` = '$userId'");
            $user = mysqli_fetch_all($user);
            foreach ($user as $user) {
            ?>
                <form action="scripts/updateuser.php?id=<?= $userId ?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="name" class="form-control mt-3" placeholer="Имя" value="<?= $user[1] ?>">
                    <input type="text" name="surname" class="form-control mt-3" placeholer="Имя" value="<?= $user[2] ?>">
                    <input type="text" name="number" class="form-control mt-3" placeholer="Имя" value="<?= $user[5] ?>">
                    <input type="text" name="email" class="form-control mt-3" placeholer="Имя" value="<?= $user[4] ?>">
                    <input type="file" class="form-control mt-3" name="avatar" multiple accept="image/jpeg,image/png">
                    <input type="submit" class="update mt-3" style="border:none; display:flex;justify-content:center;align-items:center; margin-left:auto;margin-right:auto;" value="Изменить">

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