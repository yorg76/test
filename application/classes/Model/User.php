<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Model_User extends Model_Auth_User {
	
	/**
	 * A user has many tokens and roles
	 *
	 * @var array Relationhips
	 */
	
	protected $_has_many = [
		'user_tokens' => ['model' => 'User_Token'],
		'roles'       => ['model' => 'Role', 'through' => 'roles_users'],
		'addresses'       => ['model' => 'Address', 'through' => 'addresses_users'],
		'companies'       => ['model' => 'Company', 'through' => 'companies_users'],
	];
		
}