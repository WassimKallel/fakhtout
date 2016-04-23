<?php 
require ("config.php");
require ("Article.class.php");
function get_articles($id_cat) {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT * FROM articles where id_cat = ?');
	$req->execute(array($id_cat));
	$articles = array();
	while ($data = $req->fetch()) {
		$article = new Article($data['id'], $data['id_cat'], $data['name'], $data['description'], $data['brand'], $data['price']);
		array_push($articles,$article);
	}
	return $articles;
}
?>