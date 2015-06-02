<?php
class CommunityController extends BaseController {
	
	public static function index() {
		$communities = Community::all();
		// echo json_encode($communities);
		View::make('communities/index.html', array('communities' => $communities));
	}

	public static function show($id) {
		$community = Community::find($id);
		// echo json_encode($community);
		View::make('communities/show.html', array('community' => $community));
	}

	public static function create() {
		View::make('communities/new.html');
	}

	public static function edit($id) {
		$community = Community::find($id);
		View::make('communities/edit.html', array("community" => $community));
	}

	public static function save() {
		self::check_logged_in();

		$user = self::get_user_logged_in();

		$community = new Community(array(
			"name" => $_POST["name"],
			"created_on" => date("Y-m-d H:m:s"), 
			"is_private" => 0,
			"is_open" => 0
    	));
		$community->save();

		$membership = new Membership(array(
			"user_id" => $user->id,
			"community_id" => $community->id,
			"joined_on" => date("Y-m-d H:m:s"),
			"is_admin" => 1
		));
		$membership->save();

		Redirect::to('/communities', array('message' => 'Uusi yhteisö luotu!'));
	}

	public static function update() {
		
	}

	public static function delete() {

	}

}