<?php
class Stage extends BaseModel implements ORM {

	public $id;
	public $name;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	/**
	 * Hakee ja palauttaa kaikki vaiheet
	 */
	public static function all() {
		$query = "select * from stages";
		$rows = DB::execute($query);
		$stages = array();
		foreach ($rows as $row) {
			$stages[] = new Stage($row);
		}
		return $stages;
	}

	/*
	 * Hakee ja palauttaa vaiheen
	 */
	public static function find($id) {
		$query = "select * from stages where id = :id limit 1";
		$params = array("id" => $id);
		$row = DB::execute($query, $params, false);
		if ($row){
			$stage = new Stage($row);
		}
		return $stage;
	}

}