<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Warehouse extends ORM {

	public $warehouse;
	public $id;
	public $name;
	public $description;
	
	public static function instance($id=NULL) {
		if($id>0) {
			return new Warehouse($id);
		}else{
			return new Warehouse(NULL);
		}
	}
	
	public function addWarehouse() {
	
		return;
	}
	
	public function editWarehouse() {
	
		return;
	}
	
	public function deleteWarehouse() {
	
		return;
	}

}


?>
