<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Division extends ORM {

	public $division;
	public $id;
	public $name;
	public $description;
	public $customer;
	public $virtualbriefcases;
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Division($id);
		}else{
			return new Division(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
				
			$this->division = ORM::factory('Division')->where('id','=',$id)->find();
			$this->name=$this->division->name;
			$this->id=$this->division->id;
			$this->description=$this->division->description;
			$this->customer = $this->division->customer;
			$this->virtualbriefcases = $this->division->virtualbriefcase->find();
			
	
				
		}else {
			$this->division = ORM::factory('Division');
			$this->customer = ORM::factory('Customer');
		}
	}

	public function addDivision($params) {
		$log=Kohana_Log::instance();
		$this->division->values($params);
		$this->customer=ORM::factory('Customer',$params['customer_id']);
		$this->division->customer_id=$this->customer->id;
		
		if($this->division->save()) {
			$this->id=$this->division->id;
			$log->add(Log::DEBUG,"Success: Added division with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: Division not added with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}

	public function deleteDivision() {
	
		return;
	}

	public function updateDivision($params) {
		$log=Kohana_Log::instance();
		$this->division->values($params);
		$this->customer=ORM::factory('Customer',$params['customer_id']);
		$this->division->customer_id=$this->customer->id;
		
		if($this->division->update()) {
			$this->id=$this->division->id;
			$log->add(Log::DEBUG,"Success: Added division with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: Division not added with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}
}


?>
