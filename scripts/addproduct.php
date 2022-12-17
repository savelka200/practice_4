<?php
require_once('connect.php');
session_start();
$product_id=$_GET['id'];
$token = $_SESSION['user']['basket_token'];
$user_id=$_SESSION['user']['id'];
$price=$_GET['price'];
$date=date('d-m-y');
$add_trash=$link->query("INSERT INTO `korz` (`id`,`user_id`,`product_id`,`date`,`price`,`ord`, `token`) VALUE (NULL,'$user_id','$product_id','$date', '$price','0', '$token')");
header("Location: ../catalog.php");
?>
