<?php
namespace Controller;

use Dao\PostDao;
use View\ViewPost;
require '..\Dao\PostDao.php';
require '..\View\ViewPost.php';

class ShowPostController
{
	public function showPost()
	{
		$postId = isset($_GET['id']) ?  $_GET['id'] : null;
		//echo $postId;
		$resultPost = PostDao::showPost($postId);
		$resultPic = PostDao::showPostPictures($postId);
		
		$data['postInfo'] = $resultPost;
		$data['pictures'] = $resultPic;
		
		$viewPost = new ViewPost();
		$viewPost->render($data);
		//print_r($data['pictures'][0]['url_pic']);
		
		
	}
}

$newShow = new ShowPostController();
var_dump($newShow->showPost());
