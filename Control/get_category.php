<?php 
require_once ('Model/Category.class.php');
require_once ('config.php');
function get_category($id) {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT * FROM categories WHERE id = ?');
	$req->execute(array($id));
	while ($data = $req->fetch()) {
		$category = new Category($data['id'], $data['name']);
	}
	if (isset($category))
		return $category;
	else return null;
}
?>