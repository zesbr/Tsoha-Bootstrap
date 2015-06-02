<?php
class GroupController extends BaseController {

	public static function index() {
		$groups = Group::all();
		// echo json_encode($groups);
		View::make("group/index.html", array("groups" => $groups));
	}

	public static function show($id) {
		$group = Group::find($id);
		echo json_encode($group);
	}

}