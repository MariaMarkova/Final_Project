<?php
require_once 'push_notification.php';

//send info cars for device
// $getdata = file_get_contents("php://input");
// $data = json_decode($getdata, true);

if(isset($_GET['device'])){
	//TODO validate device
	$token = $_GET['device'];
	
	$infoAdmin = getInfoAdmin();
	$resultPosts = getAllPostInfo();	
	
	//here is the msg for android
	$msg = [
			'contacts' => $infoAdmin,
			'posts' => $resultPosts,
	];
	
	//send msg in json format
	echo json_encode($msg);
}

//wrong!!!
//$jsonMsg = json_encode($msg);
//$msg_status = send_notification($token, $jsonMsg);

