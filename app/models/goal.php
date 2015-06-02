<?php
class Goal extends BaseModel implements ORM {

	public $id;
	public $match_id;
	public $player_id;
	public $minute;
	public $is_owngoal;
	public $from_penalty;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki maalit
	 */
	public static function all() {
		$query = "select * from goals";
		$rows = DB::execute($query);
		$goals = array();
		foreach ($rows as $row) {
			$goals[] = new Goal($row);
		}
		return $goals;
	}

	/*
	 * Hakee ja palauttaa maalin
	 */
	public static function find($id) {
		$query = "select * from goals where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$goal = new Goal($row);
		}
		return $goal;
	}

	/*
	 * Palauttaa maaliin liittyvän ottelun
	 */
	public function match() {
		return Match::find($this->match_id);
	}

	/*
	 * Palauttaa maaliin liittyvän pelaajan
	 */
	public function player() {
		return Player::find($this->player_id);
	}

}