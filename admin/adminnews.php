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
    <title>Новости</title>
</head>

<body>

    <main>
    <section class="registration__title">
    <h2 class="registration__title-text container">Список Новостей</h2>
<?php
require_once('../include/adminnav.html');
?>
        
        <div class="container">
        <h2 class="mt-5 text-center">Список новостей</h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-5">
  <?php
  require_once('../scripts/connect.php');
  $news = $link->query("SELECT * FROM `news`");
  $news = mysqli_fetch_all($news);
  foreach($news as $news){
    ?>
  <div class="col">
    <div class="card shadow-sm">
      <img class="bd-placeholder-img card-img-top" src="<?=$news[4]?>"width="auto" height="auto" >

      <div class="card-body">
        <h4 class="card-text text-center"><?=$news[1]?></h4>
        <p class="card-text"><?=$news[2]?></p>
        <div class="d-flex justify-content-between align-items-flex-end" style="flex-direction:row-reverse;">
          <small class="text-muted" style="margin-right:0;"><?=$news[3]?></small>
          <small class="text-muted" style="margin-right:0;"><a href="deletenews.php?id=<?=$news[0]?>">Удалить новость</a></small>
          <small class="text-muted" style="margin-right:0;"><a href="updatenews.php?id=<?=$news[0]?>">Редактировать новость</a></small>

        </div>
      </div>
    </div>
  </div>
 <?php
 }
 ?>
  </div>
            <h4 class="mt-5">Добавить новость</h4>
        <form action="addnews.php" method="POST" enctype="multipart/form-data">
        <label>Тема:</label>
        <input class="form-control" type="text" name="theme" required>
        <label>Содержание:</label>
        <input type="text" class="form-control" name="sod" required>
        <label>Автор:</label>
        <input type="text" name="author" class="form-control" required>
        <label>Дата публикации:</label>
        <input type="date" name="data" class="form-control" required>
        <br>
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