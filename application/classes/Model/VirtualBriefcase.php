<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_VirtualBriefcase extends ORM {

	protected $_has_one = array(
			'division'=> array('model' => 'Division', 'foreign_key' => 'division_id')
	);

	protected $_has_many = array(
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'through'=>'virtualbriefcases_bulkpackagings'),
			'documentlists'=> array('model' => 'DocumentList', 'through'=>'virtualbriefcases_documentlists'),
			'boxes'=> array('model' => 'Box', 'through'=>'virtualbriefcases_boxes'),
			'viritualbriefcases'=> array('model' => 'ViritualBriefcase', 'through'=>'virtualbriefcases_virtualbriefcases'),
			'documents'=> array('model' => 'Document', 'foreign_key' => 'virtualbriefcase_id')
	);
}


?>
