<?php
require_once 'C:\xampp\htdocs\PHP_EXAMPLES\Final_Project\assets\Dao\UserDao.php';

// namespace assets\php;
//use \assets\Dao\UserDao;

//TODO validation in php

session_start();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

$md5Pass = md5($pass);

$userData = UserDao::getUser($username);

$result = [];

if (!empty($userData[0]) && $userData[0]['password'] == $md5Pass) {
	
	$_SESSION['infoUser'] = $userData[0];
	
	$result['validUser'] = true;
}else {
	$result['validUser'] = false;
}

echo json_encode($result);