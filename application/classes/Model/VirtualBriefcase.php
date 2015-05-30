<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_VirtualBriefcase extends ORM {

	protected $_belongs_to = array(
			'division'=> array('model' => 'Division'),
			'attachment'=> array('model' => 'Attachment', 'foreign_key' => 'attachment_id')
	);
	
	protected $_has_many = array(
			'virtualbriefcases'=> array('model' => 'ViritualBriefcase', 'through' => 'virtualbriefcases_virtualbriefcases', 'foreign_key' => 'virtualbriefcase1_id', 'far_key'=>'virtualbriefcase2_id'),
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'through' => 'virtualbriefcases_bulkpackagings'),
			'documentlists'=> array('model' => 'DocumentList', 'through' => 'virtualbriefcases_documentlists'),
			'boxes'=> array('model' => 'Box', 'through' => 'virtualbriefcases_boxes'),
			'documents'=> array('model' => 'Document', 'through' => 'virtualbriefcases_documents')
	);
	
}


?>
