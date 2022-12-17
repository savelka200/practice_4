<?php
$user = 'sav';
$password = '123';
$db_name = 'market_place';
$host = 'practice.local';

$link = new mysqli($host,$user,$password,$db_name);
$link->set_charset('utf8');


?>