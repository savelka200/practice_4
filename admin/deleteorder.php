<?php
$pod_id = $_GET['id'];
require_once('../scripts/connect.php');

if($delOrder = mysqli_query($link,"UPDATE `orders` SET `status` = 'Заказ отменён' WHERE `id` = '$pod_id")){
    $response = 'Заказ удален';
    header('Location: adminorder.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: adminorder.php');
}

?>