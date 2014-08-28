<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_BoxBarcode extends ORM {

	protected $_belongs_to = array(
			'box'=> array('model' => 'Box', 'foreign_key' => 'box_id')
	);
}


?>
