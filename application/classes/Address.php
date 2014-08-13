<?php

class Address extends CorespondenceAddress {

	public $id;

	public $street;

	public $number;

	public $flat;

	public $postal;

	public $city;

	public $country;

	public $address_type;

	// association with Company class
	public $company_id=array();
	// association with User class
	public $user_id=array();

	public function validatePostal() {

		return;
	}


}


?>
