<?php
class CommunityController extends BaseController {
	
	public static function index() {
		$communities = Community::all();
		View::make('communities/index.html', array('communities' => $communities));
	}

	public static function show($id) {
		$community = Community::find($id);
		$memberships = Community::getMembershipsByCommunity($id);
		View::make('communities/show.html', array('community' => $community, "memberships" => $memberships));
	}

	public static function create() {
		View::make('communities/new.html');
	}

	public static function edit($id) {

	}

	public static function save() {
		$community = $_POST;
		/*
		$community = new Game(array(
			"name" => $params["name"],
			"is_private" =>false,
			"is_open" => false
	    ));
	    */
		Community::insert($community);
		Redirect::to('/communities', array('message' => 'Peli on lisätty kirjastoosi!'));
	}

	public static function update() {
		
	}

	public static function delete() {

	}

}