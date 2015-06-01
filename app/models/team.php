<?php
class Team extends BaseModel {

	public static function all() {
		$query = "select * from teams";
		return DB::execute($query);
	}
	public static function find($id) {
		$query = "select * from teams where id = :id LIMIT 1";
		$params = array("id" => $id);
		return DB::execute($query, $params, false);
	}

	// Query helpers

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



	/**
	 *	Lohkovaiheen pistetaulukko
	 *	TODO: LISÄÄ JOKAISEEN KYSELYYN SEURAAVA: "match.stage_id = 1"
	 */
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
		return "select count(*) from matches where matches.kickoff < now() and matches.home = teams.id";
	}

	public static function getQueryForPlayedAwayMatches() {
		return "select count(*) from matches where matches.kickoff < now() and matches.away = teams.id";
	}

	public static function getQueryForWins() {
		return "(" . self::getQueryForHomeWins() . ") + (" . self::getQueryForAwayWins() . ")";
	}

	public static function getQueryForHomeWins() {
		return
			"select count(*) from matches where matches.kickoff < now() and matches.home = teams.id and (" . 
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
			"select count(*) from matches where matches.kickoff < now() and matches.away = teams.id and (" . 
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
			"select count(*) from matches where matches.kickoff < now() and matches.home = teams.id and (" . 
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
			"select count(*) from matches where matches.kickoff < now() and matches.away = teams.id and (" . 
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
				"matches.kickoff < now() and matches.home = teams.id and ". 
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
				"matches.kickoff < now() and matches.away = teams.id and " . 
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
				"(goals.match_id in (select id from matches where home = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where home = teams.id) and " .
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
				"(goals.match_id in (select id from matches where away = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where away = teams.id) and " .
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
				"(goals.match_id in (select id from matches where home = teams.id) and " .
				"(players.team_id != teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where home = teams.id) and " .
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
						"where away = teams.id" .
					") and (players.team_id != teams.id and goals.is_owngoal = false)) or " .
				"(goals.match_id in (select id from matches where away = teams.id) and " .
				"(players.team_id = teams.id and goals.is_owngoal = true))";
	
	}

	public static function getQueryForPoints() {
		return "(" . self::getQueryForWins() . ") * 3 + (" . self::getQueryForDraws() . ")";
	}

}

