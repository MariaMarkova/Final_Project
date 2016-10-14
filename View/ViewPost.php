<?php

namespace View;
use View\HeaderAndNavigation;

require 'HeaderAndNavigation.php';

class ViewPost 
{
	protected $title;
	protected $price;
	protected $description;
	protected $year;
	protected $pictures;
	protected $brand;
	protected $model;
	protected $color;
	protected $km;
	protected $hp;
	
	public function __construct($title,$price,$description,$year,$brand,$model,$color,$km,$hp)
	{
		$this->title = $title;
		$this->price = $price;
		$this->description = $description;
		$this->year = $year;
		$this->pictures = [];
		$this->brand = $brand;
		$this->model = $model;
		$this->color = $color;
		$this->km = $km;
		$this->hp = $hp;
		
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setPictures($array)
	{
		$this->pictures = $array;
	}
	
	public function renderViewPost()
	{
		
		$loadPage = new HeaderAndNavigation();
		$loadPage->renderExternals();
		
		echo '<!-- profile -->
				  <link href="assets/css/posts.css" rel="stylesheet">
				<!--JS -->
					<link rel="stylesheet" type="text/css" href="assets/css/logIn.css" />';
		
		$loadPage->renderHeader('admin');
		$loadPage->renderNav();
		echo '	<div class="post-but-div">
				<a  href="index.php?controller=UpdateFile&action=showUpdate&id='.$_GET['id'] . ' "  class="post-but-a" >Update Post</a>
				</div>';
		echo '<div class="post-but-div">
				<a  href="#"  class="post-but-a" >Mark as sold</a>
				</div>';
		
		echo '
				        <div id="page-wrapper">
		
				            <div class="container-fluid">
		
								<div class="wrapper-post-info">
								    	<h2 id="show-post-header">' .htmlentities($this->title, ENT_QUOTES, 'UTF-8') . '</h2>
								    	
								    			<h4 class="post-label" >Brand</h4>
										<p class ="show-post-content">' . htmlentities($this->brand, ENT_QUOTES, 'UTF-8') . '</p>
												
										<h4 class="post-label" >Model</h4>
										<p class ="show-post-content">' . htmlentities($this->model, ENT_QUOTES, 'UTF-8') . '</p>
										
										<h4 class="post-label" >Color</h4>
										<p class ="show-post-content">' . htmlentities($this->color, ENT_QUOTES, 'UTF-8') . '</p>
												
										<h4 class="post-label" >Kilometres</h4>
										<p class ="show-post-content">' . htmlentities($this->km, ENT_QUOTES, 'UTF-8') . '</p>
										
										<h4 class="post-label" >HP</h4>
										<p class ="show-post-content">' . htmlentities($this->hp, ENT_QUOTES, 'UTF-8') . '</p>
										
										<h4 class="post-label" >Year of manufacture</h4>
										<p class ="show-post-content">' . htmlentities($this->year, ENT_QUOTES, 'UTF-8') . '</p>
												
										<h4 class="post-label" >Price</h4>
										<p class ="show-post-content">' . htmlentities($this->price, ENT_QUOTES, 'UTF-8') . '</p>
												
										<h4 class="post-label" >Description</h4>
										<p class ="show-post-content">' . htmlentities($this->description, ENT_QUOTES, 'UTF-8') . '</p> 
										
										
										
		
											
								</div>
				            </div>
		
				        </div>
												<h3 id="pic-h">Pictures</h6>
				        <!-- /#page-wrapper -->';
		
		$this->renderPictures();
		$loadPage->renderAssets();
		
		
		
	
		
	}
// 	public function render($data)
// 	{
// 		$title = $data['postInfo']['title_post'];
// 		$price = $data['postInfo']['price'];
// 		$description = $data['postInfo']['description_post'];
// 		$year = $data['postInfo']['year_of_manufacture'];
		
// 		echo "<h1> Prodavam $title </h1>" . PHP_EOL ;
// 		echo "<p> $year proizvedena  </p> ". PHP_EOL ;
// 		echo "<p> description : $description  </p> ". PHP_EOL ;
// 		echo "<p> CENA: $price  </p> ". PHP_EOL ;
		
		
// 		$count = count($data['pictures']);
		
		
// 		for($i = 0; $i < $count ; $i++)
// 		{
// 			echo "<img src= ' "   . $data['pictures'][$i]['url_pic'] . " '  height ='130' .
// 					width='150' . />" . PHP_EOL;
// 		}
// 	}
	
	public function renderPictures()
	{
		$count =  count($this->pictures);
		for($i = 0; $i < $count; $i++ ) {
			echo "<img class=\"post-pics\" src= ' "  . $this->pictures[$i]['url_pic'] . " ' . />" . PHP_EOL;
			
		}
	}
}