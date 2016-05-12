<?php 
require_once("../config.php");
require_once("../Model/User.class.php");
session_start();
$user = unserialize($_SESSION['user']);
try
{
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$req = $db->prepare("INSERT INTO orders (user_id , date) VALUES (?, NOW());");
$req->execute(array(intval($user->id)));
$order_id = $db->lastInsertId();
foreach ($user->cart->cart_array as $i => $item) {
	var_dump($item);
	$req = $db->prepare("INSERT INTO order_lines (order_id , article_id, quantity) VALUES (?,?,?);");
	$req->execute(array($order_id,$item['item_id'],$item['quantity']));
}
require_once('reset.php');
resetcheck();
$err = login();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$pos = strrpos($uri,'/');
$uri = substr($uri,0, $uri - $pos + 1);
header("Location: http://$host$uri/index.php?u=connected");

?>