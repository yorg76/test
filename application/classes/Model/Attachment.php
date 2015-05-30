<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Attachment extends ORM {
	protected $_belongs_to = array(
			'user'=> array('model' => 'User', 'foreign_key' => 'user_id')
	);
	
	
	protected $_has_one = array(
			'documentlists'=> array('model' =>  'DocumentList', 'foreign_key' => 'attachment_id'),
			'documents'=> array('model' =>  'Document', 'foreign_key' => 'attachment_id'),
			'virtualbriefcases'=> array('model' =>  'VirtualBriefcase', 'foreign_key' => 'attachment_id'),
			'bulkpackagings'=> array('model' =>  'BulkPackaging.php', 'foreign_key' => 'attachment_id'),
	);
}


?>
