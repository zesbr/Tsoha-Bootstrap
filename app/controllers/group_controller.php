<?php
class GroupController extends BaseController {
	public static function index() {
		$standings = Team::getGroupStandings();
		View::make("group/index.html", array("standings" => $standings));
	}
}