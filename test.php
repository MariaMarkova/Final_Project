<?php
require_once 'autoload.php';
use db\DBConnection;
function get(){
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

$result = get();
$infoAdmin = getInfoAdmin();
// var_dump(count($result));
// var_dump($result);

$r = [
		'contacts' => $infoAdmin,
		'posts' => $result
];

$json = json_encode($r);

echo $json;

/* 
"contacts" : {
"name" : "Красимир Стоев",
"phone" : "0888552211"
} */

// $json = [
// 			'contacts' => [
// 							'name' => 'Krasi',
// 							'phone' => '0896722484'
// 						  ],
// 			'posts' => [
// 					'brand' => "Opel",
// 			]
		
// 		];

// $msgJson = json_encode($json);

// var_dump($msgJson);

// //http://127.0.0.1:8012/PHP_EXAMPLES/Final_Project/registerDevice.php

// $str = '{"contacts":{"name":"Krasi","phone":"0896722484"},"posts":{"brand":"Opel"}}';
// $str1 = '{"device": "5gsg545sg45", "name":"Krasi","email":"krasi@mail.bg"}';

// $d = json_decode($str, true);
// $d1 = json_decode($str1, true);

// //var_dump($d['posts']);

// var_dump($d1['device']);
