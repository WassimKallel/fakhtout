<?php 
require_once("../config.php");
require_once("../Model/User.class.php");

function signup() {
	if ( preg_match('/\s/',$_POST['pseudo']) ) {
		return 4;
	}
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}

	$check = $db->prepare("SELECT * FROM users WHERE pseudo = ?");
	$check->execute(array($_POST['pseudo']));
	$data = $check->fetch();
	if (!empty($data)) 
		return 3;
	else {
		$req = $db->prepare("INSERT INTO users(pseudo,name,password) VALUES (?,?,?)");
		$req->execute(array($_POST['pseudo'],$_POST['name'],$_POST['password']));
		require_once 'login.php';
		login();
		return 0;
	}
}

$err=signup();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$pos = strrpos($uri,'/');
$uri = substr($uri,0, $uri - $pos + 1);
if ($err == 0) {
	header("Location: http://$host$uri/index.php?u=new");
}
else {
	header("Location: http://$host$uri/login.php?err=$err");
}
?>
