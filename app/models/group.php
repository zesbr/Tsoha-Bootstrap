<?php
class Group extends BaseModel {

	public $id;
	public $title;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki lohkot
	 */
	public static function all() {
		$query = "select * from groups";
		$rows = DB::execute($query);
		$groups = array();
		foreach ($rows as $row) {
			$groups[] = new Group($row);
		}
		return $groups;
	}

	/*
	 * Hakee ja palauttaa lohkon
	 */
	public static function find($id) {
		$query = "select * from groups where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$group = new Group($row);
		}
		return $group;
	}

	/*
	 * Hakee ja palauttaa lohkossa pelaavat joukkueet
	 */
	public function teams() {
		$query = "select * from teams where group_id = :id";
		$params = array("id" => $this->id);
		$rows = DB::execute($query, $params);
		$teams = array();
		foreach ($rows as $row) {
			$teams[] = new Team($row);
		}
		return $teams;
	}

}