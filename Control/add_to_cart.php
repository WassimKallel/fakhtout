<?php 

session_start();
require_once("../Model/User.class.php");
function addArticle() {
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
while(substr($Location,-1) == '&') {
		$Location = substr($Location, 0 ,-1);
	}
header($Location);

 ?>