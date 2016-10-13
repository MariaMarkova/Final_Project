<?php
namespace View;

require 'HeaderAndNavigation.php';
class UpdatePostView {
	protected  $title;
	protected $year;
	protected $price;
	protected $description;
	protected $pictures;
	protected $postId;
	protected $brand;
	protected $model;
	protected $color;
	protected $km;
	protected $hp;
	
	
	public function __construct($title,$year,$price,$description,$brand,$model,$color,$km,$hp) {
		
		$this->title = $title;
		$this->year = $year;
		$this->price = $price;
		$this->description = $description;
		$this->pictures = [];
		$this->postId = isset($_GET['id']) ? $_GET['id'] : null;
		$this->brand = $brand;
		$this->model = $model;
		$this->color = $color;
		$this->km = $km;
		$this->hp = $hp;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setPictures($array)
	{
		$this->pictures = $array;
	}
	
 	public function renderUpdatePost()
 	{
 		$loadPage = new HeaderAndNavigation();
 		
 		$loadPage->renderExternals();
 		
 		echo ' <!-- profile -->
				  <link href="assets/css/updateposts.css" rel="stylesheet">
				<!--JS -->
					<script type="text/javascript" src="assets/js/validatePost.js"></script>	';
 		
 		$loadPage->renderHeader('admin');
 		$loadPage->renderNav();
 		
 		echo ' <div id="form-div">
					<form enctype=\"multipart/form-data\" method="post"  action="">
 				
					<p id="error_title" class="error">This field is required!</p> 
							<label for="title">Title</label>
						 <input type ="text" name="title" id="title" value =" ' .   htmlentities($this->title, ENT_QUOTES, 'UTF-8') . ' ">
					
						 		<p id="error_brand" class="error">This field is required!</p> 
						 		<label for="brand">Brand</label>
						 <input type ="text" name="brand" id="brand" value =" ' .   htmlentities($this->brand, ENT_QUOTES, 'UTF-8') . ' ">
						 		
						 		<p id="error_model" class="error">This field is required!</p> 
						 <label for="title">Model</label>
						 <input type ="text" name="model" id="model" value =" ' .   htmlentities($this->model, ENT_QUOTES, 'UTF-8') . ' ">
						 		
						 		<p id="error_color" class="error">This field is required!</p> 
						 <label for="title">Color</label>
						 <input type ="text" name="color" id="color" value =" ' .   htmlentities($this->color, ENT_QUOTES, 'UTF-8') . ' ">
						 		
						 		<p id="error_km" class="error">This field is required!</p> 
						 		<p id="error_km_num" class="error">Field must be numeric!</p>
						 		<label for="km">Kilometres</label>
						 		<input type ="text" name="km" id="km" value =" ' .   htmlentities($this->km, ENT_QUOTES, 'UTF-8') . ' ">
						 
						 		<p id="error_hp" class="error">This field is required!</p> 
						 		<p id="error_hp_num" class="error">Field must be numeric!</p>
						 <label for="hp">Horse Power</label>
						 <input type ="text" name="hp" id="hp" value =" ' .   htmlentities($this->hp, ENT_QUOTES, 'UTF-8') . ' ">
						 		
						 
						 <p id="error_year" class="error">This field is required!</p> 
						 		<p id="error_year_valid" class="error">Year is not valid</p> 	
							<p id="error_year_num" class="error">Field must be numeric!</p> 	
						  <label for="year">Year</label>
						 <input type ="text" name="year" id="year" value = " ' .   htmlentities($this->year, ENT_QUOTES, 'UTF-8') . ' ">
						 		
						
						 <p id="error_price" class="error">This field is required!</p>
						<p id="error_price_num" class="error">Field must be numeric!</p>
						  <label for="price">Price</label>
						 <input type ="text" name="price" id="price" value =" '. htmlentities ( $this->price, ENT_QUOTES, 'UTF-8' ) . ' ">
						 		
						  <label for="description">Description</label>
						 <textarea  name="description" id="description"> ' .htmlentities($this->description, ENT_QUOTES, 'UTF-8') . '</textarea>
						 <!--
						 	 <label for="Files">Add Pics</label>
						 
						 <input type=\"file\" name=\"file[]\" id=\"fileField\" multiple=\"multiple\"/>
						 		-->
							<button id= "send-button" type="submit">Send</button>
							</form> ';
 		
 		$loadPage->renderAssets();
 	}
}