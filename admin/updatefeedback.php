<?php
session_start();
$feedbackId = $_GET['id'];
require('../scripts/connect.php');
$status = $_GET['status'];
if($status>-1){
    $feedbackUpdate = $link->query("UPDATE `feedback` SET `agreement` = '$status' WHERE `feedback`.`id` = '$feedbackId';");
    header('Location: admincomment.php');

}
elseif($status==='delete'){
    $deleteFeedback = $link->query("DELETE FROM `feedback` WHERE `feedback`.`id` = '$feedbackId'");
    header('Location: admincomment.php');
}