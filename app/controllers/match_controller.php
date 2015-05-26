<?php
class MatchController extends BaseController {
	
	public static function index() {
		$matches = Match::all();
		View::make('match/index.html', array("matches" => $matches));
	}
	
}