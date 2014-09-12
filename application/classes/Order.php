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
	
	public function register($params) {

		$log=Kohana_Log::instance();
		
		if(is_array($params)) {
			$this->order->user_id=Auth_ORM::instance()->get_user()->id;
			$this->order->status="Nowe";
			$this->order->type=$this->types[$params['order_type']];
			
			if($params['pickup_address'] != '-- Wybierz --' && $params['pickup_address'] != NULL) {
				$this->order->address_id=$params['pickup_address'];
			}elseif($params['delivery_address'] != '-- Wybierz --' && $params['pickup_address'] != NULL) {
				$this->order->address_id=$params['delivery_address'];
			}else{
				$address=ORM::factory('Address');
				$address->values($params);
				
				if($params['order_type']==1) $address->address_type='odbioru';
				else $address->address_type='wysyłki';
				
				$address->save();
				$this->order->address_id=$address->id;
			}
			
			$this->order->warehouse_id=$params['warehouse'];
			$this->order->division_id=$params['division'];
			
			if($params['box_quantity'] > 0) {
				$this->order->quantity=$params['box_quantity'];
				
				for($i=1; $i < $params['box_quantity']; $i++) {
					//TODO Dodawanie nowych pudeł
				}
			}else {
				$this->order->quantity=-1;
			}
			
			if($params['date_reception'] != "") {
				$this->order->pickup_date=$params['date_reception'];
			}
			
			try {
					
				if($this->order->save()) {

					if(isset($params['boxes']) && is_array($params['boxes'])) {
						foreach ($params['boxes'] as $box) {
							$this->order->add('boxes', $box);
						}
					}
					
					$this->id=$this->order->id;
					$log->add(Log::DEBUG,"Success: Dodano zamówienie parametrami:".serialize($params)."\n");
		
				}else {
					$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodwania zamówienia'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
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
