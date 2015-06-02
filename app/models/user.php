<?php
class User extends BaseModel implements ORM {

	public $id;
	public $username;
	public $password_hash;
	public $password_salt;
	public $email;
	public $firstname;
	public $lastname;
	public $is_admin;
	public $joined_on;
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
		}
		return $user;
	}

	/**
	 * Tallentaa käyttäjän
	 */
	public function save() {

		$query = 
			"insert into users (username, password_hash, password_salt, email, firstname, lastname, is_admin, joined_on, last_login) values (" .
				":username, " . 
				":password_hash, " .
				":password_salt, " . 
				":email, " .
				":firstname, " .
				":lastname, " .
				":is_admin, " .
				":joined_on, " .
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
			"joined_on" => $this->joined_on, 
			"last_login" => $this->last_login
		);
		
		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

	/**
	 * TODO
	 */
	public function update() {

	}

	/**
	 * TODO
	 */
	public function delete() {
		
	}

	/**
	 * Hakee kaikki käyttäjän veikkaukset ja palauttaa taulukon Bet-olioita
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
	 * TODO
	 */
	public function ranking() {

	}

	/**
	 * TODO
	 */
	public function points() {

	}

	/**
	 * TODO
	 */
	public function correct() {

	}

	/**
	 * TODO
	 */
	public function percentage() {

	}

	/*
	 * TODO: REFAKTOROI TÄSTÄ ALASPÄIN
	 */
	public static function getUserById($id) {
		$query = "select * from users where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$user = new User($row);
		}
		return $user;
	}

	public static function getUserByUsername($username) {
		$query = "select * from users where username = :username limit 1";
		$params = array("username" => $username);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$user = new User($row);
		}
		return $user;
	}

	public static function getBetsByUserId($user_id) {
		$query = "select count(*) as num_of_bets from bets where user_id = :user_id";
		$params = array("user_id" => $user_id);
		return DB::execute($query, $params);
	}

	/**
	 * Autentikoi käyttäjän käyttäjänimen ja salasanan perusteella
	 */
	public static function authenticate($username, $password) {
		$user = self::getUserByUsername($username);
		if ($user->username == $username && $user->password_hash == crypt($password, $user->password_salt)) {
			return $user;
		}
		return null;
	}

	/**
	 * TODO: Tämän voisi ehkä laittaa jonnekkin muualle
	 * Generoi salasanan suojausta parantavan merkkijonon eli ns. suolan
	 */
	public static function salt() {
		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$salt = "";
		for ($i = 0; $i < 12; $i++) { 
			$j = rand(0, (strlen($characters)-1));
			$salt .= $characters[$j];
		}
		return $salt;
	}

}