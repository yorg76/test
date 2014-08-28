<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_WarehouseBarcode extends ORM {

	protected $_belongs_to = array(
			'warehouse'=> array('model' => 'Warehouse', 'foreign_key' => 'warehouse_id'),
			'box'=> array('model' => 'Box', 'foreign_key' => 'box_id')
	);
}


?>
