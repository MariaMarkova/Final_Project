<?php
namespace Controller;

use Dao\PostDao;

class AjaxHandler {
	
	protected $data;
	
	public function __construct(){
		$this->data = 0;
	
	}
	
	public function performDelete(){
	
	$array = PostDao::showPost(23);
	$sucess = PostDao::deletePic($array[$this->identifier]['url_pic'], 23);
	echo json_encode($sucess);
	}	
	
	
}