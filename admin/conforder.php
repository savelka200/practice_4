<?php
$pod_id = $_GET['id'];
$status = $_GET['status'];
require_once('../scripts/connect.php');

if($delOrder = mysqli_query($link,"UPDATE `orders` SET `status` = $status WHERE `id` = '$pod_id'")){
    $response = 'Заказ оплачен';
    header('Location: adminorder.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: adminorder.php');
}

?>