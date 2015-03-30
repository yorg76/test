<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_User extends Model_Auth_User {
	
	protected $_has_many = array(
			'user_tokens'=> array('model' => 'User_Token'),
			'roles'=> array('model' => 'role', 'through' => 'roles_users'),
			'divisions'=> array('model' =>  'Division', 'through' => 'divisions_users'),
			'orders'=> array('model' =>  'Order', 'foreign_key' => 'user_id'),
			'notifications' => array('model'=>'Notification','foreign_key'=>'user_id')
	);
	
	protected $_has_one = array(
			'user_rights'=>array('model'=>'UserRight')
	);
	
	protected $_belongs_to = array(
			'customer'=> array('model' => 'Customer', 'foreign_key' => 'customer_id')
	);
}


?>
