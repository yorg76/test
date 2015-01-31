<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Division extends ORM {

	protected $_has_many = array(
			'users'=> array('model' =>  'User', 'through' => 'divisions_users'),
			'virtualbriefcases'=> array('model' => 'VirtualBriefcase'),
			'boxes'=> array('model' => 'Box')
			
	);
		
	protected $_belongs_to = array(
			'customer'=> array('model' => 'Customer', 'foreign_key' => 'customer_id')
	);
}


?>
