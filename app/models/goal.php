<?php
class Goal extends BaseModel {

	public $id;
	public $match_id;
	public $player_id;
	public $minute;
	public $is_owngoal;
	public $from_penalty;
	// created_on
	// edited_on

	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array(
			'validate_minute'
		);
		$this->errors = array();
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
			return $goal;
		}
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

	/*
	 * Tallentaa maalin
	 */
	public function save() {

		$query = "insert into goals (match_id, player_id, minute, is_owngoal, from_penalty) values (" .
			":match_id, " . 
			":player_id, " .
			":minute, " .
			":is_owngoal, " .
			":from_penalty" .
		") returning id";

		$params = array(
			"match_id" => $this->match_id,
			"player_id" => $this->player_id,
			"minute" => $this->minute,
			"is_owngoal" => $this->is_owngoal,
			"from_penalty" => $this->from_penalty
		);

		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

	/*
	 * Päivittää maalin
	 */
	public function update() {

		$query = 
			"update goals set " .
				"match_id = :match_id, " .
				"player_id = :player_id, " .
				"minute = :minute, " .
				"is_owngoal = :is_owngoal, " .
				"from_penalty = :from_penalty " .
			"where id = :id";

		$params = array(
			"match_id" => $this->match_id,
			"player_id" => $this->player_id,
			"minute" => $this->minute,
			"is_owngoal" => $this->is_owngoal,
			"from_penalty" => $this->from_penalty,
			"id" => $this->id
		);

		DB::execute($query, $params);
	}

	/*
	 * Poistaa maalin
	 */
	public function delete() {
		$query = "delete from goals where id = :id";
		$params = array("id" => $this->id);
		DB::execute($query, $params);
	}

	/*
	 *	Validoi minuutin
	 */
	public function validate_minute() {

		if (is_integer($this->minute)) {
			$this->errors['minute'] = 'Antamasi minuutti ei ollut kokonaisluku';
		} else if ($this->minute < 1) {
			$this->errors['minute'] = 'Antamasi minuutti oli pienempi kuin 1';
		} else if ($this->minute > 90) {
			$this->errors['minute'] = 'Antamasi minuutti oli suurempi kuin 90';
		}
		
	}

}