<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Invoice extends ORM {

	public $invoice;
	public $number;
	public $invoice_date;
	public $sale_date;
	public $amount;
	public $payment_date;
	public $pricetable_id;

	public function generate() {

		return;
	}


}


?>
