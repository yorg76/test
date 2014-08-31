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

	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Document($id);
		}else{
			return new Document(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->Document = ORM::factory('Document')->where('id','=',$id)->find();
			$this->id = $this->document->id;
			$this->name = $this->document->name;
			$this->description = $this->description;
			
		}else {
			$this->box = ORM::factory('Box');
		}
	}
	
	public function addDocument() {
		$log=Kohana_Log::instance();
		$document=$this->document;
			
		$document->name=$params['name'];
		$document->description=$params['description'];
			
		if(is_array($params)) {
		
			try {
					
				if($document->save()) {
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

		return;
	}


}


?>
