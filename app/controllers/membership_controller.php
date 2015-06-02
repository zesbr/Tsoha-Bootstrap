<?php 
class MembershipController extends BaseController {

	public static function index() {
		$memberships = Membership::all();
		echo json_encode($memberships);
	}

	public static function show($id) {
		$membership = Membership::find($id);
		echo json_encode($membership);
	}

}