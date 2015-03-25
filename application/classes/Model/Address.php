<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Address extends ORM {
	
	protected $_belongs_to = array(
			'customer'=> array('model' => 'Customer', 'foreign_key' => 'customer_id'),
			'order'=> array('model' => 'Order', 'foreign_key' => 'order_id')
	);
	
	public function address() {
			
		return $this->street." ".$this->number.($this->flat !="" ? "/".$this->flat : " ")."<br />\n".$this->city.", ".$this->postal;
	}
}


?>
