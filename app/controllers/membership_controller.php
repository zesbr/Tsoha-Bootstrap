<?php 
class MembershipController extends BaseController {

	# POST /membership
	public static function save() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$community = Community::find($_POST['community_id']);

		if (!isset($community)) {
			Redirect::to('/communities', array('message' => 'Yhteisöä ei löytynyt', 'message_type' => 'warning'));
		}

		$membership = new Membership(array(
			'user_id' => $user_logged_in->id,
			'community_id' => $community->id,
			'joined_on' => date('Y-m-d H:m:s'),
			'is_admin' => 0
		));	

		if ($membership->is_valid()) {
			$membership->save();
			Redirect::to('/community/' . $community->id, array('message' => 'Liittyminen onnistui', 'message_type' => 'success'));
		}
		Redirect::to('/communities', array('message' => 'Liittyminen epäonnistui', 'message_type' => 'warning'));
	}

	# PUT /membership
	public static function update() {
		// TODO
	}

	# DELETE /membership
	public static function delete() {
		self::check_logged_in();
		$user_logged_in = self::get_user_logged_in();
		$community = Community::find($_POST['community_id']);

		if (!isset($community)) {
			Redirect::to('/communities', array('message' => 'Yhteisöä ei löytynyt', 'message_type' => 'warning'));
		}
		if (!$user_logged_in->is_member_in($community)) {
			Redirect::to('/communities', array('message' => 'Et ole liittynyt yhteisöön', 'message_type' => 'warning'));
		}

		$membership = $user_logged_in->membership($community);
		$membership->delete();

		if (count($community->admins()) == 0) {
			foreach ($community->memberships() as $membership) {
				$membership->delete();
			}
			$community->delete();
		}
		Redirect::to('/communities', array('message' => 'Jäsenyytesi poistettiin onnistuneesti', 'message_type' => 'success'));
	}

}