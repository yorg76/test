<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_DocumentScan extends ORM {
	
	protected $_belongs_to = array(
			'document'=> array('model' => 'Document', 'foreign_key' => 'document_id'),
	);
	
}


?>
