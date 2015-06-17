<?php
class HomeController extends BaseController {

	# GET /
	public static function index() {
		self::check_logged_in();
		$matches = Match::all();
		$groups = Group::all();

		View::make('index.html', array('matches' => $matches, 'groups' => $groups));
	}

}