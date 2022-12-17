<?php
$pod_id = $_GET['id'];
require_once('../scripts/connect.php');

if($delNews = mysqli_query($link,"DELETE FROM `feedback` WHERE `id` = '$pod_id'")){
    $response = 'Подписка удалена';
    header('Location: admincomment.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: admincomment.php');
}

?>