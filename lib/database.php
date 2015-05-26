<?php

class DB {

	public static function connection() {
		// Haetaan tietokantakonfiguraatio
		$connection_config = DatabaseConfig::connection_config();
		$config = $connection_config['config'];

		try {
			// Alustetaan PDO
			if (isset($config['username'])){
				$connection = new PDO($config['resource'], $config['username'], $config['password']);
			} else {
				$connection = new PDO($config['resource']);
			}
			// Asetetaan tietokannan kenttien koodaukseksi utf8
			$connection->exec('SET NAMES UTF8');

			// Näytetään virheilmoitukset
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		} catch (PDOException $e) {
			die('Virhe tietokantayhteydessä tai tietokantakyselyssä: ' . $e->getMessage());
		}

		return $connection;
	}

	public static function test_connection() {
		require 'vendor/ConnectionTest/connection_test.php';
		exit();
	}

	/**
	 *	Apumetodi, joka hakee tavaraa tietokannasta.
	 */
	public static function execute($query, $params = array(), $fetchAll = true) {
		$db = self::connection()->prepare($query);
		$db->setFetchMode(PDO::FETCH_ASSOC);
    	if (empty($params)) {
	    	$db->execute();
	    } else {
	    	$db->execute($params);
	    }
	    if ($fetchAll) {
    		return $db->fetchAll();
    	} else {
    		return $db->fetch();
    	}
	}

}
