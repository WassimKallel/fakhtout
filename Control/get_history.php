<?php 
function get_history($user_id) {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT * FROM orders where user_id = ?');
	$req->execute(array($user_id));
	while ($data = $req->fetch()) {
		
	}
}
?>
	
