<?php
class Match extends BaseModel {

	public static function all() {
		$query = 
			"select matches.*, " .
				"(select name from teams where id = matches.home) as hometeamname, " .
				"(select name from teams where id = matches.away) as awayteamname, " .
				"(select code from teams where id = matches.home) as hometeamcode, " .
				"(select code from teams where id = matches.away) as awayteamcode, " .

				"(" .
					"select " .
						"count(*) " .
					"from " .
						"goals " .
					"join " .
						"players on goals.player_id = players.id " .
					"where " .
						"(" .
							"goals.match_id = matches.id and players.team_id = matches.home and goals.is_owngoal = false" . 
						") or (" .
							"goals.match_id = matches.id and players.team_id = matches.away and goals.is_owngoal = true" .
						")" .
				") as hometeamgoals, " .
				
				"(" .
					"select " .
						"count(*) " .
					"from " .
						"goals " .
					"join " .
						"players on goals.player_id = players.id " .
					"where " .
						"(" . 
							"goals.match_id = matches.id and players.team_id = matches.away and goals.is_owngoal = false" . 
						") or (" .
							"goals.match_id = matches.id and players.team_id = matches.home and goals.is_owngoal = true" .
						")" .
				") as awayteamgoals, " .
				"(select name from stages where id = matches.stage_id) as stage, " .
				"(select name from stadiums where id = matches.stadium_id) as stadium, " .
				"(select city from stadiums where id = matches.stadium_id) as city " .
			"from matches";
		return DB::execute($query);
	}

	public static function getMatchesByTeam($id) {
		$query = 
			"select matches.*, " .
				"(select name from teams where id = matches.home) as hometeamname, " .
				"(select name from teams where id = matches.away) as awayteamname, " .
				"(select name from stadiums where id = matches.stadium_id) as stadium, " .
				"(select city from stadiums where id = matches.stadium_id) as city " .
			"from matches " . 
			"where home = :id or away = :id";
		$params = array("id" => $id);
    	return DB::execute($query, $params);
	}

	public static function next() {
		$query = "select * from matches where kickoff > current_timestamp limit 1";
		return DB::execute($query, false);
	}
}