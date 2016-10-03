<?php
namespace Model;

class Post
{
	protected $title;
	protected $year;
	protected $price;
	protected $description;
	protected $pictures;
	
	public function __construct($title,$year,$price,$description)
	{
		$this->title = $title;
		$this->year = $year;
		$this->price = $price;
		$this->description = $description;
		$this->pictures = [];
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getYear()
	{
		return $this->year;
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function getPictures()
	{
		return $this->pictures;
	}
	
	public function setPictures($array)
	{
		$this->pictures = $array;
	}
}