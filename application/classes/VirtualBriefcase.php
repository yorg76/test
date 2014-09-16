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
			$this->name=$this->virtualbriefcase->name;
			$this->id=$this->virtualbriefcase->id;
			$this->description=$this->virtualbriefcase->description;
			$this->division = $this->virtualbriefcase->division;
			$this->customer = $this->virtualbriefcase->division->customer;
				
	
	
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
			
	public function addBox() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->add('box',$this->box)) {
				$log->add(Log::DEBUG,"Success: Added Box:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding Box:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function addBulkPackaging() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->add('bulkpackaging',$this->bulkpackaging)) {
				$log->add(Log::DEBUG,"Success: Added BulkPackaging:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding BulkPackaging:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
		
	}


	public function addDocument() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->add('document',$this->document)) {
				$log->add(Log::DEBUG,"Success: Added Document:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding Document:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function addDocumentList() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->add('documentlist',$this->documentlist)) {
				$log->add(Log::DEBUG,"Success: Added DocumentList:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding DocumentList:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function addChildVirtualBriefcase() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->add('virtualbriefcase',$this->virtualbriefcase)) {
				$log->add(Log::DEBUG,"Success: Added VirtualBriefcase:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding VirtualBriefcase:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}


	public function removeBox() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->remove('box',$this->box)) {
				$log->add(Log::DEBUG,"Success: Remove Box:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing Box:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function removeBulkPackaging() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->remove('bulkpackaging',$this->bulkpackaging)) {
				$log->add(Log::DEBUG,"Success: Remove BulkPackaging:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing BulkPackaging:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}


	public function removeDocument() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->remove('document',$this->document)) {
				$log->add(Log::DEBUG,"Success: Remove Document:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing Document:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function removeDocumentList() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->remove('documentlist',$this->documentlist)) {
				$log->add(Log::DEBUG,"Success: Remove DocumentList:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing DocumentList:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	
	public function removeVirtualBriefcase() {
		$log=Kohana_Log::instance();
		try {
			if($this->virtualbriefcase->remove('virtualbriefcase',$this->virtualbriefcase)) {
				$log->add(Log::DEBUG,"Success: Removed VirtualBriefcase:".$id."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing VirtualBriefcase:".$id."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	

}


?>
