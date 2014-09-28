<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Pricetable {

	public $pricetable;
	public $id;
	public $boxes_reception;
	public $boxes_sending;
	public $boxes_storage;
	public $document_scan;
	public $document_copy;
	public $document_notarial_copy;
	public $discount;
	
	public static function money($number, $format = '%!n PLN')
	{
		if(function_exists('money_format')) return money_format($format, $number);
		else return number_format($number, 2,',', ' ')." PLN";

	}
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Pricetable($id);
		}else{
			return new Pricetable(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->pricetable = ORM::factory('Pricetable')->where('id','=',$id)->find();
			$this->id = $this->pricetable->id;
			$this->boxes_reception = $this->pricetable->pricetable->boxes_reception;
			$this->boxes_sending = $this->pricetable->boxes_sending;  
			$this->boxes_storage = $this->pricetable->boxes_storage;
			$this->document_scan = $this->pricetable->document_scan;
			$this->document_copy = $this->pricetable->document_copy;
			$this->document_notarial_copy = $this->pricetable->document_notarial_copy;  
			$this->discount = $this->pricetable->discount;  
				
		}else {
			$this->pricetable = ORM::factory('Pricetable');
		}
	}
	
	public function addPricetable($params) {
		$log=Kohana_Log::instance();
		
		$activepricetables=ORM::factory('Customer',$params['customer_id'])->pricetables->where('active','=','1')->find_all();
		
		if(is_array($params)) {
			$this->pricetable->values($params);
			try {
				if($this->pricetable->save()) {
					$this->id=$this->pricetable->id;
					
					foreach ($activepricetables as $acp) {
						if($acp->id != $this->pricetable->id) {
							$acp->active=0;
							$acp->update();
						}
					}

					$log->add(Log::DEBUG,"Success: Dodano cennik z parametrami:".serialize($params)."\n");
					return true;
				}else {
					$log->add(Log::ERROR,'Exception:Wystąpił błąd podczas dodawania cennika'."\n");
				}
				return false;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Błąd podczas dodawania cennika:'.$e->getMessage()."\n");
				return false;
			}
		}	
	}
}


?>
