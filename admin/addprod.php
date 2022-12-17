<?php
require_once('../scripts/connect.php');
$name = $_POST['name'];
$price = $_POST['price'];
$opis = $_POST['opis'];
$category = $_POST['category'];


$path = '../img/' . time() . $_FILES['img']['name'];
if (!move_uploaded_file($_FILES['img']['tmp_name'], '' . $path)) {
    echo "Ошибка";
} else {
    $sql = $link->query("INSERT INTO `products` (`id`, `name`,`opis`, `price`,  `image` , `category`) VALUES (NULL,  '$name','$opis', '$price', '$path', '$category')");
    header('Location: adminproducts.php');
}
