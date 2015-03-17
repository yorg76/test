<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Invoice {

	public $invoice;
	public $number;
	public $customer;
	public $invoice_date;
	public $sale_date;
	public $amount;
	public $payment_date;
	public $pricetable_id;

	
	
	public static function instance($id=NULL) {
		if($id !== NULL) {
			return new Invoice($id);
		}else{
			return new Invoice(NULL);
		}
	}
	
	public function __construct($id) {
	
		if($id !== NULL) {
			$this->invoice=ORM::factory('Invoice',$id);
		}else {
			$this->invoice=ORM::factory('Invoice');
			$this->customer=ORM::factory('Customer');
		}
	}
}


?>
