<?php
class Match extends BaseModel {

	public $id;
	public $stage_id;
	public $home_id;
	public $away_id;
	public $kickoff;
	public $stadium_id;

	public function __construct($attributes){
		parent::__construct($attributes);
	}
	
	/**
	 * Hakee ja palauttaa kaikki ottelut
	 */
	public static function all() {
		$query = "select * from matches";
		$rows = DB::execute($query);
		$matches = array();
		foreach ($rows as $row) {
			$matches[] = new Match($row);
		}
		return $matches;
	}

	/*
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

	/*
	 * Palauttaa otteluun liittyvän vaiheen
	 */
	public function stage() {
		return Stage::find($this->stage_id);
	}

	/*
	 * Palauttaa otteluun liittyvän kotijoukkueen
	 */
	public function home() {
		return Team::find($this->home_id);
	}

	/*
	 * Palauttaa otteluun liittyvän vierasjoukkueen
	 */
	public function away() {
		return Team::find($this->away_id);
	}

	/*
	 * Palauttaa otteluun liittyvän stadionin
	 */
	public function stadium() {
		return Stadium::find($this->stadium_id);
	}

	/*
	 * Hakee kaiki otteluun kohdistuneet veikkaukset ja palauttaa taulukon Bet-olioita
	 */
	public function bets() {
		$query = "select * from bets where match_id = :match_id";
		$params = array("match_id" => $this->id);
		$rows = DB::execute($query, $params);
		foreach ($rows as $row) {
			$bets[] = new Bet($row);
		}
		return $bets;
	}

	/*
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

	/*
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

	/*
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

}
