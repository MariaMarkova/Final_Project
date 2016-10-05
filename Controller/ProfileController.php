<?php
namespace Controller;

use View\ProfileView;

class ProfileController
{
	public function renderProfileForm()
	{
		$view = new ProfileView();
		$view->renderProfileForm();
	}
	
	public function getAdminInfo()
	{
		
	}
}