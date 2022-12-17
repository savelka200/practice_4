<?php
session_start();
$userId = $_GET['id'];
require('connect.php');
$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$email = $_POST['email'];
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}
$name =clean($name);
$surname =clean($surname);
$number =clean($number);
$email =clean($email);
$path = '../img/' . time() . $_FILES['avatar']['name'];
if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '' . $path)) {
    $userUpdate = $link->query("UPDATE `users` SET `name` = '$name',`surname` = '$surname', `number` = '$number', `email` = '$email'  WHERE `users`.`id` = '$userId';");
    header('Location: ../user.php');

}
else{
    $userUpdate = $link->query("UPDATE `users` SET `name` = '$name',`surname` = '$surname', `number` = '$number', `email` = '$email' , `avatar` = '$path' WHERE `users`.`id` = '$userId';");
    header('Location: ../user.php');
}