<?php

require_once('connect.php');

$textComment = $_POST['text'];
$user = $_GET['id'];
$date = date('d.m.y');


if($addComment = mysqli_query($link,"INSERT INTO `feedback` (`id`, `userid`, `text`, `date`, `agreement`) VALUES (NULL, '$user', '$textComment', '$date', '0')")){

    header("Location: ../comment.php ");

}
else{

    
    $response = 'Произошла ошибка';
    echo $response;
    header('Location: ../comment.php');


}
header('Location: ../comment.php');
?>