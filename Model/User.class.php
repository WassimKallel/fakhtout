<?php 
/**
* User class
*/
class User
{
	private $id;
	public $name;
	private $pseudo;
	function __construct($id,$name,$pseudo)
	{
		$this->id = $id;
		$this->name = $name;
		$this->pseudo = $pseudo;
	}
}
?>