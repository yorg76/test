<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Order extends ORM {

	protected $_belongs_to = array(
			'user'=> array('model' => 'User', 'foreign_key' => 'user_id'),
			'address'=> array('model' => 'Address', 'foreign_key' => 'address_id'),
			'warehouse' => array('model'=>'Warehouse','foreign_key' => 'warehouse_id'),
			'division' =>array('model'=>'Division','foreign_key' => 'division_id'),
			'shipmentcompany'=> array('model' => 'ShipmentCompany', 'foreign_key' => 'shipmentcompany_id'),
	);
	
	protected $_has_one = array(
			'invoice'=> array('model' => 'Invoice', 'foreign_key' => 'order_id'),
	);
	
	protected $_has_many = array(
			'boxes'=> array('model' => 'Box', 'through' => 'orders_boxes'),
			'orderdetails'=>array('model' => 'OrderDetail')
	);
}


?>
