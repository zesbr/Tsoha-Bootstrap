<?php
class HomeController extends BaseController {

	public static function index() {
		self::check_logged_in();
		
		$matches = Match::all();
		$user = self::get_user_logged_in(); 
		$standings = Team::getGroupStandings();

		View::make("index.html", array(
			"matches" => $matches, 
			"user" => $user, 
			"standings" => $standings
		));
	}

}