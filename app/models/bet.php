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
		$this->validators = array(
			'validate_home_score',
			'validate_away_score'
		);
		$this->errors = array();
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
	 * Laskee veikkaukselle pisteet
	 *
    * I.   Oikeasta ottelutuloksesta 10 pistettä
    * II.  Oikein veikattu merkki (voittaja / tasapeli) ja maalimäärä toiselle joukkueelle 4 pistettä
    * III. Oikein veikattu merkki (voittaja / tasapeli) 3 pistettä
    * IV.  Oikein veikattu maalimäärä toiselle joukkueelle 1 piste
	 */
	public function calculate_points() {
		$match = $this->match();
		if (!$match->is_confirmed) {
			return 0;
		}

		$homegoals = count($match->homegoals());
		$awaygoals = count($match->awaygoals());

		if ($this->home_score > $this->away_score) {

			if ($homegoals > $awaygoals) {
				if (($this->home_score == $homegoals) && ($this->away_score == $awaygoals)) {
					return 10;
				} else if (($this->home_score == $homegoals) || ($this->away_score == $awaygoals)) {
					return 4;
				} else {
					return 3;
				}
			} else {
				if ($this->home_score == $homegoals || $this->away_score == $awaygoals) {
					return 1;
				} else {
					return 0;
				}
			}
		} else if ($this->home_score < $this->away_score) {

			if ($homegoals < $awaygoals) {
				if (($this->home_score == $homegoals) && ($this->away_score == $awaygoals)) {
					return 10;
				} else if ($this->home_score == $homegoals || $this->away_score == $awaygoals) {
					return 4;
				} else {
					return 3;
				}
			} else {
				if ($this->home_score == $homegoals || $this->away_score == $awaygoals) {
					return 1;
				} else {
					return 0;
				}
			}
		} else {

			if ($homegoals == $awaygoals) {
				if ($this->home_score == $homegoals && $this->away_score == $awaygoals) {
					return 10;
				} else if ($this->home_score == $homegoals || $this->away_score == $awaygoals) {
					return 4;
				} else {
					return 3;
				}
			} else {
				if ($this->home_score == $homegoals || $this->away_score == $awaygoals) {
					return 1;
				} else {
					return 0;
				}
			}
		}
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
			"set home_score = :home_score, away_score = :away_score, points_earned = :points_earned, edited_on = :edited_on " .
			"where id = :id";

		$params = array(
			"home_score" => $this->home_score,
			"away_score" => $this->away_score,
			"points_earned" => $this->points_earned,
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
	 * Validoi veikkauksen kotijoukkueen maalimäärän
	 */
	public function validate_home_score() {

		if (!is_numeric($this->home_score)) {
			$this->errors["home_score"] = "Kotijoukkueen maalimäärä ei ollut luku";
		} else if ($this->home_score < 0 || $this->home_score > 50) {
			$this->errors["home_score"] = "Kotijoukkueen maalimäärä ei ollut välillä 0 - 50";
		}

	}

	/** 
	 * Validoi veikkauksen vierasjoukkueen maalimäärän
	 */
	public function validate_away_score() {

		if (!is_numeric($this->away_score)) {
			$this->errors["home_score"] = "Vierasjoukkueen maalimäärä ei ollut luku";
		} else if ($this->away_score < 0 || $this->away_score > 50) {
			$this->errors["away_score"] = "Vierasjoukkueen maalimäärä ei ollut välillä 0 - 50";
		}

	}


}
