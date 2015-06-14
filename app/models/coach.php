<?php
class Coach extends BaseModel {

	public $id;
	public $firstname;
	public $lastname;
	public $birthday;
	public $nationality;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki valmentajat
	 */
	public static function all() {
		$query = "select * from coaches";
		$rows = DB::execute($query);
		$coaches = array();
		foreach ($rows as $row) {
			$coaches[] = new Coach($row);
		}
		return $coaches;
	}

	/**
	 * Hakee ja palauttaa valmentajan
	 */
	public static function find($id) {
		$query = "select * from coaches where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$coach = new Coach($row);
			return $coach;
		}
	}

	/*
	 * Hakee ja palauttaa valmentajan joukkueen
	 */
	public function team() {
		$query = "select * from teams where coach_id = :id";
		$params = array("id" => $this->id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$team = new Team($row);
			return $team;
		}
	}

}