<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_DocumentList extends ORM {

	protected $_has_many = array(
			'documents'=> array('model' =>  'Document', 'through' => 'document_id')
			
	);
	
	protected $_belongs_to = array(
			'virtualbriefscase'=> array('model' => 'VirtualBriefcase', 'foreign_key' => 'virtualbriefcase_id'),
			'bulkpackaging'=> array('model' => 'BulkPackaging', 'foreign_key' => 'bulkpackaging_id')
	);
}


?>
