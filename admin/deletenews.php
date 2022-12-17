<?php
$pod_id = $_GET['id'];
require_once('../scripts/connect.php');

if($delNews = mysqli_query($link,"DELETE FROM `news` WHERE `id` = '$pod_id'")){
    $response = 'Новость удалена';
    header('Location: adminnews.php');
}
else{
    $response = 'Произошла ошибка';
    header('Location: adminnews.php');
}

?>