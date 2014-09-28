<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Customer extends ORM {

	protected $_has_many = array(
			'users'=> array('model' => 'user', 'foreign_key' => 'customer_id'),
			'addresses'=> array('model' => 'Address', 'foreign_key' => 'customer_id'),
			'divisions'=> array('model' => 'Division', 'foreign_key' => 'customer_id'),
			'warehouses'=> array('model' => 'Warehouse', 'foreign_key' => 'customer_id'),
			'invoices'=> array('model' => 'Invoice', 'foreign_key' => 'customer_id'),
			'shipmentcompanies'=> array('model' => 'ShipmentCompany', 'foreign_key' => 'customer_id'),
			'pricetables'=> array('model' => 'Pricetable',	'foreign_key' => 'customer_id')
	);
	
}


?>
