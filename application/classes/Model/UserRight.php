<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_UserRight extends ORM {

	protected $_table_name = 'user_rights';
			
	protected $_belongs_to = array(
			'user'=> array('model' => 'User', 'foreign_key' => 'user_id')
	);
}


?>
