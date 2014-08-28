<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Warehouse extends ORM {

	public $warehouse;
	public $id;
	public $name;
	public $description;
	public $customer;
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Warehouse($id);
		}else{
			return new Warehouse(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
				
			$this->warehouse = ORM::factory('Warehouse')->where('id','=',$id)->find();
			$this->name=$this->warehouse->name;
			$this->id=$this->warehouse->id;
			$this->description=$this->warehouse->description;
			$this->customer = $this->warehouse->customer;
			
	
				
		}else {
			$this->warehouse = ORM::factory('Warehouse');
			$this->customer = ORM::factory('Customer');
		}
	}

	public function addWarehouse($params) {
		$log=Kohana_Log::instance();
		$this->warehouse->values($params);
		$this->customer=ORM::factory('Customer',$params['customer_id']);
		$this->warehouse->customer_id=$this->customer->id;
		
		if($this->warehouse->save()) {
			$this->id=$this->warehouse->id;
			$log->add(Log::DEBUG,"Success: Added Warehouse with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: Warehouse not added with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}

	public function deleteWarehouse() {
	
		return;
	}

	public function updateWarehouse($params) {
		$log=Kohana_Log::instance();
		$this->warehouse->values($params);
		$this->customer=ORM::factory('Customer',$params['customer_id']);
		$this->warehouse->customer_id=$this->customer->id;
		
		if($this->warehouse->update()) {
			$this->id=$this->warehouse->id;
			$log->add(Log::DEBUG,"Success: Added Warehouse with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: Warehouse not added with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}
}


?>
