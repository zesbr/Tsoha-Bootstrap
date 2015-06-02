<?php
class TeamController extends BaseController {

	public static function index() {
		$teams = Team::all();
		echo json_encode($teams);
		//View::make('team/index.html', array('teams' => $teams));
	}

	public static function show($id) {
		$team = Team::find($id);
		//echo json_encode($matches);
		View::make('team/show.html', array('team' => $team));
	}
	
}