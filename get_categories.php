<?php 
require ("config.php");
require ("Category.class.php");
function get_categories() {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT * FROM categories');
	$req->execute();
	$categories = array();
	while ($data = $req->fetch()) {
		$category = new Category($data['id'], $data['name']);
		array_push($categories,$category);
	}
	return $categories;
}
?>