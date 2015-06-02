<?php
class Bet extends BaseModel implements ORM {

	public $id;
	public $user_id;
	public $match_id;
	public $home_score;
	public $away_score;
	public $points_earned;
	public $created_on;
	public $edited_on;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/*
	 * Hakee ja palauttaa kaikki veikkaukset
	 */
	public static function all() {
		$query = "select * from bets";
		$rows = DB::execute($query);
		$bets = array();
		foreach ($rows as $row) {
			$bets[] = new Bet($row);
		}
		return $bets;
	}

	/*
	 * Hakee ja palauttaa veikkauksen
	 */
	public static function find($id) {
		$query = "select * from bets where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$bet = new Bet($row);
		}
		return $bet;
	}

	/*
	 * Palauttaa veikkaukseen liittyvän käyttäjän
	 */
	public function user() {
		return User::find($this->user_id);
	}

	/*
	 * Palauttaa veikkauksen liittyvän ottelun
	 */
	public function match() {
		return Match::find($this->match_id);
	}

}
