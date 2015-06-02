<?php
class HomeController extends BaseController {

	public static function index() {
		self::check_logged_in();
		
		$matches = Match::all();
		$user = self::get_user_logged_in(); 
		$teams = Team::all();

		View::make("index.html", array(
			"matches" => $matches, 
			"user" => $user, 
			"teams" => $teams
		));
	}

}