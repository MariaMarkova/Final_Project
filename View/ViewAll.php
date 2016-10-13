<?php

namespace View;
use View\HeaderAndNavigation;
require 'HeaderAndNavigation.php';


class ViewAll {
	
	protected $posts;
	
	public function __construct(){
		$this->posts = [];
	}
	
	public function setPosts($post) {
		$this->posts = $post;
		
	}
	
	public function renderShowAll()
	{
		$loadPage = new HeaderAndNavigation();
		
		$loadPage->renderExternals();
		
		echo '<!-- profile -->
				  <link href="assets/css/showallposts.css" rel="stylesheet">
				<!--JS -->
					<link rel="stylesheet" type="text/css" href="assets/css/logIn.css" />';
		
		$loadPage->renderHeader('admin');
		$loadPage->renderNav();
		$this->initPictures();
		$loadPage->renderAssets();
	}
	
	public function initPictures()
	{

		$count = count($this->posts);
		
		for ($i = 0; $i < $count ; $i++)
		{
			$id = $this->posts[$i]['id_post'];
			$title = $this->posts[$i]['title_post'];
			$url = $this->posts[$i]['main_picture'];
			
			echo "	<div class=\"post-div\" style=\"background-image:url(' "   . $url . " ')\" onclick=\"window.location=' " . "index.php?controller=ShowPost&action=showPost&id=" . $id ." '\">
					<a href =' " . "index.php?controller=ShowPost&action=showPost&id=" . $id ." '> $title </a>
					
					
					</div> ";
					
		}
		
		}
}

