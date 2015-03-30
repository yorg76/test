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
			$this->number = $this->invoice->number;
			$this->customer= $this->invoice->customer_id;
			$this->invoice_date= $this->invoice->invoice_date;
			$this->sale_date= $this->invoice->sale_date;
			$this->amount= $this->invoice->amount;
			$this->payment_date= $this->invoice->payment_date;
			$this->pricetable_id= $this->invoice->pricetable_id;
				
		}else {
			$this->invoice=ORM::factory('Invoice');
			$this->customer=ORM::factory('Customer');
		}
	}
}


?>
