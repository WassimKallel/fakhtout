<?php
define ('DB_USER', "root");
define ('DB_PASSWORD', "");
define ('DB_DATABASE', "comercial");
define ('DB_HOST', "localhost");

$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE, DB_USER, DB_PASSWORD);
$db->exec("set names utf8");

?>
