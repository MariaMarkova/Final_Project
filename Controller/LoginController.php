<?php
namespace Controller;
session_start();

use View\LoginView;
use Model\Admin;
use Model\ValidateCredentials;

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
			
			$username = $_POST['username'];
			$pass = $_POST['pass'];		
						
			$validate = new ValidateCredentials();
			
			$result = [];
			
			if ( !$validate->validate($username, $pass) ){
				$result['validUser'] = false;
			} else {
		
				$admin = new Admin($username, $pass);
				
				if ($admin->checkPass() ){
					$_SESSION['admin'] = $admin;
					$result['validUser'] = true;
				} else {
					$result['validUser'] = false;
				}				
			}			 
		}
		
		echo json_encode($result);

	}
	
	public function logOut(){
		session_destroy();
		
		$this->showLoginForm();
	}
}