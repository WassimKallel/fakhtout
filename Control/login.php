<?php 
require_once("../config.php");
require_once("../Model/User.class.php");

function login() {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	    die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
	$req->execute(array($_POST['pseudo']));
	$data = $req->fetch();
	$password = trim($_POST['password']);
	$password1 = trim($data['password']);
	if (empty($data))
	{
		$err = 1;
	}
	else {
		var_dump($password);
		var_dump($password1);
		if($password1 != $password) {
			$err = 2;
		}
		else {
			$err = 0;
			$user = new User($data['id'],$data['name'],$data['pseudo']);
			session_start();
			$_SESSION['user'] = serialize($user);
		}
	}
	return $err;	
}

$err = login();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$pos = strrpos($uri,'/');
$uri = substr($uri,0, $uri - $pos + 1);
if ($err == 0) {
	header("Location: http://$host$uri/index.php?u=connected");
}
else {
	header("Location: http://$host$uri/login.php?err=$err");
}
?>