<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_VirtualBriefcase extends ORM {

	protected $_belongs_to = array(
			'division'=> array('model' => 'Division', 'foreign_key' => 'division_id')
	);

	protected $_has_many = array(
			'viritualbriefcases'=> array('model' => 'ViritualBriefcase', 'through'=>'virtualbriefcases_boxes'),
			'bulkpackagings'=> array('model' => 'BulkPackaging', 'foreign_key' => 'virtualbriefcase_id'),
			'documentlists'=> array('model' => 'DocumentList', 'foreign_key' => 'virtualbriefcase_id'),
			'boxes'=> array('model' => 'Box', 'foreign_key' => 'virtualbriefcase_id'),
			'documents'=> array('model' => 'Document', 'foreign_key' => 'virtualbriefcase_id')
	);
}


?>
