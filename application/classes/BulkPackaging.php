<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class BulkPackaging {

	public $bulkpackaging;
	public $id;
	public $name;
	public $description;
	public $box;


	
	public static function instance($id=NULL) {
		if($id>0) {
			return new BulkPackaging($id);
		}else{
			return new BulkPackaging(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->bulkpackaging = ORM::factory('BulkPackaging')->where('id','=',$id)->find();
			$this->id = $this->bulkpackaging->id;
			$this->name = $this->bulkpackaging->name;
			$this->description = $this->bulkpackaging->description;
			$this->box = $this->bulkpackaging->box;
			
		}else {
			$this->bulkpackaging = ORM::factory('BulkPackaging');
			$this->box = ORM::factory('Box');
		}
	}
	
	public function addBulkPackaging($params) {
		$log=Kohana_Log::instance();
		$this->bulkpackaging->values($params);
		$this->box=ORM::factory('Box',$params['box_id']);
		$this->bulkpackaging->box_id=$this->box->id;
			
		if(is_array($params)) {
		
			try {
					
				if($this->bulkpackaging->save()) {
					$log->add(Log::DEBUG,"Success: Dodano listę dokumentów z parametrami:".serialize($params)."\n");
		
				}else {
					$log->add(Log::ERROR,'Exception:Wystąpił błąd podczas dodwania listy dokumentów'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}

	public function editBulkPackaging($params) {
		
		$log=Kohana_Log::instance();
		
		$this->bulkpackaging->values($params);
		$this->box=ORM::factory('Box',$params['box_id']);
		$this->bulkpackaging->box_id=$this->box->id;
			
		if(is_array($params)) {
		
			try {
					
				if($this->bulkpackaging->update()) {
					$log->add(Log::DEBUG,"Success: Zaktualizowano listę dokumentów z parametrami:".serialize($params)."\n");
		
				}else {
					$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas aktualizacji listy dokumentów'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}
	
	public function deleteBulkPackaging() {
		$log=Kohana_Log::instance();
		
		if($this->bulkpackaging->loaded()) {
			$name=$this->bulkpackaging->name;
		
			if($this->bulkpackaging->delete()) {
				$log->add(Log::DEBUG,"Success: Removed bulkpackaging:".$name."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove bulkpackaging:".$name."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove bulkpackaging:".$name."\n");
			return false;
		}
		return;
		return;
	}
	
	
	public function addChildBulkPackaging($params) {
		$log=Kohana_Log::instance();
		$childbulkpackaging = ORM::factory('BulkPackaging',$params['bulkpackaging2_id']);
		try {
			if($this->bulkpackaging->add('bulkpackagings',$childbulkpackaging)) {
				$log->add(Log::DEBUG,"Success: Added bulkpackaging with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Adding bulkpackaging with params:".serialize($params)."\n");
				return false;
			}
				
		}catch (Exception $e) {
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
			return $e->getMessage();
		}
		return;
	}
	
	public function removeChildBulkPackaging($params) {
		$log=Kohana_Log::instance();
		$childbulkpackaging = ORM::factory('BulkPackaging',$params['bulkpackaging2_id']);
		try {
			if($this->bulkpackaging->remove('bulkpackagings',$childbulkpackaging)) {
				$log->add(Log::DEBUG,"Success: Removed bulkpackaging with params:".serialize($params)."\n");
				return true;
			} else {
				$log->add(Log::DEBUG,"Fail: Removing bulkpackaging with params:".serialize($params)."\n");
				return false;
			}
		}catch (Exception $e) {
				
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
			return $e->getMessage();
		}
		return;
	}
	
	public function addDocument($params) {
		$log=Kohana_Log::instance();
		$this->document = ORM::factory('Document',$params['document_id']);
		$bulkpackaging = ORM::factory('BulkPackaging',$params['bulkpackaging_id']);
		$this->document->bulkpackaging_id = $bulkpackaging->id;
	
		if($this->document->save()) {
			$this->id=$this->document->id;
			$log->add(Log::DEBUG,"Success: Added Document with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: Document not added with params:".serialize($params)."\n");
			return false;
		}
	
		return;
	}
	
	public function addDocumentList($params) {
		$log=Kohana_Log::instance();
		$this->documentlist = ORM::factory('DocumentList',$params['documentlist_id']);
		$bulkpackaging = ORM::factory('BulkPackaging',$params['bulkpackaging_id']);
		$this->documentlist->bulkpackaging_id = $bulkpackaging->id;
	
		if($this->documentlist->save()) {
			$this->id=$this->documentlist->id;
			$log->add(Log::DEBUG,"Success: Added DocumentList with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: DocumentList not added with params:".serialize($params)."\n");
			return false;
		}
	
		return;
	}

}


?>
