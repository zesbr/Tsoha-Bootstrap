<?php
class GoalController extends BaseController {

	public static function index() {
		$goals = Goal::all();
		echo json_encode($goals);
	}

	public static function show($id) {
		$goal = Goal::find($id);
		echo json_encode($goal);
	}

}
