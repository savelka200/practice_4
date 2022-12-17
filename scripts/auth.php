<?php
session_start();
include_once('connect.php');
$login = trim($_POST['login']);
$password = trim($_POST['password']);
if(!empty($login) and !empty($password)){


    $auth = $link->query("SELECT * FROM `users` WHERE `email` = '$login' AND `password` = '$password'");
    $user = mysqli_fetch_assoc($auth);
    $auth = mysqli_num_rows($auth);
    if($auth==1){
        $_SESSION['user'] = [
            "id" => $user['id'],
            "rights" => $user['rights'],
            "basket_token" => $rnd = rand(0,50000000000)
        ];
        header('Location: ../index.php');
    }
    else{
        $_SESSION['response'] = 'Неверный логин или пароль';
        header('Location: ../auth.php');

        echo $response;
    }

}
else{
    $response = "Заполните все поля";
}