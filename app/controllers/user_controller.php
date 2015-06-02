<?php
class UserController extends BaseController {

	public static function index() {
		$users = User::all();
		// echo json_encode($users);
		View::make("user/index.html", array("users" => $users));
	}

	public static function show($id) {
		$user = User::find($id);
		echo json_encode($user);
	}

	public static function create() {
		View::make("user/registration.html");
	}

	public static function save() {		
		$salt = self::get_random_salt(); // TODO: Tämän voisi siirtää lomakkeeseen hidden fieldiksi
		
		$user = new User(array(
			"username" => $_POST["username"], 
			"password_hash" => crypt($_POST["password"], $salt), 
			"password_salt" => $salt, 
			"email" => $_POST["email"], 
			"firstname" => $_POST["firstname"], 
			"lastname" => $_POST["lastname"], 
			"is_admin" => 0, 
			"joined_on" => date("Y-m-d H:i:s"), 
			"last_login" => date("Y-m-d H:i:s")
		));
		$user->save();

		Redirect::to('/users', array('message' => 'Peli on lisätty kirjastoosi!'));
	}

}