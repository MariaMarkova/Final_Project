<?php
namespace Controller;
session_start();

use View\ProfileView;

class ProfileController
{
	public function renderProfileForm()
	{
		if(!empty($_SESSION['admin'])){
			$this->getProfileView()->renderProfileForm();
		} else {
			$view = new LoginController();
			$view->showLoginForm();
		}
		
	}
	
	public function renderSuccessulChange(){
		
		if(!empty($_SESSION['admin'])){
			
			$this->getProfileView()->renderSuccesse();
			
		} else {
			$view = new LoginController();
			$view->showLoginForm();
		}	
		
	}
	
	private function getProfileView(){
		$admin = $_SESSION['admin'];
		
		return new ProfileView($admin->getFirstName(),
				$admin->getLastName(),
				$admin->getUsername(),
				$admin->getEmail(),
				$admin->getTelephone());
	
	}
	
}

