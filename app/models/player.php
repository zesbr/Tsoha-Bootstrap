<?php
class Player extends BaseModel {

	public static function all() {
		$query = "select * from players";
		return DB::execute($query);
	}

	public static function find($id) {
		$query = "select * from players where id = :id";
		$params = array("id" => $id);
		return DB::execute($query, $params, false);
	}

	public static function getAllPlayersByTeam($id) {
		$query = "select * from players where team_id = :team_id";
		$params = array("team_id" => $id);
	    return DB::execute($query, $params);
	}


}