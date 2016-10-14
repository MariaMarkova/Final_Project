<?php
namespace Controller;

session_start();

use Dao\PostDao;

require_once '../autoload.php';

$identifier = intval(isset($_POST['identifier']) ? $_POST['identifier'] : '' );
$postId = $_SESSION['postId'];

 $pictures = PostDao::showPostPictures($postId);
PostDao::deletePic($pictures[$identifier]['url_pic'], $postId) ;





echo json_encode('sucess');
	
	



