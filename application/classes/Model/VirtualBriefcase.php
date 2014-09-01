<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_VirtualBriefcase extends ORM {

	protected $_belongs_to = array(
			'division'=> array('model' => 'Division')
	);
	
	protected $_has_many = array(
			'viritualbriefcases'=> array('model' => 'ViritualBriefcase', 'through' => 'virtualbriefcases_virtualbriefcases'),
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'through' => 'virtualbriefcases_bulkpackagings'),
			'documentlists'=> array('model' => 'DocumentList', 'through' => 'virtualbriefcases_documentlists'),
			'boxes'=> array('model' => 'Box', 'through' => 'virtualbriefcases_boxes'),
			'documents'=> array('model' => 'Document', 'through' => 'virtualbriefcases_documents')
	);
}


?>
