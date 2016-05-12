<?php 
require_once("Cart.class.php");
/**
* User class
*/

class User
{
	public $id;
	public $name;
	private $pseudo;
	public $cart;

	function __construct($id,$name,$pseudo)
	{
		$this->id = $id;
		$this->name = $name;
		$this->pseudo = $pseudo;
		$this->cart = new Cart();
	}
}
?>