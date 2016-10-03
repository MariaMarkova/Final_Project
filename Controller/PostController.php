<?php

namespace Controller;
var_dump($_POST);
$title = isset($_POST['title']) ? $_POST['title'] : "";

echo $title;
use Model\Post;
require '..\Model/Post.php';
class PostController
{
	public function makePost()
	{
		
		$errors = [];
			$title = isset($_POST['title']) ? $_POST['title'] : "";
			$year = isset($_POST['year']) ? $_POST['year'] : "";
			$price = isset($_POST['price']) ? $_POST['price'] : "";
			$description = isset($_POST['description']) ? $_POST['description'] : "" ;
			//da validiram 
			
			$post = new Post($title, $year, $price, $description);
			$post->setPictures($this->manageFiles());
			
			
			return $post;
		
	}
	
	public function manageFiles()
	{
		if(!is_dir('images')){
			if(!@mkdir('images')) {
				throw new Exception('Cant make directory');
			}
		}
		
		$filesCount = count($_FILES['file']['tmp_name']);
		$images = [];
		
		for($i = 0; $i < $filesCount ; $i++)
		{
			$fileName = str_replace(' ' , '_' , $_FILES['file']['name'][$i]);
		
			$dest =  __DIR__ . '/images/' . $fileName;
			$path = 'images/' . $fileName;
			$images[] = $dest;
			$currentFile =  $_FILES['file']['tmp_name'][$i];
		
			move_uploaded_file($currentFile, $dest);
			
				
			}
	return $images;
	}
}


$control = new PostController();

$control->makePost();

print_r($control->makePost());
