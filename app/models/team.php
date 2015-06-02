<?php
class Team extends BaseModel implements ORM {

	public $id;
	public $name;
	public $code;
	public $group_id;

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
	 * TODO: Siirrä toiminnallisuus Player -luokkaan
	 * Hakee ja palauttaa kaikki joukkueeseen liittyvät pelaajat
	 */
	public function players() {
		$query = "select * from players where team_id = :team_id";
		$params = array("team_id" => $this->id);
		$rows = DB::execute($query, $params);
		$players = array();
		foreach ($rows as $row) {
			$players[] = new Player(array(
				"id" => $row["id"],
				"team" => $this,
				"firstname" => $row["firstname"],
				"lastname" => $row["lastname"],
				"birthday" => $row["birthday"],
				"nationality" => $row["nationality"],
				"squadnumber" => $row["squadnumber"],
				"position" => $row["position"],
				"is_injured" => $row["is_injured"],
				"is_suspended" => $row["is_suspended"],
				"club" => $row["club"]
			));
		}
		return $players;
	}

	/*
	 * TODO: Siirrä toiminnallisuus Match -luokkaan
	 * Hakee kaikki joukkeen ottelut tietokannasta ja palauttaa taulukon Match-olioita
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
	 * TODO: Siirrä toiminnallisuus Match -luokkaan
	 * Hakee kaikki joukkeen alkulohko ottelut tietokannasta ja palauttaa taulukon Match-olioita
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

	/*
	 * Palauttaa ottelut, jotka joukkue on voittanut alkulohkossa taulukkona Match-olioita
	 */
	public function wins() {
		$matches = array();
		foreach ($this->group_matches() as $match) {
			$winner = $match->winner();
			if ($winner != null && $winner->id == $this->id) {
				$matches[] = $match;
			}
		}
		return $matches;
	}

	/*
	 * Palauttaa ottelut, jotka joukkue on hävinnyt alkulohkossa taulukkona Match-olioita
	 */
	public function losses() {
		$matches = array();
		foreach ($this->group_matches() as $match) {
			$winner = $match->winner();
			if ($winner != null && $winner->id != $this->id) {
				$matches[] = $match;
			}
		}
		return $matches;
	}

	/*
	 * Palauttaa ottelut, jotka joukkue on pelannut tasan alkulohkossa taulukkona Match-olioita
	 */
	public function draws() {
		$matches = array();
		foreach ($this->group_matches() as $match) {
			$winner = $match->winner();
			if ($winner == null && date("Y-m-d H:i:s") > date($match->kickoff)) {
				$matches[] = $match;
			}
		}
		return $matches;
	}

	/*
	 * Palauttaa maalit, jotka joukkue on tehnyt alkulohkossa taulukkona Goal-olioita
	 */
	public function scored() {
		$goals = array();
		foreach ($this->group_matches() as $match) {
		 	if ($match->home()->id == $this->id) {
		 		$goals[] = $match->homegoals();
		 	} else {
		 		$goals[] = $match->awaygoals();
		 	}
		}
		return $goals;
	}

	/*
	 * Palauttaa maalit, jotka joukkue on päästänyt alkulohkossa taulukkona Goal-olioita
	 */
	public function conceded() {
		$goals = array();
		foreach ($this->group_matches() as $match) {
		 	if ($match->home()->id == $this->id) {
		 		$goals[] = $match->awaygoals();
		 	} else {
		 		$goals[] = $match->homegoals();
		 	}
		}
		return $goals;
	}

	/*
	 * Palauttaa joukkueen pisteet alkulohkossa
	 */
	public function points() {
		return count($this->wins()) * 3 + count($this->draws());
	} 



	/*
	 * TODO: 
	 * REFAKTOROI TÄSTÄ ALASPÄIN!!!
	 */

	public static function getAllTeamsSortedInGroups() {
		$query = 
		"
			SELECT 
				Teams.id, 
				Teams.name, 
				Teams.code, 
				Teams.group_id, 
				Groups.title 
			FROM 
				Teams 
			INNER JOIN 
				Groups on Teams.group_id = groups.id
			ORDER BY 
				Teams.group_id";

		return DB::execute($query);
	}

	public static function getTeamsByGrouId($id) {
		$query = 
			"select teams.id, teams.name, teams.code, teams.group_id, groups.title " .
			"from teams join groups on teams.group_id = groups.id " .
			"where teams.group_id = :id " .
			"order by teams.group_id";
		$params = array("id" => $id);
		return DB::execute($query, $params);
	}

	public static function getGroupStandings() {
		$query = 
			"select " .
				"teams.*, " .
				"(" . self::getQueryForPlayedMatches() . ") as played, " .
				"(" . self::getQueryForWins() . ") as wins, " .
				"(" . self::getQueryForDraws() . ") as draws, " .
				"(" . self::getQueryForLosses() . ") as losses, " .
				"(" . self::getQueryForScoredGoals() . ") as scored, " .
				"(" . self::getQueryForConcededGoals() .") as conceded, " .
				"(" . self::getQueryForPoints() . ") as points " .
			"from " .
				"teams " . 
			"order by " .
				"points desc, wins desc, scored desc"; 

		return DB::execute($query);
	}

	public static function getQueryForPlayedMatches() {
		return 	"(" . self::getQueryForPlayedHomeMatches() . ") + (" . self::getQueryForPlayedAwayMatches() . ")";
	}

