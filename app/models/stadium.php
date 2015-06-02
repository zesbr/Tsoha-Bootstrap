<?php
class Stadium extends BaseModel {

	public $id;
	public $name;
	public $city;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki stadionit
	 */
	public static function all() {
		$query = "select * from stadiums";
		$rows = DB::execute($query);
		$stadiums = array();
		foreach ($rows as $row) {
			$stadiums[] = new Stadium($row);
		}
		return $stadiums;
	}

	/*
	 * Hakee ja palauttaa stadionin
	 */
	public static function find($id) {
		$query = "select * from stadiums where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$stadium = new Stadium($row);
		}
		return $stadium;
	}

}