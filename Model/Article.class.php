<?php 
/**
* Article Class
*/
class Article 
{
	public $id;
	private $category;
	private $name;
	public $description;
	private $brand;
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