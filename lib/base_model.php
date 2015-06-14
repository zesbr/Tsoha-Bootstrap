<?php

class BaseModel {

	protected $validators;
	public $errors;

	public function __construct($attributes = null) {
	// Käydään assosiaatiolistan avaimet läpi
		foreach($attributes as $attribute => $value){
			// Jos avaimen niminen attribuutti on olemassa...
			if(property_exists($this, $attribute)){
				// ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
				$this->{$attribute} = $value;
			}
		}
	}

	public function errors() {
		// Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
		$errors = array();

		foreach($this->validators as $validator){
		// Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
		}

		return $errors;
	}

	/**
	* Muuntaa arvon POSTGRE SQL:n hyväksymäksi boolean arvoksi
	*/
	public function psql_boolean($value) { 
		if (!$value || $value = 0 || $value = "") {
			return 'f';
		}
		return 't';
	}

	/**
	 *
	 */
	public function length_is_between($min, $max, $value) {
		if ($this->is_shorter_than($min, $value)) {
			return false;
		} else if ($this->is_longer_than($max, $value)) {
			return false;
		}
		return true;
	}

	/**
	 * Tarkistaa onko merkkjono liian lyhyt
	 */
	public function is_shorter_than($min, $value) {
		if (strlen($value) < $min) {
			return true;
		}
		return false;
	}

	/**
	 * Tarkistaa onko merkkjono liian pitkä
	 */
	public function is_longer_than($max, $value) {
		if (strlen($value) < $max) {
			return true;
		}
		return false;
	}

	/** 
	 * Tarkistaa onko olion attribuutti uniikki
	 */
	public function is_unique($attribute) {
		foreach ($this->all() as $object) {
			if ($object->id != $this->id) {
				if ($object->{$attribute} == $this->{$attribute}) {
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * Validoi tietokohteen
	 */
	public function is_valid() {
		foreach ($this->validators as $validate) {
			$this->{$validate}();
		}
		if (count($this->errors) > 0) {
			return false;
		}
		return true;
	}

}
