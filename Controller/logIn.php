<?php

require_once '..\autoload.php';

use Controller\LoginController;

//TODO validation in php

$loginController = new LoginController();
return $loginController->login();