<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Document extends ORM {
	
	protected $_belongs_to = array(
			'bulkpackaging'=> array('model' => 'BulkPackaging', 'foreign_key' => 'bulkpackaging_id'),
			'documentlist'=> array('model' => 'DocumentList', 'foreign_key' => 'documentlist_id'),
			'box'=> array('model' => 'Box', 'foreign_key' => 'box_id')
	);
	
	protected $_has_one = array(
			'scan' => array('model'=>'DocumentScan')
	);
	
			
	protected $_has_many = array(
			'viritualbriefcases'=> array('model' => 'ViritualBriefcase', 'through' => 'virtualbriefcases_documents'),
			'files' => array ('model'=>'DocumentScan')
	);
}


?>
