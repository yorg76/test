<?php

class Customer {

	public $nazwa;

	public $email;
	
	public $nip;

	public $regon;
	
	public $id;
	
	public $comments;
	
	//Tymczasowo
	
	public $street;
	public $city;
	public $postal;
	public $www;

	// association with Adres class
	public $address;	
	// association with Cennik class
	public $pricetable;
	// association with Dzial class
	public $devision;
	// association with Magazyn class
	public $warehouse;
	// association with Faktura class
	public $invoice;
	// association with Administrator class
	public $administrator;


	public static function instance($id=NULL) {
		if($id>1) {
			return new Customer($id);
		}else{
			return new Customer(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>1) {
			
		}else {
			$this->address = NULL;
			$this->company = NULL;
			$this->pricetable = NULL;
			$this->devision = NULL;
			$this->warehouse = NULL;
			$this->invoice = NULL;
			$this->administrator = NULL;
		}
	}
	
	public function register() {

		return;
	}


	public function edit() {

		return;
	}


	public function delete() {

		return;
	}

}


?>
