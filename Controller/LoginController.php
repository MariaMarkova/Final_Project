<?php
namespace Controller;

use View\LoginView;
use Dao\AdminDao;
use Model\Admin;

class LoginController
{
	public function showLoginForm()
	{
		$view = new LoginView();
		$view->renderLoginForm();
	}

	public function login()
	{
		
		if (isset($_POST['username']) && isset($_POST['pass'])) {
			session_start();
			
			$username = $_POST['username'];
			$pass = $_POST['pass'];			
			$md5Pass = md5($pass);
			
			$userData = AdminDao::getUser($username);
			$result = [];
		
			if (!empty($userData[0]) && $userData[0]['password'] == $md5Pass) {
				
				$_SESSION['infoUser'] = $userData[0];
				$result['validUser'] = true;
				
				$fisrtName = $_SESSION['infoUser']['first_name'];
				$lastName = $_SESSION['infoUser']['last_name'];
				$email = $_SESSION['infoUser']['email'];
				$telephone = $_SESSION['infoUser']['telephone'];
				
				$admin = new Admin($fisrtName, $lastName, $pass, $email, $telephone, $username);
				
			}else {
				$result['validUser'] = false;
			}
			 
		}
		
		echo json_encode($result);

	}
}