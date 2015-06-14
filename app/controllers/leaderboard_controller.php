<?php
class LeaderboardController extends BaseController {

	# GET /leaderboards
	public static function index() {
		self::check_logged_in();
		$users = User::all();

		View::make('leaderboard/index.html', array('users' => $users));
	}

}