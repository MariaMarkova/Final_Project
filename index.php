<?php

require_once __DIR__ . '/autoload.php';
//require_once __DIR__ . '/config.php';

$fileNotFound = false;

//print_r($_GET);

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : 'login';
$methodName = isset($_GET['action']) ? $_GET['action'] : 'showLoginForm';

$controllerClassName = '\Controller\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClassName))
{
	$contoller = new $controllerClassName();
	if (method_exists($contoller, $methodName)) {
		$contoller->$methodName();
	} else {
		//echo 'method not found';
		$fileNotFound = true;
	}
} else {
	//echo 'class not found';
	$fileNotFound = true;
}


if ($fileNotFound) {
	//return header 404
	//echo 'not found';
}
