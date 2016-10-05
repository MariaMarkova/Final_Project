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
}