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
		
		$connection = DBConnection::getInstance();
		$updateAdmin = 'UPDATE admins SET first_name = (?) ,
										last_name = (?),
										telephone = (?), 
										email = (?), 
										username = (?)
				        WHERE id_admin = (?)';
	
		$statement = $connection->prepare($updateAdmin);
	
		$statement->execute(array($firstName, $lastName, $telephone, $email, $username, $idAdmin));
	}
}