<?php
class GoalController extends BaseController {

	# GET /goals
	public static function index() {
		$goals = Goal::all();
		echo json_encode($goals);
	}

	# GET /goal/:id
	public static function show($id) {
		$goal = Goal::find($id);
		echo json_encode($goal);
	}

	# GET /goal/new:match_id
	# 		/match/:id/goal/new
	public static function create($id) {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($id);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua'));
		}
		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelua ei löytynyt'));
		}
		View::make('goal/new.html', array('match' => $match));
	}

	# GET /goal/edit/:id
	#		/goal/:id/edit
	public static function edit($id) {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$goal = Goal::find($id);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua'));
		}
		if (!isset($goal)) {
			Redirect::to('/matches', array('message' => 'Maalia ei löytynyt'));
		}
		View::make('goal/edit.html', array('goal' => $goal));
	}

	# POST /goal
	public static function save() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$match = Match::find($_POST['match_id']);
		$player = Player::find($_POST['player_id']);
		
		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua'));
		}
		if (!isset($match)) {
			Redirect::to('/matches', array('message' => 'Ottelu ei löytynyt'));
		}
		if ($match->is_upcoming()) {
			Redirect::to('/matches', array('message' => 'Ottelu ei ole vielä alkanut'));
		}
		if (!isset($player)) {
			Redirect::to('/goal/new/{$match->id}', array('match' => $match, 'message' => 'Pelaaja ei löytynyt'));
		}
		if (!$player->played_in($match)) {
			Redirect::to('/goal/new/{$match->id}', array('match' => $match, 'message' => 'Pelaaja ei pelannut ottelussa'));
		}

		$goal = new Goal(array(
			'match_id' => $_POST['match_id'],
			'player_id' => $_POST['player_id'],
			'minute' => $_POST['minute'],
			'is_owngoal' => 0,
			'from_penalty' => 0
		));

		if ($goal->is_valid()) {
			$goal->save();
			Redirect::to('/match/edit/' . $match->id, array('message' => 'Maali tallennettiin onnistuneesti'));
		} else {
			Redirect::to('/goal/new/' . $match->id, array('match' => $match, 'errors' => $goal->errors));
		}
	}

	# PUT /goal
	public static function update() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$goal = Goal::find($_POST['id']);
		$player = Player::find($_POST['player_id']);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua'));
		}
		if (!isset($goal)) {
			Redirect::to('/matches', array('message' => 'Maalia ei löytynyt'));
		}
		if (!isset($player)) {
			Redirect::to('/goal/edit/{$goal->id}', array('goal' => $goal, 'message' => 'Pelaaja ei löytynyt'));
		}
		if (!$player->played_in($match)) {
			Redirect::to('/goal/edit/{$goal->id}', array('goal' => $goal, 'message' => 'Pelaaja ei pelannut ottelussa'));
		}

		$goal->player_id = $player->id;
		$goal->minute = $_POST['minute'];
		$goal->is_owngoal = 0; // TODO
		$goal->from_penalty = 0; // TODO

		if ($goal->is_valid()) {
			$goal->update();
			Redirect::to('/matches', array('message' => 'Maali päivitettiin onnistuneesti'));
		} else {
			Redirect::to('/goal/edit/{$goal->id}', array('goal' => $goal, 'errors' => $goal->errors));
		}
	}

	# DELETE /goal
	public static function delete() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$goal = Goal::find($_POST['id']);

		if (!$user_logged_in->is_admin) {
			Redirect::to('/matches', array('message' => 'Sinulla ei ole oikeuksia päivittää ottelua'));
		}
		if (!isset($goal)) {
			Redirect::to('/matches', array('message' => 'Maalia ei löytynyt'));
		}

		// TODO: Päivitä veikkaukset ennen poistoa
		// if ($goal->can_be_deleted()) {
			$goal->delete();
			Redirect::to('/matches', array('message' => 'Maali poistettiin onnistuneesti!'));
		// } else {

		// }
	}

}
