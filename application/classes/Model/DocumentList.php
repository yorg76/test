<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_DocumentList extends ORM {

	protected $_has_many = array(
			'documents'=> array('model' =>  'Document', 'foreign_key' => 'documentlist_id'),
			'viritualbriefcases'=> array('model' => 'ViritualBriefcase', 'through' => 'virtualbriefcases_documentlists')
			
	);
	
	protected $_belongs_to = array(
			'bulkpackaging'=> array('model' => 'BulkPackaging', 'foreign_key' => 'bulkpackaging_id'),
			'box'=> array('model' => 'Box', 'foreign_key' => 'box_id')
	);
}


?>
