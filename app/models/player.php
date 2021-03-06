<?php
class Player extends BaseModel {

	public $id;
	public $team_id;
	public $firstname;
	public $lastname;
	public $birthday;
	public $nationality;
	public $squadnumber;
	public $position;
	public $is_injured;
	public $is_suspended;
	public $club;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki pelaajat
	 */
	public static function all() {
		$query = "select * from players";
		$rows = DB::execute($query);
		$players = array();
		foreach ($rows as $row) {
			$players[] = new Player($row);
		}
		return $players;
	}

	/*
	 * Hakee ja palauttaa pelaajan
	 */
	public static function find($id) {
		$query = "select * from players where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$player = new Player($row);
		}
		return $player;
	}

	/*
	 * Palauttaa pelaajaan liittyvän joukkueen
	 */
	public static function team() {
		return Team::find($this->team_id);
	}

	/*
	 * Tarkistaa pelasiko pelaaja ottelussa
	 *
	 * @param id ottelun id
	 */
	public function played_in($match) {
		if (isset($match)) {
			if ($this->team_id == $match->home_id) {
				$players = $match->home_team_players();
			} else {
				$players = $match->away_team_players();
			}
			foreach ($players as $player) {
				if ($player->id == $this->id) {
					return true;
				}
			}
		}
		return false;
	}

}
