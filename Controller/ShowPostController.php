<?php
namespace Controller;

use Dao\PostDao;
use View\ViewPost;
use View\ErrorView;
/* require '..\Dao\PostDao.php';
require '..\View\ViewPost.php';
 */
class ShowPostController
{
	public function showPost()
	{
		$postId = isset($_GET['id']) ?  $_GET['id'] : null;
		
		if($postId==55) {
			$errorView = new ErrorView();
			$errorView->render();
			die();
		}
		//echo $postId;
		$resultPost = PostDao::showPost($postId);
		$resultPic = PostDao::showPostPictures($postId);
		
		$data['postInfo'] = $resultPost;
		$data['pictures'] = $resultPic;
		
		$title = $data['postInfo']['title_post'];
		$price = $data['postInfo']['price'];
		$description = $data['postInfo']['description_post'];
		$year = $data['postInfo']['year_of_manufacture'];
		$brand = $data['postInfo']['brand'];
		$model = $data['postInfo']['model'];
		$color = $data['postInfo']['color'];
		$km = $data['postInfo']['km'];
		$hp = $data['postInfo']['hp'];
		
		$viewPost = new ViewPost($title, $price, $description, $year, $brand, $model, $color, $km, $hp);
		$viewPost->setPictures($data['pictures']);
		
		$viewPost->renderViewPost();
		//print_r($data['pictures'][0]['url_pic']);
		
		
	}
}

