<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Document extends ORM {
	
	public $document;
	public $id;
	public $name;
	public $description;
	public $box;

	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Document($id);
		}else{
			return new Document(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->document = ORM::factory('Document')->where('id','=',$id)->find();
			$this->id = $this->document->id;
			$this->name = $this->document->name;
			$this->description = $this->description;
			$this->box = $this->box;
			
		}else {
			$this->document = ORM::factory('Document');
			$this->box = ORM::factory('Box');
		}
	}
	
	public function addDocument($params) {
		$log=Kohana_Log::instance();
		$this->document->values($params);
		$this->box=ORM::factory('Box',$params['box_id']);
		$this->document->box_id=$this->box->id;
		
		if(is_array($params)) {
		
			try {
					
				if($this->document->save()) {
					$log->add(Log::DEBUG,"Success: Dodano dokument z parametrami:".serialize($params)."\n");
		
				}else {
					$log->add(Log::ERROR,'Exception:Wystąpił błąd podczas dodwania dokumentu'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}
	
	public function editDocument() {
		
		return;
	}

	public function deleteDocument() {
		$log=Kohana_Log::instance();
		
		if($this->document->loaded()) {
			$name=$this->document->name;
		
			if($this->document->delete()) {
				$log->add(Log::DEBUG,"Success: Removed document:".$name."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove document:".$name."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove document:".$name."\n");
			return false;
		}
		return;
		return;
	}


}


?>
