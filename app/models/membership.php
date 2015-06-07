<?php
class Membership extends BaseModel {

	public $id;
	public $user_id;
	public $community_id;
	public $joined_on;
	public $is_admin;
	
	/*
	 * Hakee ja palauttaa kaikki jäsenyydet
	 */
	public static function all() {
		$query = "select * from memberships";
		$rows = DB::execute($query);
		$memberships = array();
		foreach ($rows as $row) {
			$memberships[] = new Membership($row);
		}
		return $memberships;
	}

	/*
	 * Hakee ja palauttaa jäsenyyden
	 */
	public static function find($id) {
		$query = "select * from memberships where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$membership = new Membership($row);
		}
		return $membership;
	}

	/*
	 * Hakee ja palauttaa jäsenyyteen liittyvän käyttäjän
	 */
	public function user() {
		return User::find($this->user_id);
	}

	/*
	 * Hakee ja palauttaa jäsenyyteen liittyvän yhteisön
	 */
	public function community() {
		return Community::find($this->community_id);
	}

	/**
	 * Tallentaa jäsenyyden
	 */
	public function save() {
		$query = 
			"insert into memberships (user_id, community_id, joined_on, is_admin) " .
			"values (" .
				":user_id, ".
				":community_id, " .
				":joined_on, " .
				":is_admin" .
			") returning id";

		$params = array(
			"user_id" => $this->user_id,
			"community_id" => $this->community_id,
			"joined_on" => $this->joined_on,
			"is_admin" => $this->is_admin
    	);

		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

	/**
	 * Päivittää jäsenyyden
	 */
	public function update() {
		// TODO
	}

	/**
	 * Poistaa jäsenyyden
	 */
	public function delete() {
		$query = "delete from memberships where id = :id";
		$params = array("id" => $this->id);
		DB::execute($query, $params);
	}

}