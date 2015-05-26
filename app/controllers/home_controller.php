<?php
class HomeController extends BaseController {

	public static function index() {
		$match = Match::next();
		View::make('index.html', array('matches' => $match));
	}

}