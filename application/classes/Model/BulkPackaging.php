<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_BulkPackaging extends ORM {

	protected $_has_many = array(
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'through' => 'bulkpackagings_bulkpackagings', 'foreign_key' => 'bulkpackaging1_id', 'far_key'=>'bulkpackaging2_id'),
			'documentlists'=> array('model' => 'DocumentList', 'foreign_key' => 'bulkpackaging_id'),
			'documents'=> array('model' => 'Document', 'foreign_key' => 'bulkpackaging_id'),
			'virtualbriefcases'=> array('model' => 'ViritualBriefcase', 'through' => 'virtualbriefcases_bulkpackagings')
	);
	
	protected $_belongs_to = array(
			'box'=> array('model' => 'Box', 'foreign_key' => 'box_id'),
			'attachment'=> array('model' => 'Attachment', 'foreign_key' => 'attachment_id')
	);
}


?>