	public static function getQueryForPlayedHomeMatches() {
		return 
			"select " . 
				"count(*) " .
			"from " .
				"matches " .
			"where " . 
				"matches.kickoff < now() and " . 
				"matches.home_id = teams.id";
	}

	public static function getQueryForPlayedAwayMatches() {
		return 
			"select " .
				"count(*) " .
			"from " .
				"matches " .
			"where " .
				"matches.kickoff < now() and " .
				"matches.away_id = teams.id";
	}

	public static function getQueryForWins() {
		return "(" . self::getQueryForHomeWins() . ") + (" . self::getQueryForAwayWins() . ")";
	}

	public static function getQueryForHomeWins() {
		return
			"select count(*) from matches where matches.kickoff < now() and matches.home_id = teams.id and (" . 
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = true)" . 
			") > (" .
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = true)" .
			")";
	}

	public static function getQueryForAwayWins() {
		return
			"select count(*) from matches where matches.kickoff < now() and matches.away_id = teams.id and (" . 
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = true)" . 
			") > (" .
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = true)" .
			")";
	}

	public static function getQueryForDraws() {
		return "(" . self::getQueryForHomeDraws() . ") + (" . self::getQueryForAwayDraws() . ")";
	}

	public static function getQueryForHomeDraws() {
		return 
			"select count(*) from matches where matches.kickoff < now() and matches.home_id = teams.id and (" . 
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = true)" . 
			") = (" .
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = true)" .
			")";
	}

	public static function getQueryForAwayDraws() {
		return 
			"select count(*) from matches where matches.kickoff < now() and matches.away_id = teams.id and (" . 
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = true)" . 
			") = (" .
				"select count(*) from goals join players on goals.player_id = players.id where " .
				"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = false) or " .
				"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = true)" .
			")";
	}

	public static function getQueryForLosses() {
		return "(" . self::getQueryForHomeLosses() . ") + (" . self::getQueryForAwayLosses() . ")";
	}

	public static function getQueryForHomeLosses() {
		return 
			"select " .
				"count(*) " . 
			"from " .
				"matches " .
			"where " .
				"matches.kickoff < now() and " .
				"matches.home_id = teams.id and ". 
				"(" . 
					"select " .
						"count(*) " .
					"from " . 
						"goals " .
					"join " .
						"players on goals.player_id = players.id " .
					"where " .
						"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = false) or " .
						"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = true)" . 
				")" . 
				" < " .
				"(" .
					"select " .
						"count(*) " .
					"from " .
						"goals " .
					"join " .
						"players on goals.player_id = players.id " .
					"where " .
						"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = false) or " .
						"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = true)" .
				")";
	}

	public static function getQueryForAwayLosses() {
		return 
			"select " . 
				"count(*) " .
			"from " .
				"matches " .
			"where " .
				"matches.kickoff < now() and matches.away_id = teams.id and " . 
				"(" . 
					"select " .
						"count(*) " .
					"from " .
						"goals " .
							"join players on goals.player_id = players.id " .
						"where " .
							"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = false) or " .
							"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = true)" . 
				")" .
				" < " . 
				"(" . 
					"select " .
						"count(*) " .
					"from " .
						"goals " .
					"join " .
						"players on goals.player_id = players.id " . 
					"where " .
						"(goals.match_id = matches.id and players.team_id != teams.id and goals.is_owngoal = false) or " .
						"(goals.match_id = matches.id and players.team_id = teams.id and goals.is_owngoal = true)" .
				")";
	}

	public static function getQueryForScoredGoals() {
		return "(" . self::getQueryForScoredHomeGoals() . ") + (" . self::getQueryForScoredAwayGoals() . ")";
	}

	public static function getQueryForScoredHomeGoals() {
		return 
			"select " .
				"count(*) " .
			"from " .
				"goals " .
			"join " .
				"players on goals.player_id = players.id " .
			"where " .
				"(goals.match_id in (select id from matches where home_id = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where home_id = teams.id) and " .
				"(players.team_id != teams.id and goals.is_owngoal = true))";
	}

	public static function getQueryForScoredAwayGoals() {
		return 
			"select " .
				"count(*) " .
			"from " .
				"goals " .
			"join " .
				"players on goals.player_id = players.id " .
			"where " .
				"(goals.match_id in (select id from matches where away_id = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where away_id = teams.id) and " .
				"(players.team_id != teams.id and goals.is_owngoal = true))";
	}

	public static function getQueryForConcededGoals() {
		return "(" . self::getQueryForConcededHomeGoals() . ") + (" . self::getQueryForConcededAwayGoals() . ")";
	}

	public static function getQueryForConcededHomeGoals() {
		return 
			"select " .
				"count(*) " . 
			"from " .
				"goals " .
			"join " .
				"players on goals.player_id = players.id " .
			"where " . 
				"(goals.match_id in (select id from matches where home_id = teams.id) and " .
				"(players.team_id != teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where home_id = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = true))";
	}

	public static function getQueryForConcededAwayGoals() {
		return 
			"select " .
				"count(*) " . 
			"from " .
				"goals " .
			"join " .
				"players on goals.player_id = players.id " .
			"where " . 
				"(" .
					"goals.match_id in (" .
						"select id ".
						"from matches " .
						"where away_id = teams.id" .
					") and (players.team_id != teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where away_id = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = true))";
	
	}

	public static function getQueryForPoints() {
		return "(" . self::getQueryForWins() . ") * 3 + (" . self::getQueryForDraws() . ")";
	}

}

