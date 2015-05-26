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

}