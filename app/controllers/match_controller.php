<?php
class MatchController extends BaseController {
	
	public static function index() {
		$matches = Match::all();
		echo json_encode($matches);
		// View::make('match/index.html', array("matches" => $matches));
	}

	public static function show($id) {
		$match = Match::find($id);
		echo json_encode($match);
		// View::make('match/index.html', array("matches" => $matches));
	}
	
}
