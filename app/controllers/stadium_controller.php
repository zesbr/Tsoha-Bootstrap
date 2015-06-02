<?php
class StadiumController extends BaseController {

	public static function index() {
		$stadiums = Stadium::all();
		echo json_encode($stadiums);
	}

	public static function show($id) {
		$stadium = Stadium::find($id);
		echo json_encode($stadium);
	}

}
