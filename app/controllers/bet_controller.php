<?php 
class BetController extends BaseController {

	public static function index() {
		$bets = Bet::all();
		echo json_encode($bets);
	}

	public static function show($id) {
		$bet = Bet::find($id);
		echo json_encode($bet);
	}

	public static function create($id) {
		self::check_logged_in();

		$user = self::get_user_logged_in();
		$match = Match::find($id);
		if (date("Y-m-d H:i:s") < date($match->kickoff)) {
			foreach ($user->bets() as $bet) {
				if ($bet->match()->id == $match->id) {
					Redirect::to("/login", array("message" => "Olet jo veikannut ottelua"));
				}
			}
			View::make("bet/new.html", array("user" => $user, "match" => $match));
		} else {
			Redirect::to("/login", array("message" => "Ottelu on jo alkanut"));
		}
	}

	public static function save($id) {
		
	}

}
