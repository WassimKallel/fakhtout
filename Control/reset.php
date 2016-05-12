<?php 
require_once('../Model/Cart.class.php');
require_once('../Model/User.class.php');
session_start();

$user = unserialize($_SESSION['user']);
unset($user->cart->cart_array);
$_SESSION['user']= serialize($user);


$Location = 'Location: ' . $_SERVER['HTTP_REFERER'];

if (strpos($Location, 'notif=added') !== false) {
    $Location=str_replace("notif=added","",$Location);
}
$Location = rtrim($Location,'&');
while(substr($Location,-1) == '&') {
		$Location = substr($Location, 0 ,-1);
	}
header($Location);
?>
