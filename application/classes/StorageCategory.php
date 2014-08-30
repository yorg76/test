<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class StorageCategory extends ORM {

	public $storagecategory;
	public $id;
	public $name;
	public $description;
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new StorageCategory($id);
		}else{
			return new StorageCategory(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>0) {
				
			$this->storagecategory = ORM::factory('StorageCategory')->where('id','=',$id)->find();
			$this->name=$this->storagecategory->name;
			$this->id=$this->storagecategory->id;
			$this->description=$this->storagecategory->description;
							
		}else {
			$this->storagecategory = ORM::factory('StorageCategory');
		}
	}

	public function addStorageCategory($params) {
		$log=Kohana_Log::instance();
		$this->storagecategory->values($params);
	
		if($this->storagecategory->save()) {
			$this->id=$this->storagecategory->id;
			$log->add(Log::DEBUG,"Success: Added storagecategory with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: StorageCategory not added with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}

	public function deleteStorageCategory() {
		$log=Kohana_Log::instance();
		
		if($this->storagecategory->loaded()) {
			$name=$this->storagecategory->name;
		
			if($this->storagecategory->delete()) {
				$log->add(Log::DEBUG,"Success: Removed storagecategory:".$name."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove storagecategory:".$name."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove storagecategory:".$name."\n");
			return false;
		}
		return;
		return;
	}

	public function updateStorageCategory($params) {
		$log=Kohana_Log::instance();
		$this->storagecategory->values($params);
				
		if($this->storagecategory->update()) {
			$this->id=$this->storagecategory->id;
			$log->add(Log::DEBUG,"Success: Updated storagecategory with params:".serialize($params)."\n");
			return true;
		}else {
			$log->add(Log::ERROR,"Error: StorageCategory not updated with params:".serialize($params)."\n");
			return false;
		}
		
		return;
	}
}


?>
