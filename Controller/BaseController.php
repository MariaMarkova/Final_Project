<?php
namespace Controller;
session_start();

use View\BaseView;

class BaseController
{
	public function showBaseView()
	{
		if(!empty($_SESSION['admin'])){
			$view = new BaseView();
			$view->renderBaseView();
		} else {
			$view = new LoginController();
			$view->showLoginForm();
		}
		
	}
}