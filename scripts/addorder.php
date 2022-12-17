<?php
require_once('connect.php');
session_start();
$user_id=$_SESSION['user']['id'];
$token = $_SESSION['user']['basket_token'];
$adress = $_GET['adress'];
$update=mysqli_query($link,"UPDATE `korz` SET `status` = '1' ,`ord` = '1'  WHERE `user_id` = '$user_id' AND `token` = '$token'");
$all_summ=$_GET['summ'];
$date=date('d-m-y');
$add_trash=mysqli_query($link,"INSERT INTO `orders` (`id`, `user_id`, `all_price`, `status`, `date`, `token`,`adress`) VALUES (NULL, '$user_id', '$all_summ', 'Новый', '$date', '$token', '$adress')");
$_SESSION['user']['basket_token'] = $rnd = rand(0,50000000000);
header('Location: ../cart.php');
?>