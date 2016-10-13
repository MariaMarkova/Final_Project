<?php
require_once 'autoload.php';
use db\DBConnection;

function send_notification ($tokens, $msg) { 
	
	$url = 'https://fcm.googleapis.com/fcm/send';
	
	$fields = array(
			'registration_ids' => $tokens,
			'data' => $msg
	);
	
	$headers = array(
			'Authorization:key = AlzaSyCnNp92Nrb1twO6uUAulsw-kp170wdGEnM',
	        'Content-Type: application/json'
	);
	
	// Open connection
	$ch = curl_init();
	
	// Set the url, number of POST vars, POST data
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	
	// Execute post
	$result = curl_exec($ch);
	if ($result === FALSE) {
		die('Curl failed: ' . curl_error($ch));
	}
	
	// Close connection
	curl_close($ch);
	
	return $result;
}

function getDevices(){
	//pull tokens from db and save them in array
	$connection = DBConnection::getInstance();
	
	$sql = 'SELECT device FROM devices';
	$result = $connection->prepare($sql);
	$result->execute();
	
	$tokens = [];
	
	if ($result->rowCount() > 0){
		$r = $result->fetchAll(PDO::FETCH_ASSOC);
	
		foreach( $r as $row ) {
			$tokens[] = $row['device'];
		}
	}
	
	return $tokens;
}

function getAllPostInfo(){
	//get all posts from db
	$connection = DBConnection::getInstance();
	
	$query = 'SELECT title_post, year_of_manufacture, price, description_post FROM posts';
	$stm = $connection->prepare($query);
	$stm->execute(array());
	return $stm->fetchAll(PDO::FETCH_ASSOC);	
}

function getInfoAdmin(){
	//get info admin from db
	$connection = DBConnection::getInstance();
	
	$adminInfo = 'SELECT concat(first_name, " " , last_name) as `name`, telephone as phone FROM admins;';
	$stm = $connection->prepare($adminInfo);
	$stm->execute(array());
	return $stm->fetch(PDO::FETCH_ASSOC);
}

	
