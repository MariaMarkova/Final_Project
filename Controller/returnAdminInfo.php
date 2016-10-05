<?php

session_start();

$firstName =  isset($_SESSION['infoUser']['first_name']) ? $_SESSION['infoUser']['first_name'] : 'Anonymous';

function returnAdminName(){
	return ( isset($_SESSION['infoUser']['first_name']) ? $_SESSION['infoUser']['first_name'] : 'Anonymous');
}


?>
