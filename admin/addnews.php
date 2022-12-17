<?php
require_once('../scripts/connect.php');
$theme=$_POST['theme'];
$sod=$_POST['sod'];

$data=$_POST['data'];
$path = '../img/' . time() . $_FILES['img']['name'];
echo $theme, $data, $sod, $path;
if (!move_uploaded_file($_FILES['img']['tmp_name'], '' . $path)) {
echo "Ошибка";
}
else{
$sql = $link->query("INSERT INTO `news` (`id`, `theme`, `sod`,  `data`, `img`) VALUES (NULL,  '$theme', '$sod', '$data', '$path')");
// header('Location: adminnews.php');
}
header('Location: adminnews.php');
?>