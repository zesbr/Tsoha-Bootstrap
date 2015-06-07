<?php

class BaseController{

	/**
	 * Hakee ja palauttaa kirjautuneen käyttäjän
	 */
	public static function get_user_logged_in() {
		if (isset($_SESSION['user'])) {
			$id = $_SESSION['user'];
			return User::find($id);
		}
		return null;
	}

	/**
	 * Tarkistaa onko käyttäjä kirjautunut sisään ja jos ei, niin ohjaa
	 * sisäänkirjautumissivulle
	 */
	public static function check_logged_in() {
		if (!isset($_SESSION["user"])) {
			Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));
		}
	}


	/**
	 * TODO: Tämän voisi ehkä laittaa jonnekkin muualle
	 * Generoi salasanan suojausta parantavan merkkijonon eli ns. suolan
	 */
	public static function get_random_salt() {
		$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$salt = "";
		for ($i = 0; $i < 12; $i++) { 
			$j = rand(0, (strlen($characters)-1));
			$salt .= $characters[$j];
		}
		return $salt;
	}

	/**
	 * Tarkistaa onko päivämäärä tuleva vai mennyt
	 * @return totuusarvo, true jos tuleva ja false jos mennyt
	 */
	public static function date_is_upcoming($date) {
		if (date("Y-m-d H:i:s") < date($date)) {
			return true;
		}
		return false;
	}

}