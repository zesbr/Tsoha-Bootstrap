<?php
class MatchController extends BaseController {
	
	# GET /matches
	public static function index() {
		self::check_logged_in();
		$matches = Match::all();
		View::make('match/index.html', array("matches" => $matches));
	}

	# GET /match/:id
	public static function show($id) {
		$match = Match::find($id);
		//echo json_encode($match);
		View::make('match/show.html', array("match" => $match));
	}
	
	# GET /match/new
	public static function create() {
		// TODO
	}

	# GET /match/edit/:id
	public static function edit($id) {
		$match = Match::find($id);
		View::make('match/edit.html', array("match" => $match));
	}

	# POST /match
	public static function save() {
		// TODO
	}

	# PUT /match
	public static function update() {
		// TODO
	}

	# DELETE /match
	public static function delete() {
		// TODO
	}

	# PUT /match/confirm
	public static function confirm() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($_POST['match_id']);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua', 'message_type' => 'warning'));
		}
		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelu ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$match->has_ended()) {
			Redirect::to('/matches', array('message' => 'Ottelu ei ole vielä päättynyt', 'message_type' => 'warning'));
		}
		
		$match->is_confirmed = 1;
		$match->update();

		foreach ($match->bets() as $bet) {
			$points_earned = $bet->calculate_points();
			$bet->points_earned = $points_earned;
			$bet->update();
		}
		Redirect::to('/match/show/' . $match->id, array('message' => 'Ottelu päivitetty', 'message_type' => 'success'));
	}

	# DELETE /match/goals
	public static function delete_goals() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($_POST['match_id']);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua', 'message_type' => 'warning'));
		}
		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelu ei löytynyt', 'message_type' => 'warning'));
		}
		if ($match->is_confirmed) {
			Redirect::to('/matches', array('message' => 'Ottelu on jo vahvistettu', 'message_type' => 'warning'));
		}
		
		foreach ($match->goals() as $goal) {
			$goal->delete();
		}

		Redirect::to('/match/edit/' . $match->id, array('message' => 'Ottelu päivitetty', 'message_type' => 'success'));
	}
	
}
