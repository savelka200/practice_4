<?php
$product_id = $_GET['id'];
require_once('../scripts/connect.php');

if ($delNews = mysqli_query($link, "DELETE FROM `stock` WHERE `id` = '$product_id'")) {
    $response = 'Новость удалена';
    header('Location: adminstock.php');
} else {
    $response = 'Произошла ошибка';
    header('Location: adminstock.php');
}
