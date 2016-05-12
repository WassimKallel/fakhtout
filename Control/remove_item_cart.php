<?php 
require_once('../Model/Cart.class.php');
require_once('../Model/User.class.php');
session_start();
$user = unserialize($_SESSION['user']);
if(!empty($_GET['all'])) {
	$user->cart->removeItem($_GET['del'],true);
}
else {
	$user->cart->removeItem($_GET['del']);
}
$_SESSION['user']= serialize($user);



$Location = 'Location: ' . $_SERVER['HTTP_REFERER'];
if (strpos($_SERVER['HTTP_REFERER'], '?') !== false) {
    $Location = $Location.'&';
}
else {
	$Location = $Location.'?';
}
if (strpos($Location, 'notif=added') !== false) {
    $Location=str_replace("notif=added","notif=removed",$Location);
}
while(substr($Location,-1) == '&') {
		$Location = substr($Location, 0 ,-1);
	}

header($Location);

?>