<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Box extends ORM {

	public $box;
	public $id;
	public $storage_category;
	public $date_from;
	public $date_to;
	public $date_reception;
	public $lock;
	public $seal;
	public $warehouse;
	
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
			$this->id=$this->box->id;
			$this->storage_category=$this->box->storage_category;
			$this->date_from=$this->box->date_from;
			$this->date_to=$this->box->date_to;
			$this->date_reception=$this->box->date_reception;
			$this->lock=$this->box->lock;
			$this->seal=$this->box->seal;
			$this->description=$this->warehouse->description;
			$this->warehouse = $this->box->warehouse;
				
	
	
		}else {
			$this->box = ORM::factory('Box');
			$this->warehouse = ORM::factory('Warehouse');
			
		}
	}
	
	public function addBox() {

		return;
	}


	public function editBox() {

		return;
	}
	
	public function deleteBox() {
	
		return;
	}
	
	public function is_locked() {

		return;
	}


	public function is_sealed() {

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


	public function deleteBulkpackaging() {

		return;
	}


	public function deleteBocumentlist() {

		return;
	}


	public function deleteDocument() {

		return;
	}


}


?>
