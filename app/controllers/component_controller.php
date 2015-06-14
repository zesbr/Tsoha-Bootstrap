<?php 
class ComponentController extends BaseController {

	# GET /components
	public static function index() {
		View::make("components/index.html");
	}
}