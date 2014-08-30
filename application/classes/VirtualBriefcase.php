<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class VirtualBriefcase extends ORM {

	public $virtualbriefcase;
	public $id;
	public $name;
	public $description;
	public $customer;
	public $division;
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new VirtualBriefcase($id);
		}else{
			return new VirtualBriefcase(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->virtualbriefcase = ORM::factory('VirtualBriefcase')->where('id','=',$id)->find();
			$this->name=$this->virtualvriefcase->name;
			$this->id=$this->virtualvriefcase->id;
			$this->description=$this->VirtualBriefcase->description;
			$this->division = $this->VirtualBriefcase->division;
			$this->customer = $this->VirtualBriefcase->division->customer;
				
	
	
		}else {
			$this->virtualbriefcase = ORM::factory('VirtualBriefcase');
			$this->customer = ORM::factory('Customer');
			$this->division = ORM::factory('Division');
		}
	}
	
	public function addVirtualBriefcase($params) {
		$log=Kohana_Log::instance();
		$this->virtualbriefcase->values($params);
		$this->division=ORM::factory('Division',$params['division_id']);
		$this->virtualbriefcase->division_id=$this->division->id;
	
		if($this->virtualbriefcase->save()) {
			$this->id=$this->virtualbriefcase->id;
			$log->add(Log::DEBUG,"Success: Added VirtualBriefcase with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: VirtualBriefcase not added with params:".serialize($params)."\n");
			return false;
		}
	
		return;
	}
	
	public function deleteVirtualBriefcase() {
		$log=Kohana_Log::instance();
	
		if($this->virtualbriefcase->loaded()) {
			$name=$this->virtualbriefcase->name;
	
			if($this->virtualbriefcase->delete()) {
				$log->add(Log::DEBUG,"Success: Removed virtualbriefcase:".$name."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove VirtualBriefcase:".$name."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove VirtualBriefcase:".$name."\n");
			return false;
		}
		return;
	}
	
	public function updateVirtualBriefcase($params) {
		$log=Kohana_Log::instance();
		$this->virtualbriefcase->values($params);
		$this->division=ORM::factory('Division',$params['division_id']);
		$this->virtualbriefcase->division_id=$this->division->id;
	
		if($this->virtualbriefcase->update()) {
			$this->id=$this->virtualbriefcase->id;
			$log->add(Log::DEBUG,"Success: Updated virtualbriefcase with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: virtualbriefcase not updated with params:".serialize($params)."\n");
			return false;
		}
	
		return;
	}
			
	public function addBulkpackaging() {

		return;
	}


	public function addDocumentlist() {

		return;
	}


	public function addDocument() {

		return;
	}


	public function removeBulkpackaging() {

		return;
	}


	public function removeDocumentlist() {

		return;
	}


	public function removeDocument() {

		return;
	}
	

	public function addBox() {

		return;
	}


	public function removeBox() {

		return;
	}


}


?>
