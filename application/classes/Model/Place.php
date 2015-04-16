<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Place extends ORM {

	protected $_has_many = array(
			'boxes'=> array('model' =>  'Box', 'foreign_key' => 'place_id'),
			
	);
		
}


?>
