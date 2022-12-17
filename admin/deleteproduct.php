<?php
$product_id = $_GET['id'];
require_once('../scripts/connect.php');

if($delNews = mysqli_query($link,"DELETE FROM `products` WHERE `id` = '$product_id'")){
    $response = 'Новость удалена';
    header('Location: adminproducts.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: adminproducts.php');
}

?>