<?php
include_once('connect.php');
$email = $_POST['email'];
$addEmail = mysqli_query($link,"INSERT INTO `subscribes` (`id`, `email`) VALUES (NULL, '$email')");
header('Location: ../welcome.php');
?>