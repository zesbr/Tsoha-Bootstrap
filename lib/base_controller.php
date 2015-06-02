<?php

class BaseController{

	public static function get_user_logged_in() {
		if (isset($_SESSION['user'])) {
			$id = $_SESSION['user'];
			$user = User::getUserById($id);
			return $user;
		}
		return null;
	}

	public static function check_logged_in() {
		if (!isset($_SESSION["user"])) {
			Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
		}
	}

	public static function expired($date1, $date2) {

	}

}
