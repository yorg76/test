<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Model_Acl extends ORM {
	
	protected $_has_many = array(
			'roles'=> array('model' => 'role', 'through' => 'acls_roles'),
	);
	
	public function has_children() {
		return $this->where('parent', '=', $this->id)->count_all();
	}
	
	public function children() {
		return ORM::factory('Acl')->where('parent', '=', $this->id)->and_where('menu', '=', '1')->order_by('order')->find_all();
	}
	
	public function checkRights() {
		
		foreach(Auth_ORM::instance()->get_user()->roles->find_all() as $role) {
			if($this->has('roles',$role->id)) return true;
		}
		return false;
	}
}


?>
