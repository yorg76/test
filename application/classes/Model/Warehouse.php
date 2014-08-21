<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Warehouse extends ORM {

	protected $_belongs_to = array(
			'customer'=> array('model' => 'Customer', 'foreign_key' => 'customer_id')
	);
		
	protected $_has_many = array(
			'barcodes'=> array('model' => 'WarehouseBarcode', 'foreign_key' => 'warehouse_id'),
			'boxes'=> array('model' => 'Box', 'foreign_key' => 'warehouse_id')
	);
}


?>
