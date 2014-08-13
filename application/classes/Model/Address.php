<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Model_Address extends ORM {
	
	protected $_has_many = [
		'users'       => ['model' => 'Address', 'through' => 'addresses_users'],
	];
	
	
}
