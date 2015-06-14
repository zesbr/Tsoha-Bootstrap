<?php
class CommunityController extends BaseController {
	
	# GET /communities
	public static function index() {
		self::check_logged_in();
		$communities = Community::all();

		View::make('community/index.html', array('communities' => $communities));
	}

	# GET /community/:id
	public static function show($id) {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$community = Community::find($id);

		if (!isset($community)) {
			Redirect::to('/communities', array('message' => 'Yhteisöä ei löytynyt'));
		}
		if ($community->is_private) {
			$membership = $user_logged_in->membership($community);
			if (!isset($membership)) {
				Redirect::to('/communities', array('message' => 'Yhteisö on yksityinen'));
			}
		}
		View::make('community/show.html', array('community' => $community));
	}

	# GET /community/new
	public static function create() {
		self::check_logged_in();

		View::make('community/new.html');
	}

	# GET /community/edit/:id
	public static function edit($id) {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in(); 
		$community = Community::find($id);

		if (!isset($community)) {
			Redirect::to('/communities', array('message' => 'Yhteisöä ei löytynyt'));
		}
		$membership = $user_logged_in->membership($community);
		if (!isset($membership)) {
			Redirect::to('/communities', array('message' => 'Et ole yhteisön jäsen'));
		}
		if ($membership->is_admin) {
			View::make('community/edit.html', array('community' => $community));
		}
		Redirect::to('/communities', array('message' => 'Sinulla ei ole oikeuksia muokata yhteisöä'));
	}

	# POST /community
	public static function save() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();

		$community = new Community(array(
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'created_on' => date('Y-m-d H:m:s'), 
			'edited_on' => date('Y-m-d H:m:s'),
			'is_private' => 0
    	));

    	if ($community->is_valid()) {
			$community->save();
			$membership = new Membership(array(
				'user_id' => $user_logged_in->id,
				'community_id' => $community->id,
				'joined_on' => date('Y-m-d H:m:s'),
				'is_admin' => 1
			));
			$membership->save();
			Redirect::to('/communities', array('message' => 'Uusi yhteisö luotu!'));
		}
		Redirect::to('/communities/new', array('community' => $community, 'errors' => $community->errors));
	}

	# PUT /community
	public static function update() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$community = Community::find($_POST['id']);

		if (!isset($community)) {
			Redirect::to('/communities', array('message' => 'Yhteisöä ei löytynyt'));
		}
		$membership = $user_logged_in->membership($community);
		if (!isset($membership)) {
			Redirect::to('/communities', array('message' => 'Et ole yhteisön jäsen'));
		}
		if (!$membership->is_admin) {
			Redirect::to('/community/' . $community->id, array('message' => 'Sinulla ei ole oikeuksia muokata yhteisöä'));
		}

 		$community->name = $_POST['name'];
 		$community->description = $_POST['description'];
 		$community->edited_on = date('Y-m-d H:m:s');

		if ($community->is_valid()) {
	 		$community->update();
		 	Redirect::to('/communities', array('message' => 'Muokkaus onnistui'));
		}
		Redirect::to('/community/edit/' . $community->id, array('community' => $community, 'errors' => $community->errors));
	}

	# DELETE /community
	public static function delete() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$community = Community::find($_POST['id']);

		if (!isset($community)) {
			Redirect::to('/communities', array('message' => 'Yhteisöä ei löytynyt'));
		}
		$membership = $user_logged_in->membership($community);
		if (!isset($membership)) {
			Redirect::to('/communities', array('message' => 'Et ole yhteisön jäsen'));
		}
		if (!$membership->is_admin) {
			Redirect::to('/community/' . $community->id, array('message' => 'Sinulla ei ole oikeuksia muokata yhteisöä'));
		}

		foreach ($community->memberships() as $membership) {
			$membership->delete();
		}
		$community->delete();
		Redirect::to('/communities', array('message' => 'Muokkaus onnistui'));
	}

}