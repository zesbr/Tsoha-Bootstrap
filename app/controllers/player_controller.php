<?php
class PlayerController extends BaseController {

	public static function index() {
		$players = Player::all();
		View::make("player/index.html", array("players" => $players));
	}

	public static function show($id) {
		$player = Player::find($id);
		View::make("player/show.html", array("player" => $player));
	}
}