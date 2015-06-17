<?php
class PlayerController extends BaseController {

	public static function index() {
		$players = Player::all();
		echo json_encode($players);
	}

	public static function show($id) {
		$player = Player::find($id);
		echo json_encode($player);
	}

}
