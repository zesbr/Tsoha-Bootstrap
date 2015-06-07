<?php
class Community extends BaseModel {

  	public $id; 
  	public $name; 
  	public $description;
  	public $created_on; 
  	public $edited_on;
  	public $is_private;
	  
	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/*
	 * Hakee ja palauttaa kaikki yhteisöt
	 */
	public static function all() {
		$query = "select * from communities";
		$rows = DB::execute($query);
		$communities = array();
		foreach ($rows as $row) {
			$communities[] = new Community($row);
		}
		return $communities;
	}

	/*
	 * Hakee ja palauttaa yhteisön
	 */
	public static function find($id) {
		$query = "select * from communities where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$community = new Community($row);
		}
		return $community;
	}

	/*
	 * Hakee ja palauttaa yhteisön jäsenet 
	 */
	public function members() {
		$query = "select users.* from users join memberships on users.id = memberships.user_id where memberships.community_id = :id";
		$params = array("id" => $this->id);
		$rows = DB::execute($query, $params);
		$members = array();
		foreach ($rows as $row) {
			$members[] = new User($row);
		}
		return $members;
	}

	/*
	 * Hakee ja palauttaa yhteisön ylläpitäjät
	 */
	public function admins() {
		$query = 
			"select users.* " .
			"from users " .
			"join memberships on users.id = memberships.user_id " .
			"where memberships.community_id = :id and memberships.is_admin = true";
		$params = array("id" => $this->id);
		$rows = DB::execute($query, $params);
		$members = array();
		foreach ($rows as $row) {
			$members[] = new User($row);
		}
		return $members;
	}

	/**
	 * Hakee ja palauttaa yhteisön jäsenyydet
	 */
	public function memberships() {
		$query = "select * from memberships where community_id = :id";
		$params = array("id" => $this->id);
		$rows = DB::execute($query, $params);
		$memberships = array();
		foreach ($rows as $row) {
			$memberships[] = new Membership($row);
		}
		return $memberships;
	}

	/*
	 * Tallentaa yhteisön
	 */
	public function save() {
		
		$query = 
			"insert into communities (name, description, created_on, edited_on, is_private) " .
			"values (" .
				":name, ".
				":description, " .
				":created_on, " .
				":edited_on, " .
				":is_private" .
			") returning id";

		$params = array(
			"name" => $this->name,
			"description" => $this->description,
			"created_on" => $this->created_on,
			"edited_on" => $this->edited_on,
			"is_private" => $this->is_private
    	);

		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

	/**
	 * Päivittää yhteisön
	 */
	public function update() {
		$query = 
			"update communities " .
			"set name = :name, description = :description, edited_on = :edited_on " .
			"where id = :id";

		$params = array(
			"name" => $this->name,
			"description" => $this->description,
			"edited_on" => $this->edited_on,
			"id" => $this->id
    	);

		DB::execute($query, $params, false);
	}

	/**
	 * Poistaa yhteisön
	 */
	public function delete() {
		$query = "delete from communities where id = :id";
		$params = array("id" => $this->id);
		DB::execute($query, $params);
	}

	/**
	 * Tarkistaa onko yhteisö validi
	 */
	public function is_valid() {
		return true;
	}

}