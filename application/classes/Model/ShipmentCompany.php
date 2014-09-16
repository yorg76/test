<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_ShipmentCompany extends ORM {

	protected $_belongs_to = array(
			'customer'=> array('model' => 'Customer', 'foreign_key' => 'customer_id')
	);
	
	protected $_has_many = array(
			'order'=> array('model' => 'Order', 'foreign_key' => 'shipmentcompany_id'),
	);
	
}


?>
