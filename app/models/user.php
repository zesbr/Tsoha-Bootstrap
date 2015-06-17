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
		$this->validators = array(
			"validate_username",
			"validate_email",
			"validate_firstname"
		);
		$this->errors = array();
	}

	/*
	 * Hakee ja palauttaa kaikki käyttäjät
	 */
	public static function all() {
		$query = "select * from users order by username";
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
	 * Hakee ja palauttaa kaikki käyttäjän veikkaukset
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
	 * Hakee ja palauttaa kaikki yhteisöt, joissa käyttäjä on jäsenenä
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
	 * Hakee ja palauttaa käyttäjän jäsenyyden
	 */
	public function membership($community) {
		$query = "select * from memberships where user_id = :user_id and community_id = :community_id";
		$params = array("user_id" => $this->id, "community_id" => $community->id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$membership = new Membership($row);
			return $membership;
		}
	}

	/**
	 * Tarkistaa onko käyttäjä jäsenenä yhteisössä
	 */
	public function is_member_in($community) {
		foreach ($this->memberships() as $membership) {
			if ($membership->community_id == $community->id) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Hakee ja palauttaa käyttäjän veikkaus tilastot
	 */
	public function stats() {
		$ranking = $points = $bets = $correct = $percentage = 0;
		
		foreach ($this->bets() as $bet) {
			$bets++;
			$points += $bet->points_earned;
			if ($bet->points_earned > 1) {
				$correct++;
			}
		}

		if ($correct > 0) {
			$percentage = round(($correct / $bets) * 100, 2);
		} else {
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
	 * Tarkistaa onko käyttäjä veikannut ottelua
	 */
	public function has_betted($match) {
		foreach ($this->bets() as $bet) {
			if ($bet->match_id == $match->id) {
				return true;
			}
		}
		return false;
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
			"is_admin" => $this->psql_boolean($this->is_admin), 
			"is_locked" => $this->psql_boolean($this->is_locked),
			"joined_on" => $this->joined_on, 
			"edited_on" => $this->edited_on,
			"last_login" => $this->last_login
		);
		
		$row = DB::execute($query, $params, false);
		$this->id = $row["id"];
	}

	/**
	 * Päivittää käyttäjän
	 */
	public function update() {

		$query =
			"update users set " .
				"username = :username, " .
				"email = :email, " .
				"firstname = :firstname, " .
				"lastname = :lastname, " .
				"is_admin = :is_admin, " .
				"is_locked = :is_locked, " .
				"edited_on = :edited_on, " .
				"last_login = :last_login " .
			"where id = :id";

		$params = array(
			"username" => $this->username,
			"email" => $this->email,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname,
			"is_admin" =>  $this->psql_boolean($this->is_admin),
			"is_locked" => $this->psql_boolean($this->is_locked),
			"edited_on" => $this->edited_on,
			"last_login" => $this->last_login,
			"id" => $this->id
		);

		DB::execute($query, $params);
	}

	/**
	 * Poistaa käyttäjän
	 */
	public function delete() {
		$query = "delete from users where id = :id";
		$params = array("id" => $this->id);

		DB::execute($query, $params);
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
	 * Validoi käyttäjän käyttäjänimen
	 */
	public function validate_username() {

		if (strlen($this->username) < 3) {
			$this->errors["username"] = "Käyttäjänimesi on liian lyhyt";
		} else if (strlen($this->username) > 15) {
			$this->errors["username"] = "Käyttäjänimesi on liian pitkä";
		}	else if (!$this->is_unique("username")) {
			$this->errors["username"] = "Käyttäjänimi on varattu";
		}	

	}

	/**
	 * Validoi käyttäjän sähköpostin
	 */
	public function validate_email() {

		if (!$this->is_unique("email")) {
			$this->errors["email"] = "Sähköpostiosoite on jo käytössä";
		}

	}

	/**
	 * Validoi käyttäjän etunimen
	 */
	public function validate_firstname() {

		if (strlen($this->firstname) < 2) {
			$this->errors["firstname"] = "Etunimi on liian lyhyt";
		} else if (strlen($this->firstname) > 64) {
			$this->errors["firstname"] = "Etunimi on liian pitkä";
		}

	}

}