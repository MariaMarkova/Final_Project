<?php

//require_once 'C:\xampp\htdocs\PHP_EXAMPLES\Final_Project\assets\db\DBConnection.php';

namespace Dao;
use db\DBConnection;
use \PDO;

class AdminDao
{	
	public static function getUser($username)
	{
		$connection = DBConnection::getInstance();
		$getUser = 'SELECT * FROM admins WHERE username = (?)';
	
		$statement = $connection->prepare($getUser);
	
		$statement->execute(array($username));
	
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function updateAdminInfo($firstName, $lastName, $username, $email, $telephone, $idAdmin){
		
		try {
			$connection = DBConnection::getInstance();
			$updateAdmin = 'UPDATE admins SET first_name = (?) ,
										last_name = (?),
										telephone = (?),
										email = (?),
										username = (?)
				        WHERE id_admin = (?)';
			
			$statement = $connection->prepare($updateAdmin);
			
			$statement->execute(array($firstName, $lastName, $telephone, $email, $username, $idAdmin));
		} catch (PDOException $e){
			echo $e->getMessage();
		}
		
	}
	
	public function search($params){
		try {
			$connection = DBConnection::getInstance();
			$search = 'SELECT title_post, year_of_manufacture, price, description_post, main_picture FROM posts WHERE title_post LIKE (?)';
			
			$statement = $connection->prepare($search);
// 			$p = $statement->bindValue('search', '%' . $params . '%', PDO::PARAM_INT);
// 			$statement->execute();
			
			$statement->execute(array('%' . $params . '%'));				
			
			//echo $statement->rowCount();
			
	//		return $statement->fetchAll(PDO::FETCH_ASSOC);
			
			$res = '';
			if ($statement->rowCount() > 0) {
				
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			
				foreach( $result as $row ) {
					$res .=  'title: ' . $row["title_post"] . '</br>'
					. 'year: ' . $row["year_of_manufacture"] . '</br>'
					. 'price: ' . $row["price"] . '</br>'
					. 'description: ' . $row["description_post"] . '</br>' . '</br>';
					
				}
				
			} else {
				$res = 'There is nothing to show';
			}
			
			return $res;
		} catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function newSearch($brand, $model, $color, $km, $kmTo, $hp, $hpTo, $year, $yearTo, $price, $priceTo){
		
	}
}