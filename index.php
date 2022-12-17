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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Главная</title>
</head>

<body>

    <?php
    require('include/nav.html');
    ?>
    <main>
        <section class="brand">
            <div class="brand__title-container">
                <h1 class="brand__title"><code>Market_place </code></span></h1>
            </div>
        </section>
        <hr class="featurette-divider">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Таким образом, постоянный количественный рост и сфера. <span class="text-danger"></span></h2>
                    <p class="lead">Есть над чем задуматься: элементы политического процесса и по сей день остаются уделом либералов, которые жаждут быть описаны максимально подробно. Есть над чем задуматься: активно развивающиеся страны третьего мира лишь добавляют фракционных разногласий и разоблачены.</p>
                </div>
                <div class="col-md-5">
                    <img src="http://g02.a.alicdn.com/kf/HTB1sm.MLXXXXXbXXXXXq6xXFXXXI/5-0-Unlocked-Android-4-4-MTK6572-Dual-Core-Mobile-Phone-512MB-RAM-4GB-ROM-WCDMA.jpg" width="500px" height="500px" alt="wws">

                </div>
            </div>
            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Но понимание сути ресурсосберегающих технологий играет определяющее <span class="text-danger"></span></h2>
                    <p class="lead">Картельные сговоры не допускают ситуации, при которой сделанные на базе интернет-аналитики выводы формируют глобальную экономическую сеть и при этом — объединены в целые кластеры себе подобных. Мы вынуждены отталкиваться от того, что современная методология разработки, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для распределения внутренних резервов и ресурсов. Для современного мира курс на социально-ориентированный национальный проект напрямую зависит от направлений прогрессивного развития. Каждый из нас понимает очевидную вещь: глубокий уровень погружения является качественно новой ступенью поставленных обществом задач.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="https://pto-shop.ru/wp-content/uploads/4/5/e/45e2c48a838059f932d47a62b34a841a.jpeg" width="500px" height="500px" alt="wws">

                </div>
            </div>
        </div>
    </main>
    <?php
    require('include/footer.html');
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>