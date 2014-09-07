<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Order extends ORM {

	public $order;
	public $id;
	public $status;
	public $type;
	
	public $types = array('Zamówienie pudeł i kodów kreskowych','Zamówienie odbioru i magazynowania pudeł','Zamówienie zniszczenie magazynowanych pozycji','Zamówienie skanowania, kopii dokumentów','Zamówienie kopii notarialnej dokumentów');

	public $statuses = array('Nowe','Przyjęte do realizacji','Oczekuje na wysłanie','W doręczeniu','Dostarczone','W trakcie realizacji','W trakcie odbioru','W dostrczeniu na magazyn','Na stanie magazynu','Odebrane','Zrealizowane');
	
	public static function instance($id=NULL) {
		if($id !== NULL) {
			return new Order($id);
		}else{
			return new Order(NULL);
		}
	}
	
	public function __construct($id) {
	
		if($id !== NULL) {
			$this->order=ORM::factory('Order',$id);
			$this->id=$this->order->id;
			$this->status=$this->order->status;
			$this->type=$this->order->type;
		}else {
			$this->order=ORM::factory('Order');
			$this->order->status='Nowe';
			$this->status='Nowe';
		}
	}
	
	public function register() {

		return;
	}

	public function changeStatus() {

		return;
	}

	public function printConfirmation() {

		return;
	}

	public function generateConfirmationCode() {

		return;
	}

	public function getBoxesDescription() {

		return;
	}

}


?>
