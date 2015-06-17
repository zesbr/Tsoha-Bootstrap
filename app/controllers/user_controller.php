<?php
class UserController extends BaseController {

	# GET /users
	public static function index() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$users = User::all();
		View::make('user/index.html', array('user_logged_in' => $user_logged_in, 'users' => $users));
	}

	# GET /user/:id
	public static function show($id) {
		self::check_logged_in();
		$user = User::find($id);
		View::make('user/show.html', array('user' => $user));
	}

	# GET /user/registration
	public static function create() {
		View::make('user/registration.html');
	}

	# GET /user/edit/:id
	public static function edit($id) {
		self::check_logged_in();
		$user = User::find($id);
		$user_logged_in = self::get_user_logged_in();

		if (!isset($user)) {
			Redirect::to('/users', array('message' => 'Käyttäjää ei löytynyt', 'message_type' => 'warning'));
		}

		if ($user_logged_in->is_admin || $user_logged_in->id == $user->id) {
			View::make('user/edit.html', array('user' => $user));
		} else {
			Redirect::to('/users', array('message' => 'Et voi muokata käyttäjää', 'message_type' => 'warning'));
		}
	}

	# POST /user
	public static function save() {		
		$salt = self::get_random_salt();
		if ($_POST['password'] != $_POST['password_confirmation']) {
			Redirect::to('/registration', array(
				'message' => 'Käyttäjätilin luonti epäonnistui!', 
				'message_type' => 'error', 
				'errors' => array('password' => 'Salasana ja vahvistus eivät täsmänneet')
			));
		}
		if (self::password_is_strong($_POST['password'])) {
			$password_hash = crypt($_POST['password'], $salt);
		} else {
			Redirect::to('/registration', array(
				'message' => 'Käyttäjätilin luonti epäonnistui!', 
				'message_type' => 'error', 
				'errors' => array('password' => 'Salasanasi on liian heikko!')
			));
		}

		$user = new User(array(
			'username' => $_POST['username'], 
			'password_hash' => $password_hash, 
			'password_salt' => $salt, 
			'email' => $_POST['email'], 
			'firstname' => $_POST['firstname'], 
			'lastname' => $_POST['lastname'], 
			'is_admin' => 0, 
			'is_locked' => 0,
			'joined_on' => date('Y-m-d H:i:s'), 
			'edited_on' => date('Y-m-d H:i:s'),
			'last_login' => null
		));
		if ($user->is_valid()) {
			$user->save();
			Redirect::to('/login', array('message' => 'Käyttäjätili luotiin onnistuneesti!', 'message_type' => 'success'));
		} else {
			Redirect::to('/registration', array(
				'message' => 'Käyttäjätilin luonti epäonnistui', 
				'message_type' => 'error', 
				'errors' => $user->errors
			));
		}
	}

	# PUT /user
	public static function update() {
		self::check_logged_in();
		$user = User::find($_POST['id']);
		$user_logged_in = self::get_user_logged_in();

		if (!isset($user)) {
			Redirect::to('/users', array('message' => 'Käyttäjää ei löytynyt', 'message_type' => 'warning'));
		}
		if ($user_logged_in != $user && !$user_logged_in->is_admin) {
			Redirect::to('/users', array('message' => 'Et voi muokata käyttäjää', 'message_type' => 'warning'));
		}

		$user->username = $_POST['username'];
		$user->firstname = $_POST['firstname'];
		$user->lastname = $_POST['lastname'];
		$user->email = $_POST['email'];
		$user->edited_on = date('Y-m-d H:m:s');

		if ($user->is_valid()) {
			$user->update();
			Redirect::to('/users', array('message' => 'Käyttäjä päivitettiin', 'message_type' => 'success'));
		} else {
			Redirect::to('/user/edit/' . $user->id, array(
				'message' => 'Käyttäjätilin päivitys epäonnistui', 
				'message_type' => 'error', 
				'errors' => $user->errors
			));
		}
	}

	# DELETE /user
	public static function delete() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$user = User::find($_POST['id']);

		if (!isset($user)) {
			Redirect::to('/users', array('message' => 'Käyttäjää ei löytynyt', 'message_type' => 'warning'));
		}
		if ($user_logged_in != $user && !$user_logged_in->is_admin) {
			Redirect::to('/users', array('message' => 'Et voi poistaa käyttäjää', 'message_type' => 'warning'));
		}

		// Poistetaan käyttäjän veikkaukset
		foreach ($user->bets() as $bet) {
			$bet->delete();
		}

		// Poistetaan käyttäjän jäsenyydet
		foreach ($user->memberships() as $membership) {
			if ($membership->is_admin) { // Jos käyttäjä on ylläpitäjän oikeudet omaava jäsen, niin ...
				$community = $membership->community(); 
				if (count($community->admins()) > 1) { // tarkista jääkö yhteisöön muita ylläpitäjiä.
					$membership->delete();
				} else { // Jos ei, niin poista yhteisön kaikki jäsenyydet ja ...
					foreach ($community->memberships() as $other_membership) { 
						$other_membership->delete();
					}
					$community->delete(); // poista lopuksi itse yhteisö
				}
			} else {
				$membership->delete();
			}
		}

		$user->delete();

		if ($user_logged_in != $user) {
			Redirect::to('/users', array('message' => 'Käyttäjä poistettiin onnistuneesti', 'message_type' => 'success'));
		}
		Redirect::to('/logout', array('message' => 'Käyttäjätilisi on poistettu', 'message_type' => 'success'));
	}

	# PUT /user/change_password
	public static function change_password() {
		// TODO
	}

	# PUT /user/reset_password
	public static function reset_password() {
		// TODO
	}

	# PUT /user/lock TODO => /toggle_lock
	public static function toggle_lock() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$user = User::find($_POST['id']);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/users', array('message' => 'Sinulla ei ole oikeuksia muokata tiliä', 'message_type' => 'warning'));
		}
		if ($user->is_admin) {
			Redirect::to('/users', array('message' => 'Et voi muokata käyttäjää', 'message_type' => 'warning'));
		}

		if ($user->is_locked) {
			$user->is_locked = 0;
			$user->update();
				Redirect::to('/users', array('message' => 'Käyttäjän ' . $user->firstname . ' ' . $user->lastname . ' tili avattiin onnistuneesti!', 'message_type' => 'success'));
		} else {
			$user->is_locked = 1;
			$user->update();
			Redirect::to('/users', array('message' => 'Käyttäjän ' . $user->firstname . ' ' . $user->lastname . ' tili lukittu onnistuneesti!', 'message_type' => 'success'));
		}
	}

}