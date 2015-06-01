<?php
class HomeController extends BaseController {

	public static function index() {
		$matches = Match::all();
		$standings = Team::getGroupStandings();

		View::make('index.html', array('matches' => $matches, 'standings' => $standings));
	}

}