<?php
require_once('connect.php');
$id=$_GET['id'];
session_start();
$title="Удаление товара из корзины";

    if($delete=$link->query("DELETE FROM `korz` WHERE `id` = '$id'")){
        header('Location:../cart.php');
    }
    else{
        echo "Произошла ошибка";
    }
?>