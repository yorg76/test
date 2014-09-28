<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Pricetable extends ORM {

	protected $_belongs_to = array(
			'customer'=> array('model' => 'Customer', 'foreign_key' => 'customer_id')
	);
	
	public function filters()
	{
		return array(
				'boxes_reception' => array(
						array(function($value) {
							return str_replace(array(',',' '), array('.',''), $value);
						}
							),
				),
				
				'boxes_sending' => array(
						array(function($value) {
							return str_replace(array(',',' '), array('.',''), $value);
						}
							),
				),
				
				'document_scan' => array(
						array(function($value) {
							return str_replace(array(',',' '), array('.',''), $value);
						}
							),
				),
				'document_copy' => array(
						array(function($value) {
							return str_replace(array(',',' '), array('.',''), $value);
						}
							),
				),
				'document_notarial_copy' => array(
						array(function($value) {
							return str_replace(array(',',' '), array('.',''), $value);
						}
							),
				),
				'boxes_storage' => array(
						array(function($value) {
							return str_replace(array(',',' '), array('.',''), $value);
						}
							),
				),
				
		);
	}
}


?>
