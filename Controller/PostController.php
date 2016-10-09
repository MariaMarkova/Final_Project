<?php

namespace Controller;
var_dump($_POST);
$title = isset($_POST['title']) ? $_POST['title'] : "";

echo $title;
use Model\Post;
use Dao\PostDao;
use View\MakePost;
require '..\Model/Post.php';
require '..\Dao\PostDao.php';
require '..\View\MakePost.php';

class PostController
{
	public function makePost()
	{
		
		$view = new MakePost();
		$view->render();
		
		$errors = [];
			$title = isset($_POST['title']) ? $_POST['title'] : "";
			$year = isset($_POST['year']) ? $_POST['year'] : "";
			$price = isset($_POST['price']) ? $_POST['price'] : "";
			$description = isset($_POST['description']) ? $_POST['description'] : "" ;
			//da validiram 
			
			$post = new Post($title, $year, $price, $description);
			$post->setPictures($this->manageFiles());
			
			$resultPost = PostDao::addPost($post);
			$resultPic = PostDao::addPictures($post->getPictures(), $post->getId());
			//send notification funct here
			
			
	}
	
	public function manageFiles()
	{
		if(!is_dir('../assets/images')){
			if(!@mkdir('../assets/images')) {
				throw new Exception('Cant make directory');
			}
		}
		
		if(isset($_FILES['file'])) {
		$filesCount = count($_FILES['file']['tmp_name']);
		}else {
			$filesCount = 0;
		}
	
		$images = [];
		
		for($i = 0; $i < $filesCount ; $i++)
		{
			$fileName = str_replace(' ' , '_' , $_FILES['file']['name'][$i]);
		
			$dest =   '../assets/images/' . $fileName;
			$path = 'assets/images/' . $fileName;
			$images[] = $path;
			$currentFile =  $_FILES['file']['tmp_name'][$i];
		
			move_uploaded_file($currentFile, $dest);
			
				
			}
	return $images;
	}
}


$control = new PostController();

$control->makePost();


