<?php
class GroupController extends BaseController {

	public static function index() {
		// $groups = Group::all();
		// echo json_encode($groups);
		$teams = Team::all();
		View::make("group/index.html", array("teams" => $teams));
	}

	public static function show($id) {
		$group = Group::find($id);
		echo json_encode($group);
	}

}