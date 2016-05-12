<?php 
require_once('config.php');
require_once('Model/Cart.class.php');
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
	$history = array();
	while ($data = $req->fetch()) {
		$req1 = $db->prepare('SELECT * FROM order_lines where order_id = ?');
		$req1->execute(array($data['id']));
		$cart = new Cart();
			while ($data1 = $req1->fetch()) {
				$cart->addItem($data1['article_id'],$data1['quantity']);
			}
		$entry = array();
		$entry['date']=$data['date'];
		$entry['cart']=$cart;
		array_push($history, $entry);
	}
	return $history;
}
?>
	
