<?php
require_once '../autoload.php';

if(!isset($_SESSION)){
	session_start();
}

$userSearch = isset($_POST['input']) ? $_POST['input'] : '';

$admin = $_SESSION['admin'];

$result = $admin->search($userSearch);

//echo $result;
echo json_encode($result);
