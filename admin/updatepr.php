<?php
session_start();
$userId = $_GET['id'];
require('../scripts/connect.php');
$name = $_POST['name'];
$price = $_POST['price'];
$opis = $_POST['opis'];
function clean($value = "")
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}
$name = clean($name);
$price = clean($price);
$opis = clean($opis);
$path = '../img/' . time() . $_FILES['image']['name'];
if (!move_uploaded_file($_FILES['image']['tmp_name'], '' . $path)) {
    $userUpdate = $link->query("UPDATE `products` SET `name` = '$name',`price` = '$price', `opis` = '$opis' WHERE `products`.`id` = '$userId';");
    header('Location: adminproducts.php');
} else {
    $userUpdate = $link->query("UPDATE `products` SET `name` = '$name',`price` = '$price', `opis` = '$opis', `image` = '$path' WHERE `products`.`id` = '$userId';");
    header('Location: adminproducts.php');
}
