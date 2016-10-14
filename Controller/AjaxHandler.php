<?php
namespace Controller;

use Dao\PostDao;

class AjaxHandler {
	
	protected $identifier;
	
	public function __construct(){
		$this->identifier = intval(isset($_POST['identifier']) ? $_POST['identifier'] : null );
	
	}
	
	public function performDelete(){
	
	$array = PostDao::showPost(23);
	$sucess = PostDao::deletePic($array[$this->identifier]['url_pic'], 23);
	echo json_encode($sucess);
	}	
	
	
}