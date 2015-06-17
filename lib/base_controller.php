<?php

class BaseController{

	/**
	 * Hakee ja palauttaa kirjautuneen käyttäjän
	 */
	public static function get_user_logged_in() {
		if (isset($_SESSION['user'])) {
			$id = $_SESSION['user'];
			$user_logged_in = User::find($id);
			if (!isset($user_logged_in)) {
				Redirect::to('/logout', array('message' => 'Tapahtui virhe. Kirjaudu sisään uudelleen', 'message_type' => 'warning'));
			}
			if ($user_logged_in->is_locked) {
				Redirect::to('/logout', array('message' => 'Käyttäjätilisi on lukittu, joten et voi kirjautua sisään', 'message_type' => 'warning'));
			}
			return $user_logged_in;
		}
		return null;
	}

	/**
	 * Tarkistaa onko käyttäjä kirjautunut sisään ja jos ei, niin ohjaa
	 * sisäänkirjautumissivulle
	 */
	public static function check_logged_in() {
		if (!isset($_SESSION["user"])) {
			Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!', 'message_type' => 'warning'));
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
	 * Tarkistaa täyttääkö merkkijono (salasana), sille asetetut ehdot ja palauttaa totuusarvon
	 */
	public static function password_is_strong($password) {
		// JOS SALASANA
			// ON VÄHINTÄÄN 6 MERKKIÄ PITKÄ
			// TODO: SISÄLTÄÄ PIENIÄ JA ISOJA KIRJAIMIA SEKÄ NUMEROITA
		if (strlen($password) > 6) {
			return true;
		}
		return false;
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