<?php
class UserController extends BaseController {

	# GET /users
	public static function index() {
		$users = User::all();
		View::make("user/index.html", array("users" => $users));
	}

	# GET /user/:id
	public static function show($id) {
		$user = User::find($id);
		View::make("user/show.html", array("user" => $user));
	}

	# GET /user/registration
	public static function create() {
		View::make("user/registration.html");
	}

	# GET /user/edit/:id
	public static function edit($id) {
		self::check_logged_in();
		$user = self::get_user_logged_in();

		if ($user->is_admin || $user->id == $id) {
			View::make("user/edit.html", array("user" => $user));
		} else {
			Redirect::to('/login', array('message' => 'Käyttäjällä ei ole oikeuksia!'));
		}
	}

	# POST /user
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
			"is_locked" => 0,
			"joined_on" => date("Y-m-d H:i:s"), 
			"edited_on" => date("Y-m-d H:i:s"),
			"last_login" => null
		));
		$user->save();

		Redirect::to('/users', array('message' => 'Peli on lisätty kirjastoosi!'));
	}

	# PUT /user
	public static function update() {
		self::check_logged_in();
		$user = User::find($_POST["id"]);
		
		$user->username = $_POST["username"];
		$user->firstname = $_POST["firstname"];
		$user->lastname = $_POST["lastname"];
		$user->email = $_POST["email"];
		$user->edited_on = date("Y-m-d H:m:s");

		if ($user->is_valid()) {
			$user->update();
			Redirect::to("/users", array("message" => "Käyttäjä päivitettiin"));
		}
	}

	# PUT /lock
	public static function lock() {
		// TODO
	}

	# DELETE /user
	public static function delete() {
		self::check_logged_in();
		$user = User::find($_POST["id"]);

		// Poistetaan käyttäjän veikkaukset
		foreach ($user->bets() as $bet) {
			$bet->delete();
		}

		// Poistetaan käyttäjän jäsenyydet
		foreach ($user->memberships as $key => $value) {
			# code...
		}
			// Jos käyttäjä on ylläpitäjä

			// Tarkista jääkö yhteisöön

			// Jos ei, niin anna jäsenyys vanhimmalle jäsnelle

			// Jos ei ole muita jäseniä, niin poista yhteisö 

		// Poistetaan käyttäjä
		$user->delete();
	}

}