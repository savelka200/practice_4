<?php
session_start();
if(empty($_SESSION)){
    header('Location: /');
}
if($_SESSION['user']['rights']==0){
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
    <title>Новость</title>
</head>

<body>
    <main>
    <section class="registration__title">
    <h2 class="registration__title-text container">Товары</h2>
    <?php
require_once('../include/adminnav.html');
?>
        
        <div class="container">
        <h4>Редактирование новости</h4>
           <?php
           require_once('../scripts/connect.php');
           $productId = $_GET['id'];
           $user = $link->query("SELECT * FROM `news` WHERE `id` = '$productId'");
           $user = mysqli_fetch_all($user);
           foreach($user as $user){
               ?>
               <form action="newsupdate.php?id=<?=$productId?>" method="post" enctype="multipart/form-data">
               <img src="<?=$user[4]?>" width="300px" height="300px" alt="image">
        <input type="text" name="title" class="form-control mt-3" placeholer="Имя" value="<?=$user[1]?>">
        <input type="text" name="text" class="form-control mt-3" placeholer="Имя" value="<?=$user[2 ]?>">
        <input  type="text" name="date" class="form-control mt-3" placeholer="Имя" value="<?=$user[3]?>">
        <input type="file" class="form-control mt-3" name="image" multiple accept="image/jpeg,image/png"> 
        <input type="submit" class="update mt-3" style="border:none; display:flex;justify-content:center;align-items:center; margin-left:auto;margin-right:auto;" value="Изменить">
        
    </form>
    <?php
           }
           ?>
           </div>
    </main>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>