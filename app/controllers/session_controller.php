<?php
class SessionController extends BaseController {

	public static function login() {
		View::make('user/login.html');
	}

	public static function logout(){
		$_SESSION['user'] = null;
		Redirect::to('/login', array('message' => 'Uloskirjautuminen onnistui', 'message_type' => 'success'));
	}

	public static function handle_login() {
		if (!isset($_POST['username'], $_POST['password'])) {
			Redirect::to('/login', array('message' => 'Tarkista käyttäjätunnus ja salasana', 'message_type' => 'warning'));
		}
		$user = User::authenticate($_POST['username'], $_POST['password']);
		if (!$user) {
			Redirect::to('/login', array('message' => 'Tarkista käyttäjätunnus ja salasana', 'message_type' => 'warning'));
		}
		if ($user->is_locked) {
			Redirect::to('/login', array('message' => 'Käyttäjätilisi on lukittu', 'message_type' => 'error'));
		}
		$_SESSION['user'] = $user->id;
		$user->last_login = date('Y-m-d H:m:s');
		$user->update();
		Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->firstname . ' ' . $user->lastname . '!', 'message_type' => 'success'));
	}

}