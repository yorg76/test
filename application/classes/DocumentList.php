<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class DocumentList extends ORM {

	public $documentlist;
	public $id;
	public $name;
	public $description;
	public $box;
	public $bulkpackaging;

	
	public static function instance($id=NULL) {
		if($id>0) {
			return new DocumentList($id);
		}else{
			return new DocumentList(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->documentlist = ORM::factory('DocumentList')->where('id','=',$id)->find();
			$this->id = $this->documentlist->id;
			$this->name = $this->documentlist->name;
			$this->description = $this->documentlist->description;
			$this->box = $this->documentlist->box;
			$this->bulkpackaging = $this->documentlist->bulkpackaging;
			
		}else {
			$this->documentlist = ORM::factory('DocumentList');
			$this->box = ORM::factory('Box');
		}
	}
	
	public function addDocumentlist($params) {
		$log=Kohana_Log::instance();
		$this->documentlist->values($params);
		$this->box=ORM::factory('Box',$params['box_id']);
		$this->documentlist->box_id=$this->box->id;
			
		if(is_array($params)) {
		
			try {
					
				if($this->documentlist->save()) {
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
	
	public function editDocumentList($params) {
		$log=Kohana_Log::instance();
		
		$this->documentlist->values($params);
		$this->box=ORM::factory('Box',$params['box_id']);
		$this->documentlist->box_id=$this->box->id;
		$this->bulkpackaging=ORM::factory('BulkPackaging',$params['bulkpackaging_id']);
		$this->documentlist->bulkpackaging_id=$this->bulkpackaging->id;
		
		if(is_array($params)) {
		
			try {
					
				if($this->documentlist->update()) {
					$log->add(Log::DEBUG,"Success: Zaktualizowano listę dokumentów z parametrami:".serialize($params)."\n");
		
				}else {
					$log->add(Log::ERROR,'Exception:Wystąpił błąd podczas aktualizacji listy dokumentów'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
		return;
	}
	
	public function deleteDocumentList() {
		$log=Kohana_Log::instance();
		
		if($this->documentlist->loaded()) {
			$name=$this->documentlist->name;
		
			if($this->documentlist->delete()) {
				$log->add(Log::DEBUG,"Success: Removed documentlist:".$name."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove documentlist:".$name."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove documentlist:".$name."\n");
			return false;
		}
		return;
		return;
	}


	public function add_document() {

		return;
	}


}


?>
