<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Order extends ORM {

	protected $_belongs_to = array(
			'user'=> array('model' => 'User', 'foreign_key' => 'user_id')
	);
	
	protected $_has_one = array(
			'address'=> array('model' => 'Address', 'foreign_key' => 'address_id'),
			'invoice'=> array('model' => 'Invoice', 'foreign_key' => 'invoice_id')
	);
	
	protected $_has_many = array(
			'boxes'=> array('model' => 'Box', 'foreign_key' => 'box_id')
	);
}


?>
