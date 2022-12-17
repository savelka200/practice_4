<?php
require_once('../scripts/connect.php');
$name = $_POST['name'];
$info = $_POST['info'];
$sdate = $_POST['sdate'];
$fdate = $_POST['fdate'];
$path = '../img/' . time() . $_FILES['img']['name'];
if (!move_uploaded_file($_FILES['img']['tmp_name'], '' . $path)) {
    echo "Ошибка";
} else {
    $sql = $link->query("INSERT INTO `stock` (`id`, `name`, `description`, `image`, `status`, `sdate`, `fdate`) VALUES (NULL, '$name', '$info', '$path', '0', '$sdate', '$fdate')");
    header('Location: adminstock.php');
}
