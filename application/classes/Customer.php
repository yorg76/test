<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Customer extends ORM {

	public $customer;
	public $id;
	public $name;
	public $nip;
	public $regon;
	public $code;
	
	public static function instance($id=NULL) {
		if($id>1) {
			return new Customer($id);
		}else{
			return new Customer(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>1) {
			$this->customer = ORM::factory('Customer')->where('id','=',$id)->find();
			$this->address = $this->customer->addresses->where('type','=',0)->find();
			$this->users = $this->customer->users->find();
			$this->divisions = $this->customer->divisions->find();
			$this->warehouses = $this->customer->warehouses->find();
			$this->invoices = $this->customer->invoices->find();
			$this->pricetable = $this->customer->pricetables->find();
			
			$this->id = $this->customer->id;
			$this->name = $this->customer->name;
			$this->nip = $this->customer->nip;
			$this->regon = $this->customer->regon;
			$this->code = $this->customer->code;
			
		}else {
			$this->customer = ORM::factory('Customer');
			$this->address = ORM::factory('Address');
			$this->user = ORM::factory('User');
			$this->division = ORM::factory('Division');
			$this->warehouse = ORM::factory('Warehose');
			$this->invoice = ORM::factory('Invoice');
			$this->pricetable = ORM::factory('Pricetable');
		}
	}
	
	public function addCompany() {

		return;
	}


	public function editCompany() {

		return;
	}


	public function deleteCompany() {

		return;
	}
	
	public function addAddress() {
	
		return;
	}
	
	public function deleteAddress() {
	
		return;
	}
	
	public function addDivision() {
	
		return;
	}
	
	public function deleteDivision() {
	
		return;
	}
	
	public function addWarehouse() {
	
		return;
	}
	
	public function deleteWarehose() {
	
		return;
	}


}


?>
