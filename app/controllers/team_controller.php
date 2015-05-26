<?php
class TeamController extends BaseController {

	public static function index() {
		$teams = Team::all();
		View::make('team/index.html', array('teams' => $teams));
	}

	public static function show($id) {
		$team = Team::find($id);
		$players = Player::getAllPlayersByTeam($id);
		$matches = Match::getMatchesByTeam($id);
		View::make('team/show.html', array('team' => $team, 'players' => $players, 'matches' => $matches));
	}
	
}