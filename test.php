<?php
require_once 'autoload.php';
use db\DBConnection;
function get(){
	$connection = DBConnection::getInstance();
	$query = 'SELECT id_post, brand, model, hp, year_of_manufacture AS year, km, color, price, description_post AS description 
				FROM posts ORDER BY id_post DESC';
	$stm = $connection->prepare($query);
	$stm->execute();
	return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function getPicForPost($id_post){
	$connection = DBConnection::getInstance();
	$query = 'SELECT url_pic FROM pictures WHERE id_post = (?)';
	$stm = $connection->prepare($query);
	$stm->execute(array($id_post));
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
// var_dump($result[0]);

//  var_dump(count(getPicForPost(1)));
// var_dump(getPicForPost(1)[0]['url_pic']);

for ($i = 0; $i < count($result); $i++){
	
	$id_post = $result[$i]['id_post'];	
	$pics = getPicForPost($id_post);
	$countOfPics = count($pics);
	
	$pictures = [];
	for($j = 0; $j < $countOfPics; $j++){
// 		$path = str_replace('\/', DIRECTORY_SEPARATOR, $pics[$j]['url_pic']);
// 		$pictures[] = __DIR__ . DIRECTORY_SEPARATOR . $path;
		$pictures[] = $pics[$j]['url_pic'];
	}
	//$result[$i]['urls'] = getPicForPost($id_post);
	$result[$i]['urls'] = $pictures;
	//$j[$i] = $result[$i];
}

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
