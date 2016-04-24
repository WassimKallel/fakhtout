<?php 
/**
*  Category Class
*/
class Category
{
	private $id;
	public $name;
	
	function __construct($id,$name)
	{
		$this->id = $id;
		$this->name = $name;
	}
}
?>