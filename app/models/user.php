<?php
class User extends BaseModel {

	public $id;
	public $username;
	public $password_hash;
	public $password_salt;
	public $email;
	public $firstname;
	public $lastname;
	public $is_admin;
	public $is_locked;
	public $joined_on;
	public $edited_on;
	public $last_login;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/*
	 * Hakee ja palauttaa kaikki käyttäjät
	 */
	public static function all() {
		$query = "select * from users";
		$rows = DB::execute($query);
		$users = array();
		foreach ($rows as $row) {
			$users[] = new User($row);
		}
		return $users;
	}

	/**
	 * Hakee ja palauttaa käyttäjän
	 */
	public static function find($id) {
		$query = "select * from users where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$user = new User($row);
			return $user;
		}
	}

	/**
	 * Tallentaa käyttäjän
	 */
	public function save() {

		$query = 
			"insert into users (username, password_hash, password_salt, email, firstname, lastname, is_admin, is_locked, joined_on, edited_on, last_login) values (" .
				":username, " . 
				":password_hash, " .
				":password_salt, " . 
				":email, " .
				":firstname, " .
				":lastname, " .
				":is_admin, " .
				":is_locked, " .
				":joined_on, " .
				":edited_on, " .
				":last_login" .
			") returning id";

		$params = array(
			"username" => $this->username, 
			"password_hash" => $this->password_hash, 
			"password_salt" => $this->password_salt, 
			"email" => $this->email, 
			"firstname" => $this->firstname, 
			"lastname" => $this->lastname, 
			"is_admin" => $this->is_admin, 
			"is_locked" => $this->is_locked,
			"joined_on" => $this->joined_on, 
			"edited_on" => $this->edited_on,
			"last_login" => $this->last_login
		);
		
		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

	/**
	 * Päivittää käyttäjän
	 */
	public function update() {

		$query =
			"update users " .
			"set username = :username, firstname = :firstname, lastname = :lastname, email = :email " .
			"where id = :id";

		$params = array(
			"username" => $this->username,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname,
			"email" => $this->email,
			"id" => $this->id
		);

		DB::execute($query, $params, false);
	}

	/**
	 * TODO
	 */
	public function delete() {
		$query = "delete from users where id = :id";
		$params = array("id" => $this->id);
		DB::execute($query, $params, false);
	}

	/**
	 * Hakee kaikki käyttäjän veikkaukset
	 */
	public function bets() {
		$query = "select * from bets where user_id = :user_id";
		$params = array("user_id" => $this->id);
		$rows = DB::execute($query, $params);
		$bets = array();
		foreach ($rows as $row) {
			$bets[] = new Bet($row);
		}
		return $bets;
	}

	/**
	 * Hakee ja palauttaa kaikki käyttäjän yhteisöt
	 */
	public function communities() {
		$query = 
			"select communities.* " .
			"from communities " .
			"join memberships on community.id = memberships.community_id " .
			"where memberships.user_id = :user_id";
		$params = array("user_id" => $this->id);
		$rows = DB::execute($query, $params);

		$communities = array();
		foreach ($rows as $row) {
			$communities[] = new User($row);
		}
		return $communities;
	}

	/**
	 * Hakee ja palauttaa kaikki käyttäjän jäsenyydet
	 */
	public function memberships() {
		$query = "select * from memberships where user_id = :user_id";
		$params = array("user_id" => $this->id);
		$rows = DB::execute($query, $params);
		$memberships = array();
		foreach ($rows as $row) {
			$memberships[] = new Membership($row);
		}
		return $memberships;
	}


	/**
	 * TODO
	 */
	public function stats() {
		
		$ranking = 0;
		$points = 0;
		$bets = 0;
		$correct = 0;
		$percentage = 0;
		
		foreach ($this->bets() as $bet) {
			$bets++;
			$points += $bet->points_earned;
			if ($bet->points_earned > 0) {
				$correct++;
			}
		}
		if ($correct > 0) {
			$percentage = ($bets / $correct);
		}
		else {
			$percentage = 0;
		}
		$stats = array(
			"ranking" => $ranking,
			"points" => $points,
			"bets" => $bets,
			"correct" => $correct,
			"percentage" => $percentage
		);

		return $stats;
	}

	/**
	 * Autentikoi käyttäjän käyttäjänimen ja salasanan perusteella, sekä palauttaa käyttäjän jos
	 * tunnistautuminen onnistui
	 */
	public static function authenticate($username, $password) {
		$query = "select * from users where username = :username limit 1";
		$params = array("username" => $username);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$user = new User($row);
		}
		if (isset($user) && $user->username == $username && $user->password_hash == crypt($password, $user->password_salt)) {
			return $user;
		}
		return null;
	}

	/**
	 * TODO
	 */
	public function is_valid() {
		return true;
	}

	/**
	 *
	 */
	public function has_betted($match) {
		foreach ($this->bets() as $bet) {
			if ($bet->id == $match->id) {
				return true;
			}
		}
		return false;
	}

}