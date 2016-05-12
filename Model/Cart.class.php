<?php 
/**
* 
*/
class Cart
{
	public $cart_array = array();
	function __construct() {
		$this->cart_array = array();
	}

	function addItem($article_id, $quantity) {
		//echo ('id'.$article_id. ' qty '.$quantity);
		$itemToAdd = array('item_id' => $article_id, 'quantity' => $quantity);
		$check = false;
		foreach ($this->cart_array as $i => $item) {
			if($item['item_id'] == $article_id) {
				$this->cart_array[$i]['quantity'] = intval($this->cart_array[$i]['quantity']) + intval($quantity);
				$check = true ;
			}
		}
		if($check == false) {
			array_push($this->cart_array, $itemToAdd);
		}	

	}

	function removeItem($article_id,$all = false) {
		if ($all == true)
		{
			foreach ($this->cart_array as $i => $item) {
				if($item['item_id'] == $article_id) {
					unset($this->cart_array[$i]);
				}
			}
		}
		else {
			foreach ($this->cart_array as $i => $item) {
				if($item['item_id'] == $article_id) {
					if($this->cart_array[$i]['quantity'] !== 1) {
							$this->cart_array[$i]['quantity'] = intval($this->cart_array[$i]['quantity']) - 1;
					}
					else {
						unset($this->cart_array[$i]);
					}
				}
			}
		}
	}
}


?>