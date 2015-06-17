<?php 
class BetController extends BaseController {

	# GET /bets
	public static function index() {
		self::check_logged_in();
		$user = self::get_user_logged_in();
		$bets = Bet::all();
		echo json_encode($bets);
	}

	# GET /bet/:id
	public static function show($id) {
		$bet = Bet::find($id);
		echo json_encode($bet);
	}

	# GET match/:id/bet/new
	public static function create($id) {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($id);

		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelua ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$match->is_upcoming()) {
			Redirect::to('/matches', array('message' => 'Ottelu on jo alkanut', 'message_type' => 'warning'));
		}
		if ($user_logged_in->has_betted($match)) {
			Redirect::to('/matches', array('message' => 'Olet jo veikannut ottelua', 'message_type' => 'warning'));
		}
		View::make('bet/new.html', array('match' => $match));	
	}

	# GET match/:id/bet/edit
	public static function edit($id) {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($id);

		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelua ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$match->is_upcoming()) {
			Redirect::to('/matches', array('message' => 'Ottelu on jo alkanut', 'message_type' => 'warning'));
		}
		foreach ($user_logged_in->bets() as $bet) {
			if ($bet->match_id == $match->id) {
				View::make('bet/edit.html', array('match' => $match, 'bet' => $bet));
			}
		}
		Redirect::to('/matches' . $match->id, array('message' => 'Veikkausta ei löytynyt', 'message_type' => 'warning'));		
	}

	# POST /bet
	public static function save() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($_POST['match_id']);

		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelua ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$match->is_upcoming()) {
			Redirect::to('/matches', array('message' => 'Ottelu on jo alkanut', 'message_type' => 'warning'));
		}
		if ($user_logged_in->has_betted($match)) {
			Redirect::to('/matches', array('message' => 'Olet jo veikannut ottelua', 'message_type' => 'warning'));
		}

		$bet = new Bet(array(
			'user_id' => $user_logged_in->id,
			'match_id' => $match->id,
			'home_score' => $_POST['home_score'],
			'away_score' => $_POST['away_score'],
			'points_earned' => 0,
			'created_on' => date('Y-m-d H:m:s'),
			'edited_on' => date('Y-m-d H:m:s')
		)); 

		if ($bet->is_valid()) {
			$bet->save();
			Redirect::to('/matches', array('message' => 'Veikkaus tallennettiin onnistuneesti', 'message_type' => 'success'));
		} else {
			Redirect::to('/match/' . $match->id . '/bet/new', array(
				'bet' => $bet, 
				'message' => 'Veikkauksen tallennus epäonnistui', 
				'message_type' => 'error',
				'errors' => $bet->errors
			));
		}	
	}

	# PUT /bet
	public static function update() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($_POST['match_id']);

		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelua ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$match->is_upcoming()) {
			Redirect::to('/matches', array('message' => 'Ottelu on jo alkanut', 'message_type' => 'warning'));
		}
		foreach ($user_logged_in->bets() as $bet) {
			if ($bet->match_id == $match->id) {

				$bet->home_score = $_POST['home_score'];
				$bet->away_score = $_POST['away_score'];

				if ($bet->is_valid()) {
					$bet->update();
					Redirect::to('/matches', array('message' => 'Veikkaus päivitettiin onnistuneesti', 'message_type' => 'success'));
				} else {
					Redirect::to('/match/' . $match->id . '/bet/edit', array(
						'bet' => $bet, 
						'message' => 'Veikkauksen päivittäminen epäonnistui', 
						'message_type' => 'error',
						'errors' => $bet->errors
					));
				}
			}
		}
		Redirect::to('/matches' . $match->id, array('message' => 'Veikkausta ei löytynyt'));	
	}

	# DELETE /bet
	public static function delete() {
		self::check_logged_in();
		$user = self::get_user_logged_in();
		$match = Match::find($_POST['match_id']);

		if (isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelua ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$match->is_upcoming()) {
			Redirect::to('/matches', array('message' => 'Ottelu on jo alkanut', 'message_type' => 'warning'));
		}
		foreach ($user->bets() as $bet) {
			if ($bet->match_id == $match->id) {
				// if ($bet->can_be_deleted())
				$bet->delete();
				Redirect::to('/matches', array('message' => 'Veikkaus poistettiin', 'message_type' => 'success'));
			}
		}
		Redirect::to('/matches' . $match->id, array('message' => 'Veikkausta ei löytynyt', 'message_type' => 'warning'));	
	}

}
