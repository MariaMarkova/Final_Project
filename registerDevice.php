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
		$email = isset($data['email']) ? $data['email'] : '';
		$name = isset($data['name']) ? $data['name'] : '';

		$connection = DBConnection::getInstance();

		$query = 'INSERT INTO devices (device, email, name) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE device = (?)';

		$statement = $connection->prepare($query);

		$resultFromInsert = $statement->execute(array($token, $email, $name, $token));

	} catch (PDOException $e){
		echo $e->getMessage();
	}
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

//$msgJson = json_encode($msg);

//send response to android
//$msg_status = send_notification($token, $msgJson);

	
//from youtube video
// if (isset($_POST['device'])) {
// 	try {
// 		$token = $_POST['device'];
// 		$email = $_POST['email'];
// 		$name = $_POST['name'];
		
// 		$connection = DBConnection::getInstance();
		
// 		$query = 'INSERT INTO devices VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE device = (?)';
		
// 		$statement = $connection->prepare($query);
		
// 		$resultFromInsert = $statement->execute(array($token, $email, $name, $token));
		
// 	} catch (PDOException $e){
// 		echo $e->getMessage();
// 	}
// }

