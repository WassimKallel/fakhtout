<?php 
/**
* Article Class
*/
class Article 
{
	public $id;
	public $category;
	public $name;
	public $description;
	public $brand;
	public $price;

	function __construct($id, $category, $name, $description, $brand, $price)
	{
		$this->id = $id;
		$this->category = $category;
		$this->name = $name;
		$this->description = $description;
		$this->brand = $brand;
		$this->price = $price;
	}
}
?>