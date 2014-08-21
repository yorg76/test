<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_BulkPackaging extends ORM {

	protected $_has_many = array(
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'foreign_key' => 'bulkpackaging_id'),
			'documentlists'=> array('model' => 'DocumentList', 'foreign_key' => 'bulkpackaging_id'),
			'documents'=> array('model' => 'Document', 'foreign_key' => 'bulkpackaging_id')
	);
	
	protected $_belongs_to = array(
			'viritualbriefcase'=> array('model' => 'ViritualBriefcase', 'foreign_key' => 'virtualbriefcase_id'),
			'box'=> array('model' => 'Box', 'foreign_key' => 'box_id')
	);
}


?>
