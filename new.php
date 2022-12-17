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

  <title>Новости</title>
</head>

<body>
  <?php
  require('include/nav.html');
  ?>
  <main>
    <div class="container mt-5">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
  require_once('scripts/connect.php');
  $news = $link->query("SELECT * FROM `news`");
  $news = mysqli_fetch_all($news);
  foreach($news as $news){
    ?>
  <div class="col">
    <div class="card shadow-sm">
      <img class="bd-placeholder-img card-img-top" src="<?=$news[4]?>"width="100%" height="225" >

      <div class="card-body">
        <h4 class="card-text text-center"><?=$news[1]?></h4>
        <p class="card-text"><?=$news[2]?></p>
        <div class="d-flex justify-content-between align-items-flex-end" style="flex-direction:row-reverse;">
          <small class="text-muted" style="margin-right:0;"><?=$news[3]?></small>
        </div>
      </div>
    </div>
  </div>
 <?php
 }
 ?>
      </div>
    </div>
  </main>


  <?php
  require('include/footer.html');
  ?>
  <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>