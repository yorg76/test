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
	public $division;


	
	
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
			$this->division_id = $this->box->division->id;
				
	
	
		}else {
			$this->box = ORM::factory('Box');
			$this->warehouse = ORM::factory('Warehouse');
			$this->boxbarcode =  ORM::factory('BoxBarcode');
			$this->storagecategory = ORM::factory('StorageCategory', NULL);
			//$this->division = ORM::factory('Division', NULL);
			
		}
	}
	
	public function addBox($params) {
        $log=Kohana_Log::instance();

        $this->box->values($params);
            
        if(is_array($params)) {
            try {
                Database::instance()->begin();
                if($this->box->save()) {
                	$this->box->reload();
                    $this->id=$this->box->id;
                    $this->box->status="Na magazynie";
                    
                    $wh = ORM::factory('WarehouseHistory');
                    $wh->operation_type="Wejście na magazyn";
                    $wh->operation_description="Dodanie pudła do magazynu";
                    $wh->box_id=$this->box->id;
                    $wh->user_id=Auth::instance()->get_user()->id;
                    $wh->warehouse_id=$params['warehouse_id'];
                    $wh->save();
                    
                    $log->add(Log::DEBUG,"Success: Dodano pudło z parametrami:".serialize($params)."\n");
                    Database::instance()->commit();
                    return true;
                }else {
                    $log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodawania pudło'."\n");
                }
                return false;
            }catch (Exception $e) {
                $log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
                return false;
            }
        }
    }

    public function createBox() {
    	$log=Kohana_Log::instance();
    
    	$params = array();
    
    	if(is_array($params)) {
    		try {
    			Database::instance()->begin();
    			$warehouse = ORM::factory('Warehouse')->where('name','=','NW')->find();
    			
    			$this->box->status="Puste";
    			$this->box->warehouse_id=$warehouse->id;
    			
    			if($this->box->save()) {
    				$this->box->reload();
    				$this->id=$this->box->id;
    				$this->box->barcode=$this->box->id;
    				$this->box->update();
    				
    				$wh = ORM::factory('WarehouseHistory');
    				$wh->operation_type="Utworzenie pustego pudła";
    				$wh->operation_description="Dodanie pudła do magazynu";
    				$wh->box_id=$this->box->id;
    				$wh->user_id=Auth::instance()->get_user()->id;
    				$wh->warehouse_id=$params['warehouse_id'];
    				$wh->save();
    
    				$log->add(Log::DEBUG,"Success: Dodano pudło z parametrami:".serialize($params)."\n");
    				Database::instance()->commit();
    				return true;
    			}else {
    				$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodawania pudło'."\n");
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
		$this->division=ORM::factory('Division',$params['division_id']);
		$this->box->warehouse_id=$this->warehouse->id;
		$this->box->storage_category_id=$this->storagecategory->id;
		$this->box->division_id=$this->division->id;
		
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
			
			$wh = ORM::factory('WarehouseHistory');
			$wh->operation_type="Wyjście z magazynu";
			$wh->operation_description="Usunięto pudło";
			$wh->box_id=$this->box->id;
			$wh->user_id=Auth::instance()->get_user()->id;
			$wh->warehouse_id=$this->box->warehouse_id;
			$wh->save();
			
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
