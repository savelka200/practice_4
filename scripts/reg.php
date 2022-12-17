<?php
require_once('connect.php');
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];
$country = $_POST['country'];
$sity = $_POST['sity'];
if(!empty($_POST['male'])){
$pol = $_POST['male'];
}
else{
$pol = $_POST['female'];
}
$addUser = $link->query("INSERT INTO `users` (`id`, `name`, `number` ,`surname`, `pol`, `email`, `password`, `rights`, `avatar`, `country`, `sity`) VALUES (NULL, '$name','$number', '$surname',  '$pol', '$email', '$password', '0', 'img/crown.png', '$country','$sity')");


header('Location: ../index.php');
?>