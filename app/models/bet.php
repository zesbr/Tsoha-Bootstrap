<?php
class Bet extends BaseModel {

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

	/**
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

	/**
	 * Hakee ja palauttaa veikkauksen
	 */
	public static function find($id) {
		$query = "select * from bets where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$bet = new Bet($row);
			return $bet;
		}
	}

	/**
	 * Palauttaa veikkaukseen liittyvän käyttäjän
	 */
	public function user() {
		return User::find($this->user_id);
	}

	/**
	 * Palauttaa veikkauksen liittyvän ottelun
	 */
	public function match() {
		return Match::find($this->match_id);
	}

	/**
	 * Tallentaa veikkauksen
	 */ 
	public function save() {

		$query = 
			"insert into bets (user_id, match_id, home_score, away_score, points_earned, created_on, edited_on) values (" .
				":user_id, " . 
				":match_id, " .
				":home_score, " . 
				":away_score, " .
				":points_earned, " .
				":created_on, " .
				":edited_on" .
			") returning id";

		$params = array(
			"user_id" => $this->user_id,
			"match_id" => $this->match_id,
			"home_score" => $this->home_score,
			"away_score" => $this->away_score,
			"points_earned" => $this->points_earned,
			"created_on" => $this->created_on,
			"edited_on" => $this->edited_on
		); 

		$row = DB::execute($query, $params, false);
		$this->id = $row['id'];
	}

	/**
	 * Päivittää veikkauksen
	 */
	public function update() {

		$query = 
			"update bets " .
			"set home_score = :home_score, away_score = :away_score, edited_on = :edited_on " .
			"where id = :id";

		$params = array(
			"home_score" => $this->home_score,
			"away_score" => $this->away_score,
			"edited_on" => $this->edited_on,
			"id" => $this->id
		); 

		DB::execute($query, $params, false);
	}

	/**
	 * Poistaa veikkauksen
	 */
	public function delete() {
		$query = "delete from bets where id = :id";
		$params = array("id" => $this->id);
		DB::execute($query, $params, false);
	}

	/**
	 * TODO: Validoi veikkauksen
	 */
	public function is_valid() {
		return true;
	}


}
