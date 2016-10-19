<?php
require_once 'autoload.php';
use db\DBConnection;

$postdata = file_get_contents("php://input");
$data = json_decode($postdata, true);

//test
// $data = [
// 		'device' => '454BLD54',
// 		'email' => 'maria.ivanova.markova@gmail.com',
// 		'name' => 'Maria Markova'
// ];

$resultFromInsert = false;

if (isset($data['device'])) {
	try {
		$token = $data['device'];
		$email = isset($data['email']) ? $data['email'] : 'No email';
		$name = isset($data['name']) ? $data['name'] : 'No name';

		$connection = DBConnection::getInstance();
		
		$selectId = 'SELECT id_user FROM users WHERE email LIKE (?)';
		$statement = $connection->prepare($selectId);
		$resultFromISelect = $statement->execute(array($email));
		
		$userId;
		
		if($resultFromISelect->rowCount() > 0){						
			$userId = $resultFromISelect[0]['id_user'];
		} else {
			$insert = 'INSERT INTO users (email, name) VALUES (?, ?)';
			$statementInsert = $connection->prepare($insert);
			$resultInsetIntoUsers = $statement->execute(array($email, $name));
			$userId = $resultInsetIntoUsers->lastInsertId();
		}
		
		$query = 'INSERT INTO devices (device, id_user) VALUES (?, ?) ON DUPLICATE KEY UPDATE device = (?)';
		$statement = $connection->prepare($query);
		$resultFromInsert = $statement->execute(array($token,$userId));
		
		//$query = 'INSERT INTO devices (device, email, name) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE device = (?)';
// 		$statement = $connection->prepare($query);
// 		$resultFromInsert = $statement->execute(array($token, $email, $name, $token));

	} catch (PDOException $e){}
}

if ($resultFromInsert) {
	$msg = [
			"code" => 200,
			"msg" => "successfull"
	];
} else {
	$msg = [
			"code" => 500,
			"msg" => "fail - try again"
		
	];
}

echo json_encode($msg);

