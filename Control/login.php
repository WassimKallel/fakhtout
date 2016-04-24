<?php 
require ("config.php");
require ("User.php");

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
	if (empty($data))
	{
		$err = 1;
	}
	else {
		if($data['password'] ==  $_POST['password']) {
			$err = 0;
			$user = new User($data['id'],$data['name'],$data['pseudo']);
			session_start();
			$_SESSION['user'] = serialize($user);

		}
		else {
			$err = 2;
		}
	}
	return $err;	
}

$err = login();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
header("Location: http://$host$uri?err=$err");
?>