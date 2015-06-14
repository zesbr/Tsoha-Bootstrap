<?php
class Match extends BaseModel {

	public $id;
	public $stage_id;
	public $home_id; // home_team_id
	public $away_id;	// away_team_id
	public $kickoff; // date_and_time
	public $stadium_id;
	public $is_confirmed;

	public function __construct($attributes){
		parent::__construct($attributes);
	}
	
	/**
	 * Hakee ja palauttaa kaikki ottelut
	 */
	public static function all() {
		$query = "select * from matches order by kickoff";
		$rows = DB::execute($query);
		$matches = array();
		foreach ($rows as $row) {
			$matches[] = new Match($row);
		}
		return $matches;
	}

	/**
	 * Hakee ja palauttaa ottelun
	 */
	public static function find($id) {
		$query = "select * from matches where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$match = new Match($row);
		}
		return $match;
	}

	/**
	 * Palauttaa otteluun liittyvän vaiheen
	 */
	public function stage() {
		return Stage::find($this->stage_id);
	}

	/**
	 * Palauttaa ottelun joukkueet
	 */
	public function teams() {
		$query = "select * from teams where id = :home_id or id = :away_id";
		$params = array("home_id" => $this->home_id, "away_id" => $this->away_id);
		$rows = DB::execute($query, $params);
		$teams = array();
		foreach ($rows as $row) {
			$teams[] = new Team($row);
		}
		return $teams;
	}

	/**
	 * Palauttaa otteluun liittyvän kotijoukkueen
	 */
	public function home() {
		return Team::find($this->home_id);
	}

	/**
	 * Palauttaa otteluun liittyvän vierasjoukkueen
	 */
	public function away() {
		return Team::find($this->away_id);
	}

	/**
	 * Palauttaa otteluun liittyvän stadionin
	 */
	public function stadium() {
		return Stadium::find($this->stadium_id);
	}

	/**
	 * Palauttaa ottelun pelaajat
	 */
	public function players() {
		$query = "select * from players where team_id = :home_id or team_id = :away_id";
		$params = array("home_id" => $this->home_id, "away_id" => $this->away_id);
		$rows = DB::execute($query, $params);
		$players = array();
		foreach ($rows as $row) {
			$players[] = new Player($row);
		}
		return $players;
	}

	/**
	 * Palauttta kotijoukkueen pelaajat
	 */
	public function home_team_players() {
		$query = "select * from players where team_id = :home_id";
		$params = array("home_id" => $this->home_id);
		$rows = DB::execute($query, $params);
		$players = array();
		foreach ($rows as $row) {
			$players[] = new Player($row);
		}
		return $players;
	}

	/**
	 * Palauttta vierasjoukkueen pelaajat
	 */
	public function away_team_players() {
		$query = "select * from players where team_id = :away_id";
		$params = array("away_id" => $this->away_id);
		$rows = DB::execute($query, $params);
		$players = array();
		foreach ($rows as $row) {
			$players[] = new Player($row);
		}
		return $players;
	}

	/**
	 * Hakee kaiki otteluun kohdistuneet veikkaukset ja palauttaa taulukon Bet-olioita
	 */
	public function bets() {
		$query = "select * from bets where match_id = :match_id";
		$params = array("match_id" => $this->id);
		$rows = DB::execute($query, $params);
		$bets = array();
		foreach ($rows as $row) {
			$bets[] = new Bet($row);
		}
		return $bets;
	}

	/**
	 * Hakee kaikki ottelun maalit
	 */
	public function goals() {
		$query = "select * from goals where match_id = :match_id order by minute";
		$params = array("match_id" => $this->id);
		$rows = DB::execute($query, $params);
		$goals = array();

		foreach ($rows as $row) {
			$goals[] = new Goal($row);
		}
		return $goals;
	}

	/**
	 * Hakee kaikki kotijoukkueen maalit ja palauttaa taulukon Goal-olioita
	 */
	public function homegoals() {
		$query = 
			"select goals.* from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = :match_id and players.team_id = :team_id and goals.is_owngoal = false) or " .
				"(goals.match_id = :match_id and players.team_id != :team_id and goals.is_owngoal = true)";
		
		$params = array("match_id" => $this->id, "team_id" =>  $this->home()->id);
		$rows = DB::execute($query, $params);
		$goals = array();
		
		foreach ($rows as $row) {
			$goals[] = new Goal($row);
		}
		return $goals;
	}

	/**
	 * Hakee kaikki vierasjoukkueen maalit ja palauttaa taulukon Goal-olioita
	 */
	public function awaygoals() {
		$query = 
		"select goals.* from goals join players on goals.player_id = players.id where " .
			"(goals.match_id = :match_id and players.team_id = :team_id and goals.is_owngoal = false) or " .
			"(goals.match_id = :match_id and players.team_id != :team_id and goals.is_owngoal = true)";

		$params = array("match_id" => $this->id, "team_id" =>  $this->away()->id);
		$rows = DB::execute($query, $params);
		$goals = array();
		
		foreach ($rows as $row) {
			$goals[] = new Goal($row);
		}
		return $goals;
	}

	/**
	 * Palauttaa ottelu voittajan Team-oliona tai null-viitteen jos ottelua ei ole vielä pelattu
	 * tai jos ottelu päättyi tasan
	 */
	public function winner() {
		if (date("Y-m-d H:i:s") > date($this->kickoff)) {
			$homegoals = $this->homegoals();
			$awaygoals = $this->awaygoals();
			if (count($homegoals) > count($awaygoals)) {
				return $this->home();
			} else if (count($homegoals) < count($awaygoals)) {
				return $this->away();
			}
		}
		return null;
	}

	/**
	 * Tarkistaa onko ottelu tulossa ja palauttaa totuusarvon
	 */
	public function is_upcoming() {
		//exit();
		if (date("Y-m-d H:i:s", strtotime('-6 hours')) < $this->kickoff) {
			return true;
		}
		return false;
	}

	/**
	 * Tarkistaa onko ottelu jo pelattu
	 */
	public function has_ended() {
		// $date_string = $this->kickoff . ' +90 minutes';
		// echo date("Y-m-d H:i:s", strtotime('-6 hours')) . ' > ' . date('Y-m-d H:i:s', strtotime('+90 minutes', strtotime($this->kickoff)));
		//exit();

		if (date("Y-m-d H:i:s", strtotime('-6 hours')) > date('Y-m-d H:i:s', strtotime('+2 hours', strtotime($this->kickoff)))) {
			return true;
		}
		return false;
	}

	/** 
	 * Tarkistaa onko ottelu menossa
	 */
	public function is_ongoing() {
		if (!$this->is_upcoming() && !$this->has_ended()) {
			return true;
		}
		return false;
	}

	/**
	 *
	 */

	/**
	 *
	 */
	public function save() {

	}

	/**
	 * Päivittää ottelun
	 */
	public function update() {

		$query = 
			"update matches " .
			"set is_confirmed = :is_confirmed " .
			"where id = :id";

		$params = array(
			"is_confirmed" => $this->is_confirmed,
			"id" => $this->id
		); 

		DB::execute($query, $params);
	}

	/** 
	 *
	 */
	public function delete() {

	}

}
