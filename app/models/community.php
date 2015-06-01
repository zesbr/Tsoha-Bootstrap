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

	public static function all() {
		$query = "select * from communities";
		return DB::execute($query);
	}

	public static function find($id) {
		$query = "select * from communities where id = :id limit 1";
		$params = array("id" => $id);
		return DB::execute($query, $params, false);
	}

	public static function getMembershipsByCommunity($id) {
		$query = "select * from memberships join users on memberships.user_id = users.id where memberships.community_id = :id";
		$params = array("id" => $id);
		return DB::execute($query, $params);
	}

	public static function insert($community) {
		$query = "insert into communities (name, created_on, is_private, is_open) values (:name, date_trunc('second', current_timestamp), false, false)";
		$params = array("name" => $community["name"]);
		DB::insert($query, $params);
	}

}