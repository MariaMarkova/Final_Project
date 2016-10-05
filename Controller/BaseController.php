<?php
namespace Controller;

use View\BaseView;

class BaseController
{
	public function showBaseView()
	{
		$view = new BaseView();
		$view->renderBaseView();
	}
}