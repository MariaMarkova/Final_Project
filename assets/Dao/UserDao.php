<?php

require_once 'C:\xampp\htdocs\PHP_EXAMPLES\Final_Project\assets\db\DBConnection.php';

//  namespace assets\Dao;
//  use \assets\db\DBConnection;

class UserDao
{	
	public static function getUser($username)
	{
		$connection = DBConnection::getInstance();
		$getUser = 'SELECT * FROM users WHERE username = (?)';
	
		$statement = $connection->prepare($getUser);
	
		$statement->execute(array($username));
	
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}