<?php
class SessionController extends BaseController {

	public static function login() {
		View::make("user/login.html");
	}

	public static function logout(){
		$_SESSION['user'] = null;
		Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
	}

	public static function handle_login() {
		if (isset($_POST["username"], $_POST["password"])) {
			$user = User::authenticate($_POST["username"], $_POST["password"]);
			if (!$user) {
				Redirect::to("/login", array("message" => "Salsana tai käyttäjänimi meni väärin!"));
			} else {
				$_SESSION["user"] = $user->id;
				Redirect::to("/");
			}
		} else {
			Redirect::to("/login", array("message" => "Salsanaa tai käyttäjänimeä ei annettu!"));
		}
	}

}