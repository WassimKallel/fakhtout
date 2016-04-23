<?php 
/**
* Article Class
*/
class Article 
{
	private $id;
	private $category;
	private $name;
	private $description;
	private $brand;
	private $price;

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