<?php 
class BetController extends BaseController {

	// GET /bets
	public static function index() {
		$bets = Bet::all();
		echo json_encode($bets);
	}

	// GET /bet/:id
	public static function show($id) {
		$bet = Bet::find($id);
		echo json_encode($bet);
	}

	// GET /bet/new/:id
	public static function create($id) {
		self::check_logged_in();

		$user = self::get_user_logged_in();
		$match = Match::find($id);

		if (isset($match)) {
			if (self::date_is_upcoming($match->kickoff)) {
				foreach ($user->bets() as $bet) {
					if ($bet->match()->id == $match->id) {
						Redirect::to("/login", array("message" => "Olet jo veikannut ottelua"));
					}
				}
				View::make("bet/new.html", array("user" => $user, "match" => $match));
			} else {
				Redirect::to("/login", array("message" => "Ottelu on jo alkanut"));
			}
		} else {
			Redirect::to("/login", array("message" => "Ottelua ei löydetty"));
		}
	}

	// GET /bet/edit/:id
	public static function edit($id) {
		self::check_logged_in();

		$user = self::get_user_logged_in();
		$match = Match::find($id);

		// Tarkistaa onko ottelua olemassa
		if (isset($match)) {

			// Tarkistaa onko ottelu vielä alkanut
			if (self::date_is_upcoming($match->kickoff)) {

				// Etsii
				foreach ($user->bets() as $bet) {
					if ($bet->match()->id == $match->id) {
						View::make("bet/edit.html", array("match" => $match, "bet" => $bet));
					}
				}
				Redirect::to("/bet/new/{$match->id}", array("message" => "Veikkausta ei löydetty, joten tehdään uusi veikkaus"));
			} else {
				Redirect::to("/login", array("message" => "Ottelu on jo alkanut"));
			}
		} else {
			Redirect::to("/login", array("message" => "Ottelua ei löydetty"));
		}
	}

	// POST /bet
	public static function save() {
		self::check_logged_in();

		$user = self::get_user_logged_in();
		$match = Match::find($_POST["match_id"]);

		if (isset($match)) {
			if (self::date_is_upcoming($match->kickoff)) {
				foreach ($user->bets() as $bet) {
					if ($bet->match()->id == $match->id) {
						Redirect::to("/login", array("message" => "Olet jo veikannut ottelua"));
					}
				}

				$bet = new Bet(array(
					"user_id" => $user->id,
					"match_id" => $match->id,
					"home_score" => $_POST["home_score"],
					"away_score" => $_POST["away_score"],
					"points_earned" => 0,
					"created_on" => date("Y-m-d H:m:s"),
					"edited_on" => date("Y-m-d H:m:s")
				)); 

				if ($bet->is_valid()) {
					$bet->save();
					Redirect::to("/bets", array("message" => "Veikkaus tallennettiin"));
				} else {

				}
			} else {
				Redirect::to("/login", array("message" => "Ottelu on jo alkanut"));
			}
		} else {
			Redirect::to("/login", array("message" => "Ottelua ei löydetty"));
		}
	}

	// PUT /bet
	public static function update() {
		self::check_logged_in();

		$user = self::get_user_logged_in();
		$match = Match::find($_POST["match_id"]);

		if (isset($match)) {
			if (self::date_is_upcoming($match->kickoff)) {
				foreach ($user->bets() as $bet) {

					if ($bet->match()->id == $match->id) {
						$bet->home_score = $_POST["home_score"];
						$bet->away_score = $_POST["away_score"];
						$bet->edited_on = date("Y-m-d H:m:s");

						if ($bet->is_valid()) {
							$bet->update();
							Redirect::to("/bets", array("message" => "Veikkaus tallennettiin"));
						} else {

						}
					}
				}
				Redirect::to("/bets", array("message" => "Veikkaus tallennettiin"));
			} else {
				Redirect::to("/login", array("message" => "Ottelu on jo alkanut"));
			}
		} else {
			Redirect::to("/login", array("message" => "Ottelua ei löydetty"));
		}
	}

	// DESTROY /bet
	public static function delete() {
		self::check_logged_in();

		$user = self::get_user_logged_in();
		$match = Match::find($_POST["match_id"]);

		if (isset($match)) {
			if (self::date_is_upcoming($match->kickoff)) {
				foreach ($user->bets() as $bet) {
					if ($bet->match()->id == $match->id) {
						$bet->delete();
						Redirect::to("/bets", array("message" => "Veikkaus tallennettiin"));
					}
				}
			} else {
				Redirect::to("/login", array("message" => "Ottelu on jo alkanut, joten veikkausta ei voida perua"));
			}
		} else {
			Redirect::to("/login", array("message" => "Ottelua ei löydetty"));
		}
	}

}
