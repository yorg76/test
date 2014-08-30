<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Box extends ORM {

	protected $_belongs_to = array(
			'warehouse'=> array('model' => 'Warehouse', 'foreign_key' => 'warehouse_id'),
			'order'=> array('model' => 'Order', 'foreign_key' => 'order_id'),
			
	);
	
	protected $_has_many = array(
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'foreign_key' => 'box_id'),
			'documents'=> array('model' => 'Document', 'foreign_key' => 'box_id'),
			'documentlists'=> array('model' => 'DocumentList', 'foreign_key' => 'box_id')
	);
	
	protected $_has_one = array(
			'boxbarcode'=> array('model' => 'BoxBarcode',	'foreign_key' => 'box_id'),
			'warehousebarcode'=> array('model' => 'WarehouseBarcode',	'foreign_key' => 'box_id')
	);
}


?>
