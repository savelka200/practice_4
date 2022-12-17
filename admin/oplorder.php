<?php
$pod_id = $_GET['id'];
require_once('../scripts/connect.php');

if($delOrder = mysqli_query($link,"UPDATE `orders` SET `status` = 'Заказ оплачен' WHERE `id` = '$pod_id'")){
    $response = 'Заказ оплачен';
    header('Location: adminorder.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: adminorder.php');
}

?>