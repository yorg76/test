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
			
	public function addBox($params) {
		$log=Kohana_Log::instance();
		$box = ORM::factory('Box',$params['box_id']);
		try {
			if($this->virtualbriefcase->add('boxes',$box)) {
				$log->add(Log::DEBUG,"Success: Added Box with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding Box with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function addBulkPackaging($params) {
		$log=Kohana_Log::instance();
		$bulkpackaging = ORM::factory('BulkPackaging',$params['bulkpackaging_id']);
		try {
			if($this->virtualbriefcase->add('bulkpackagings',$bulkpackaging)) {
				$log->add(Log::DEBUG,"Success: Added BulkPackaging with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding BulkPackaging with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
		
	}
	
	public function addDocument($params) {
		$log=Kohana_Log::instance();
		$document = ORM::factory('Document',$params['document_id']);
		try {
			if($this->virtualbriefcase->add('documents',$document)) {
				$log->add(Log::DEBUG,"Success: Added Document with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding Document with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}

	public function addDocumentList($params) {
		$log=Kohana_Log::instance();
		$documentlist = ORM::factory('DocumentList',$params['documentlist_id']);
		try {
			if($this->virtualbriefcase->add('documentlists',$documentlist)) {
				$log->add(Log::DEBUG,"Success: Added DocumentList with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding DocumentList with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function addChildVirtualBriefcase($params) {
		$log=Kohana_Log::instance();
		$childvirtualbriefcase = ORM::factory('VirtualBriefcase',$params['virtualbriefcase2_id']);
		try {
			if($this->virtualbriefcase->add('virtualbriefcases',$childvirtualbriefcase)) {
				$log->add(Log::DEBUG,"Success: Added VirtualBriefcase with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding VirtualBriefcase with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
			return $e->getMessage();
		}
		return;
	}


	public function removeBox($params) {
		$log=Kohana_Log::instance();
		$box = ORM::factory('Box',$params['box_id']);
		try {
			if($this->virtualbriefcase->remove('boxes',$box)) {
				$log->add(Log::DEBUG,"Success: Remove Box with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing Box with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function removeBulkPackaging($params) {
		$log=Kohana_Log::instance();
		$bulkpackaging = ORM::factory('BulkPackaging',$params['bulkpackaging_id']);
		try {
			if($this->virtualbriefcase->remove('bulkpackagings',$bulkpackaging)) {
				$log->add(Log::DEBUG,"Success: Remove BulkPackaging with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing BulkPackaging with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}


	public function removeDocument($params) {
		$log=Kohana_Log::instance();
		$document = ORM::factory('Document',$params['document_id']);
		
		try {
			if($this->virtualbriefcase->remove('documents',$document)) {
				$log->add(Log::DEBUG,"Success: Remove Document with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing Document with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function removeDocumentList($params) {
		$log=Kohana_Log::instance();
		$documentlist = ORM::factory('DocumentList',$params['documentlist_id']);
		try {
			if($this->virtualbriefcase->remove('documentlists',$documentlist)) {
				$log->add(Log::DEBUG,"Success: Remove DocumentList with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing DocumentList with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	
	public function removeVirtualBriefcase($params) {
		$log=Kohana_Log::instance();
		$childvirtualbriefcase = ORM::factory('VirtualBriefcase',$params['virtualbriefcase2_id']);
		try {
			if($this->virtualbriefcase->remove('virtualbriefcases',$childvirtualbriefcase)) {
				$log->add(Log::DEBUG,"Success: Removed VirtualBriefcase with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing VirtualBriefcase with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function removeChildVirtualBriefcase($params) {
		$log=Kohana_Log::instance();
		$childvirtualbriefcase = ORM::factory('VirtualBriefcase',$params['virtualbriefcase2_id']);
		try {
			if($this->virtualbriefcase->remove('virtualbriefcases',$childvirtualbriefcase)) {
				$log->add(Log::DEBUG,"Success: Removed VirtualBriefcase with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing VirtualBriefcase with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
			
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
			return $e->getMessage();
		}
		return;
	}
	
	

}


?>
