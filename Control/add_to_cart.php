<?php 
if(empty($_SESSION['user'])) {	
	session_start();
}
require_once("../Model/User.class.php");
function addArticle() {
	if (!isset($_SESSION['user'])) {
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$pos = strrpos($uri,'/');
		$uri = substr($uri,0, $uri - $pos + 1);
		header("Location: http://$host$uri/login.php");
	}
	$user = unserialize($_SESSION['user']);
	if (!empty($_GET['id'])) {
		$user->cart->addItem($_GET['id'],1);
		$_SESSION['user']=serialize($user);
	}
	else {
		$user->cart->addItem($_POST['id'],$_POST['qty']);
		echo 'id '.$_POST['id'];
	}
	$_SESSION['user']=serialize($user);
	print_r($user);
}
addArticle();

$Location = 'Location: ' . $_SERVER['HTTP_REFERER'];
if (strpos($_SERVER['HTTP_REFERER'], '?') !== false) {
    $Location = $Location.'&';
}
else {
	$Location = $Location.'?';
}
if (strpos($_SERVER['HTTP_REFERER'], 'notif=added') == false) {
    $Location = $Location . 'notif=added&';
}
if (strpos($_SERVER['HTTP_REFERER'], 'noshuf=y') == false) {
    $Location = $Location . 'noshuf=y&';
}
if (strpos($Location, 'notif=added') !== false) {
    $Location=str_replace("u=connected","",$Location);
}
if (strpos($Location, 'notif=registered') !== false) {
    $Location=str_replace("u=registered","",$Location);
}

while(substr($Location,-1) == '&') {
		$Location = substr($Location, 0 ,-1);
	}
header($Location);

 ?>