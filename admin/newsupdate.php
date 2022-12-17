<?php
session_start();
$userId = $_GET['id'];
require('../scripts/connect.php');
$title = $_POST['title'];
$text = $_POST['text'];
$date = $_POST['date'];
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    
    return $value;
}
$title =clean($title);
$text =clean($text);
$date =clean($date);
$path = '../img/' . time() . $_FILES['image']['name'];
if (!move_uploaded_file($_FILES['image']['tmp_name'], '' . $path)) {
    $userUpdate = $link->query("UPDATE `news` SET `theme` = '$title', `sod` = '$text', `data` = '$date' WHERE `news`.`id` = '$userId';");
    header('Location: adminnews.php');

}
else{
    $userUpdate = $link->query("UPDATE `news` SET `theme` = '$title', `sod` = '$text', `data` = '$date', `img` = '$path' WHERE `news`.`id` = '$userId';");
    header('Location: adminnews.php');
}