<?php
class Community extends BaseModel {

  	public $id; 
  	public $name; 
  	public $created_on; 
  	public $is_private; 
  	public $is_open;
	  
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
	 * Hakee ja palauttaa yhteisöön kuuluvat jäsenet 
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
	 * Tallentaa yhteisön
	 */
	public function save() {
		
		$query = 
			"insert into communities (name, created_on, is_private, is_open) " .
			"values (" .
				":name, ".
				":created_on, " .
				":is_private, " .
				":is_open" .
			") returning id";

		$params = array(
			"name" => $this->name,
			"created_on" => $this->created_on,
			"is_private" => $this->is_private,
			"is_open" => $this->is_open
    	);

		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

}