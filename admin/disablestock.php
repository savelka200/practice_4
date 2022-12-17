<?php
session_start();
require('../scripts/connect.php');
$feedbackId = $_GET['id'];
$feedbackUpdate = $link->query("UPDATE `stock` SET `status` = '0' WHERE `stock`.`id` = '$feedbackId';");
header('Location: adminstock.php');
