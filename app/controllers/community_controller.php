<?php
class CommunityController extends BaseController {
	
	# GET /communities
	public static function index() {
		$communities = Community::all();
		// echo json_encode($communities);
		View::make('communities/index.html', array('communities' => $communities));
	}

	# GET /community/:id
	public static function show($id) {
		$community = Community::find($id);
		// echo json_encode($community);
		View::make('communities/show.html', array('community' => $community));
	}

	# GET /community/new
	public static function create() {
		
		View::make('communities/new.html');
	}

	# GET /community/edit/:id
	public static function edit($id) {
		self::check_logged_in();
		$user = self::get_user_logged_in(); 
		$community = Community::find($id);

		foreach ($community->admins() as $admin) {
	 		if ($admin->id == $user->id) {
		 		View::make('communities/edit.html', array("community" => $community));
	 		}
		}
		Redirect::to('/communities', array('message' => 'Käyttäjällä ei ole oikeuksia'));
	}

	# POST /community
	public static function save() {
		self::check_logged_in();

		$user = self::get_user_logged_in();

		$community = new Community(array(
			"name" => $_POST["name"],
			"description" => $_POST["description"],
			"created_on" => date("Y-m-d H:m:s"), 
			"edited_on" => date("Y-m-d H:m:s"),
			"is_private" => 0
    	));

    	if ($community->is_valid()) {
			$community->save();
			$membership = new Membership(array(
				"user_id" => $user->id,
				"community_id" => $community->id,
				"joined_on" => date("Y-m-d H:m:s"),
				"is_admin" => 1
			));
			$membership->save();
			Redirect::to('/communities', array('message' => 'Uusi yhteisö luotu!'));
		} else {
			Redirect::to('/communities', array('message' => 'Ei ole validi!'));
		}
	}

	# PUT /community
	public static function update() {
		self::check_logged_in();
		$user = self::get_user_logged_in();
		$community = Community::find($_POST["id"]);

		foreach ($community->admins() as $admin) {
	 		if ($admin->id == $user->id) {
		 		$community->name = $_POST["name"];
		 		$community->description = $_POST["description"];
		 		$community->edited_on = date("Y-m-d H:m:s");
		 		if ($community->is_valid()) {
		 			$community->update();
		 			Redirect::to('/communities', array('message' => 'Muokkaus onnistui'));
		 		}
	 		}
		}
	}

	# DELETE /community
	public static function delete() {
		$community = Community::find($_POST["id"]);
		foreach ($community->memberships() as $membership) {
			$membership->delete();
		}
		$community->delete();
		Redirect::to('/communities', array('message' => 'Muokkaus onnistui'));
	}

}