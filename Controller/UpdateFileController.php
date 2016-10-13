<?php
namespace Controller;

use View\UpdatePostView;
use Dao\PostDao;


/* require '..\Dao\PostDao.php';
require '..\View\UpdatePostView.php'; */
class UpdateFileController
{
	protected $errors;
	
	public function __construct()
	{
		$this->errors = [];
	}
	public function showUpdate()
	{
		$postId = isset($_GET['id']) ?  $_GET['id'] : null;
		$resultPost = PostDao::showPost($postId);
		
		$titleOld = $resultPost['title_post'];
		$yearOld = $resultPost['year_of_manufacture'];
		$priceOld = $resultPost['price'];
		$descriptionOld = $resultPost['description_post'];
		$brandOld =  $resultPost['brand'];
		$modelOld =  $resultPost['model'];
		$colorOld =  $resultPost['color'];
		$kmOld =  $resultPost['km'];
		$hpOld = $resultPost['hp'];
		
		
		$view = new UpdatePostView($titleOld, $yearOld, $priceOld, $descriptionOld, 
				$brandOld, $modelOld, $colorOld, $kmOld, $hpOld);
		$view->renderUpdatePost();
		if(!empty($_POST)) {
		$title = isset($_POST['title']) ? $_POST['title'] : "";
		$year = isset($_POST['year']) ? $_POST['year'] : "";
		$price = isset($_POST['price']) ? $_POST['price'] : "";
		$description = isset($_POST['description']) ? $_POST['description'] : "" ;
		$brand =  isset($_POST['brand']) ? $_POST['brand'] : "" ;
		$model = isset($_POST['model']) ? $_POST['model'] : "" ;
		$color = isset($_POST['color']) ? $_POST['color'] : "" ;
		$km = isset($_POST['km']) ? $_POST['km'] : "" ;
		$hp = isset($_POST['hp']) ? $_POST['hp'] : "" ;
		
		$this->validateFields($title, $year, $price, $description, $brand, $model, $color, $km, $hp);
		
		if(empty($this->errors)){
		PostDao::updatePost($title, $year, $price, $description, $postId, $brand, $model, $color, $km, $hp);
			}
		}
		
	}
	
	public function isEmpty($string)
	{
		if(strlen($string) == 0)
		{
			return true;
		}
	
		return false;
	}
	
	public function validateFields($title, $year, $price, $description, $brand, $model, $color, $km, $hp)
	{
		if($this->isEmpty($title))
		{
			$this->errors[0] = "Title field is mandatory";
		}
	
		if($this->isEmpty($brand))
		{
			$this->errors[1] = "Brand field is mandatory";
		}
	
		if($this->isEmpty($model))
		{
			$this->errors[2] = "Model field is mandatory";
		}
	
		if($this->isEmpty($color))
		{
			$this->errors[3] = "Color field is mandatory";
		}
	
		if($this->isEmpty($km))
		{
			$this->errors[4] = "Field is mandatory";
		}
	
		if($this->isEmpty($hp))
		{
			$this->errors[5] = "Please enter value for Horse Power Field";
		}
	
		if($this->isEmpty($year))
		{
			$this->errors[6] = "Year field is mandatory";
		}
		if($this->isEmpty($price))
		{
			$this->errors[7] = "Price field is mandatory";
		}
	
		if(!is_numeric($year))
		{
			$this->errors[8] = 'Year must be numeric';
		}
	
		if(!is_numeric($km))
		{
			$this->errors[9] = 'Kilometres field must have  numeric value';
		}
	
		if(!is_numeric($hp))
		{
			$this->errors[10] = 'Horse Power field must have  numeric value';
		}
		if(!is_numeric($price))
		{
			$this->errors[11] = 'Price  field must have  numeric value';
		}
	}
	
	public function getErrors() {
		return $this->errors;
	}
	
}

$cont = new UpdateFileController();
$cont->showUpdate();
var_dump($cont->getErrors());