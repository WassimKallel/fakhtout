<?php 
/**
* 
*/
class Cart
{
	public $cart_array = array();
	function __construct() {
		
	}

	public addItem($article_id, $quantity) {
		$item = array('item_id' => $article_id, 'quantity' => $quantity);
		array_push($cart_array, $item);
	}
}
 ?>