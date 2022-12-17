<?php
session_start();

if (!empty($_SESSION['user'])) {
    header('Location: /user.php');
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
    <title>Shop</title>
</head>

<body>
    <?php
    require('include/nav.html');
    ?>
    <main>
        <section class="registration__title">
            <h2 class="registration__title-text container">Регистрация</h2>
        </section>
        <section class="registration__forms container">
            <ul class="registration__list">
                <li class="registration__item-form">
                    <form action="scripts/reg.php" method="POST" class="registration__form">
                        <fieldset>
                            <input class="registration__input" id="first-name" type="text" name="name" placeholder="Имя" required>
                            <input class="registration__input" id="last-name" type="text" name="surname" placeholder="Фамилия" required>
                            <input class="registration__input" id="email" type="text" placeholder="Телефон" name="number" required>
                            <input class="registration__input" id="email" type="text" placeholder="Страна" name="country" required>
                            <input class="registration__input" id="email" type="text" placeholder="Город" name="sity" required>
                            <div class="registration__sex">
                                <input class="registration__sex-radio" id="male-sex" name="male" type="radio" value="Мужской">
                                <label class="registration__sex-label" for="male-sex">Мужчина</label>
                                <input class="registration__sex-radio" id="female-sex" name="female" type="radio" value="Женский"> <label class="registration__sex-label" for="female-sex">Женщина</label>
                            </div>
                            <label class="registration__legend">Данные для входа</label>
                            <input class="registration__input" id="email" type="email" placeholder="Email" name="email" required>
                            <input class="registration__input" id="login" type="password" placeholder="Пароль" name="password" required>
                            <p class="registration__form-text">Пожалуйста, используйте 8 или более символов, по крайней
                                мере, с 1 цифрой и смесью прописных и строчных букв.</p>
                            <button class="registration__button" type="submit">Регистрация<svg class="registration__button-arrow" width="17" height="10" viewBox="0 0 17 10" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" d="M11.54 0.208095C11.6058 0.142131 11.684 0.0897967 11.77 0.0540883C11.8561 0.01838 11.9483 0 12.0415 0C12.1347 0 12.2269 0.01838 12.313 0.0540883C12.399 0.0897967 12.4772 0.142131 12.543 0.208095L16.7929 4.458C16.8589 4.5238 16.9112 4.60196 16.9469 4.68802C16.9826 4.77407 17.001 4.86632 17.001 4.95949C17.001 5.05266 16.9826 5.14491 16.9469 5.23097C16.9112 5.31702 16.8589 5.39518 16.7929 5.46098L12.543 9.71089C12.41 9.84389 12.2296 9.91861 12.0415 9.91861C11.8534 9.91861 11.673 9.84389 11.54 9.71089C11.407 9.57788 11.3323 9.39749 11.3323 9.2094C11.3323 9.0213 11.407 8.84091 11.54 8.70791L15.2898 4.95949L11.54 1.21107C11.474 1.14528 11.4217 1.06711 11.386 0.981059C11.3503 0.895005 11.3319 0.802752 11.3319 0.709584C11.3319 0.616415 11.3503 0.524162 11.386 0.438109C11.4217 0.352055 11.474 0.273891 11.54 0.208095Z" />
                                    <path clip-rule="evenodd" d="M0 4.95948C0 4.77162 0.0746263 4.59146 0.207462 4.45862C0.340297 4.32579 0.52046 4.25116 0.708318 4.25116H15.583C15.7708 4.25116 15.951 4.32579 16.0838 4.45862C16.2167 4.59146 16.2913 4.77162 16.2913 4.95948C16.2913 5.14734 16.2167 5.3275 16.0838 5.46033C15.951 5.59317 15.7708 5.6678 15.583 5.6678H0.708318C0.52046 5.6678 0.340297 5.59317 0.207462 5.46033C0.0746263 5.3275 0 5.14734 0 4.95948Z" />
                                </svg>
                            </button>
                        </fieldset>
                    </form>
                </li>
                <li class="registration__item">
                    <h1 class="registration__box-title">У лояльности есть свои преимущества</h1>
                    <p class="registration__box-text">Участвуйте в программе лояльности, где вы можете зарабатывать
                        баллы и получать
                        серьезные льготы. Начиная с
                        того, как только вы присоединитесь:</p>
                    <ul class="registration__box-list">
                        <li class="registration__box-item">Приветственное предложение со скидкой 15%
                        </li>
                        <li class="registration__box-item">Бесплатная доставка, возврат и обмен по всем заказам
                        </li>
                        <li class="registration__box-item">Скидка 25% на покупку в Ваш день рождения

                        </li>
                        <li class="registration__box-item">Ранний доступ к продуктам</li>
                        <li class="registration__box-item">Эксклюзивные предложения и награды</li>
                    </ul>
                </li>
            </ul>
        </section>
    </main>
    <?php
    require('include/footer.html');
    ?>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>