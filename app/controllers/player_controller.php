<?php
class PlayerController extends BaseController {

	public static function index() {
		$players = Player::all();
		echo json_encode($players);
		// View::make("player/index.html", array("players" => $players));
	}

	public static function show($id) {
		$player = Player::find($id);
		echo json_encode($player);
		// View::make("player/show.html", array("player" => $player));
	}

}
