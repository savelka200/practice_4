<?php
$pod_id = $_GET['id'];
require_once('../scripts/connect.php');

if($delOrder = mysqli_query($link,"DELETE FROM `orders` WHERE `id` = '$pod_id'")){
    $response = 'Заказ удален';
    header('Location: ../user.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: ../user.php');
}

?>