<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_OrderDetail extends ORM {

	protected $_belongs_to = array(
			'order'=> array('model' => 'Order', 'foreign_key' => 'order_id'),
			'storagecategory'=>array('StorageCategory','foreign_key'=>'box_storagecategory'),
	);	
	
}


?>
