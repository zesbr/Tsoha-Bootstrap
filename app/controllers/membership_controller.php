<?php 
class MembershipController extends BaseController {

	# GET /memberships
	public static function index() {
		$memberships = Membership::all();
		echo json_encode($memberships);
	}

	# GET /membership/:id
	public static function show($id) {
		$membership = Membership::find($id);
		echo json_encode($membership);
	}

}