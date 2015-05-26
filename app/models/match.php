<?php
class Match extends BaseModel {

	public static function all() {
		$query = 
			"select matches.*, " .
				"(select name from teams where id = matches.home) as hometeamname, " .
				"(select name from teams where id = matches.away) as awayteamname, " .
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