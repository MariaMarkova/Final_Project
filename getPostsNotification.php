<?php
require_once 'push_notification.php';

//send info cars for device
// $getdata = file_get_contents("php://input");
// $data = json_decode($getdata, true);

if(isset($_GET['device'])){
	$token = $_GET['device'];
	
	$infoAdmin = getInfoAdmin();
	$result = getAllPostInfo();	
	
	for ($i = 0; $i < count($result); $i++){
	
		$id_post = $result[$i]['id_post'];
		$pics = getPicForPost($id_post);
		$countOfPics = count($pics);
	
		$pictures = [];
		for($j = 0; $j < $countOfPics; $j++){
			//$path = str_replace('\/', DIRECTORY_SEPARATOR, $pics[$j]['url_pic']);
			//$pictures[] = __DIR__ . DIRECTORY_SEPARATOR . $path;
			$pictures[] = $pics[$j]['url_pic'];
		}
		//$result[$i]['urls'] = getPicForPost($id_post);
		$result[$i]['urls'] = $pictures;
		//$j[$i] = $result[$i];
	}
	
	//here is the msg for android
	$msg = [
			'contacts' => $infoAdmin,
			'posts' => $result,
	];
	
	//send msg in json format
	echo json_encode($msg);
}

//wrong!!!
//$jsonMsg = json_encode($msg);
//$msg_status = send_notification($token, $jsonMsg);

