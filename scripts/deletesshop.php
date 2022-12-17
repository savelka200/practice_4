<?php
session_start();
require_once('connect.php');
$id=$_SESSION['user']['id'];

$title="Удаление товара из корзины";

    if($delete=$link->query("DELETE FROM `korz` WHERE `user_id` = '$id'")){
        header('Location:../cart.php');
    }
    else{
        echo "Произошла ошибка";
    }
?>