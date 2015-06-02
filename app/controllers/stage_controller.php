<?php
class StageController extends BaseController {

	public static function index() {
		$stages = Stage::all();
		echo json_encode($stages);
	}

	public static function show($id) {
		$stage = Stage::find($id);
		echo json_encode($stage);
	}

}
