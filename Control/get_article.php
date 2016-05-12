<?php 
require_once ("config.php");
require_once ("Model/Article.class.php");
function get_article($id) {
	try
	{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USER, DB_PASSWORD);
    }
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}
	$req = $db->prepare('SELECT * FROM articles where id = ?');
	$req->execute(array($id));
	while ($data = $req->fetch()) {
		$article = new Article($data['id'], $data['id_cat'], $data['name'], $data['description'], $data['brand'], $data['price']);
	}
	if (isset($article))
		return $article;
	return null;
}
?>