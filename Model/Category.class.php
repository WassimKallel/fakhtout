<?php 
/**
*  Category Class
*/
class Category
{
	public $id;
	public $name;
	
	function __construct($id,$name)
	{
		$this->id = $id;
		$this->name = $name;
	}
}
?>