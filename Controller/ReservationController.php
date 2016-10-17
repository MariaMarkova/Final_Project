<?php
namespace Controller;

use View\ReserveView;
use Dao\ReserveDao;

class ReservationController {
	
	public function ShowReservation() {
		
		$postId = isset($_GET['id']) ? $_GET['id'] : null;
		
		$reservation = ReserveDao::getReservation($postId);
		$name = $reservation['name'];
		$email = $reservation['email'];
		$phone = $reservation['telepfone'];
		$msg = $reservation['msg'];
		$data = $reservation['data'];
		
		$view = new ReserveView();
		$view->render($name, $phone, $email, $msg, $data);
	}
}