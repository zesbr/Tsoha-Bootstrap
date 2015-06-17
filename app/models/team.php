<?php
class Team extends BaseModel {

	public $id;
	public $name;
	public $code;
	public $group_id;
	public $head_coach_id;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki joukkueet
	 */
	public static function all() {
		$query = "select * from teams";
		$rows = DB::execute($query);
		$teams = array();
		foreach ($rows as $row) {
			$teams[] = new Team($row);
		}
		return $teams;
	}

	/*
	 * Hakee ja palauttaa joukkueen
	 */
	public static function find($id) {
		$query = "select * from teams where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row) {
			$team = new Team($row);
		}
		return $team;
	}

	/*
	 * Hakee ja palauttaa joukkueeseen liittyvän lohkon
	 */
	public function group() {
		return Group::find($this->group_id);
	}

	/*
	 * Hakee ja palauttaa joukkueen valmentajan
	 */
	public function head_coach() {
		return Coach::find($this->head_coach_id);
	}

	/*
	 * Hakee ja palauttaa kaikki joukkueeseen liittyvät pelaajat
	 */
	public function players() {
		$query = "select * from players where team_id = :team_id";
		$params = array("team_id" => $this->id);
		$rows = DB::execute($query, $params);
		$players = array();
		foreach ($rows as $row) {
			$players[] = new Player($row);
		}
		return $players;
	}

	/*
	 * Hakee ja palauttaa kaikki joukkeen ottelut
	 */
	public function matches() {
		$query = "select * from matches where home_id = :team_id or away_id = :team_id";
		$params = array("team_id" => $this->id);
		$rows = DB::execute($query, $params);
		$matches = array();
		foreach ($rows as $row) {
			$matches[] = new Match($row);
		}
		return $matches;
	}

	/*
	 * Hakee ja palauttaa kaikki joukkueen alkulohko-ottelut
	 */
	public function group_matches() {
		$query = "select * from matches where (stage_id = 1 and home_id = :team_id) or (stage_id = 1 and away_id = :team_id)";
		$params = array("team_id" => $this->id);
		$rows = DB::execute($query, $params);
		$matches = array();
		foreach ($rows as $row) {
			$matches[] = new Match($row);
		}
		return $matches;
	}

	/**
	 * Laskee joukkueen tämänhetkisen pistetilaston alkulohkossa
	 */
	public function stats() {
		$played = $wins = $draws = $losses = $scored = $conceded = $points = 0;
		foreach ($this->group_matches() as $match) {
			if ($match->is_confirmed) {
				$home_goals = count($match->homegoals());
				$away_goals = count($match->awaygoals());
				$played++;
				if ($match->home_id == $this->id) {
					if ($home_goals > $away_goals) {
						$wins++;
					} else if ($home_goals == $away_goals) {
						$draws++;
					} else {
						$losses++;
					}
					$scored += $home_goals;
					$conceded += $away_goals;
				} else {
					if ($away_goals > $home_goals) {
						$wins++;
					} else if ($away_goals == $home_goals) {
						$draws++;
					} else {
						$losses++;
					}
					$scored += $away_goals;
					$conceded += $home_goals;
				}
			}
		}

		$points = $wins * 3 + $draws;
		$stats = array(
			"played" => $played,
			"wins" => $wins,
			"draws" => $draws,
			"losses" => $losses,
			"scored" => $scored,
			"conceded" => $conceded,
			"points" => $points
		);
		return $stats;
	}


}