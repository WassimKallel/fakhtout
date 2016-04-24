<?php 
function get_brands() {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT DISTINCT brand FROM articles');
	$req->execute();
	$brands = array();
	while ($brand = $req->fetch()) {
		array_push($brands,$brand);
	}
	return $brands;
}
?>
