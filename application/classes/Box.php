<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Box{

	public $box;
	public $id;
	public $description;
	public $date_from;
	public $date_to;
	public $date_reception;
	public $lock;
	public $seal;
	public $storagecategory;
	public $warehouse;
	public $boxbarcode;


	
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Box($id);
		}else{
			return new Box(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
	
			$this->box = ORM::factory('Box')->where('id','=',$id)->find();
			$this->id = $this->box->id;
			$this->date_from = $this->box->date_from;
			$this->date_to = $this->box->date_to;
			$this->date_reception = $this->box->date_reception;
			$this->lock = $this->box->lock;
			$this->seal = $this->box->seal;
			$this->warehouse_id = $this->box->warehouse->id;
			//$this->boxbarcode_id = $this->box->boxbarcode->id;
			$this->storage_category_id = $this->box->storagecategory->id;
				
	
	
		}else {
			$this->box = ORM::factory('Box');
			$this->warehouse = ORM::factory('Warehouse');
			$this->boxbarcode =  ORM::factory('BoxBarcode');
			$this->storagecategory = ORM::factory('StorageCategory', NULL);
			
		}
	}
	
	public function addBox($params) {
        $log=Kohana_Log::instance();

        $this->box->values($params);
            
        if(is_array($params)) {
            try {
                Database::instance()->begin();
                if($this->box->save()) {
                    $this->id=$this->box->id;
                    $log->add(Log::DEBUG,"Success: Dodano pozycję z parametrami:".serialize($params)."\n");
                    Database::instance()->commit();
                    return true;
                }else {
                    $log->add(Log::ERROR,'Exception:Wystąpił błąd podczas dodawania pozycji'."\n");
                }
                return false;
            }catch (Exception $e) {
                $log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
                return false;
            }
        }
    }


	public function updateBox($params) {
		$log=Kohana_Log::instance();
		$this->box->values($params);
		$this->warehouse=ORM::factory('Warehouse',$params['warehouse_id']);
		$this->storagecategory=ORM::factory('StorageCategory',$params['storage_category_id']);
		$this->box->warehouse_id=$this->warehouse->id;
		$this->box->storage_category_id=$this->storagecategory->id;
		
		if($this->box->update()) {
			$this->id=$this->box->id;
			$log->add(Log::DEBUG,"Success: Updated Box with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: Box not updated with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}
	
	public function deleteBox() {
		$log=Kohana_Log::instance();
	
		if($this->box->loaded()) {
			$id=$this->box->id;
					
			if($this->box->delete()) {
				$log->add(Log::DEBUG,"Success: Removed box:".$id."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove box:".$id."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove box:".$id."\n");
			return false;
		}
	}
	
	public function is_locked() {

		return;
	}


	public function is_sealed() {

		return;
	}


	public function addBulkPackaging() {

		return;
	}


	public function addDocumentList() {

		return;
	}


	public function addDocument() {
		
	}


	public function deleteBulkpPackaging() {

		return;
	}


	public function deleteDocumentList() {

		return;
	}


	public function deleteDocument() {

		return;
	}


}


?>
