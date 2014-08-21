<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class User extends ORM {
	
	public $user;
	public $id;
	public $email;
	public $username;
	public $password;
	public $logins;
	public $last_login;
	public $firstname;
	public $lastname;
	public $status;
		
	public static function instance($id=NULL) {
		if($id>1) {
			return new User($id);
		}else{
			return new User(NULL);
		}
	}
	
	public function __construct($id) {
		if($id>1) {
			$this->user = ORM::factory('User')->where('id','=',$id)->find();
			$this->address = $this->user->addresses->where('type','=',0)->find();
			$this->customer = $this->user->customer->find();
			$this->division = $this->user->divisions->find();
			$this->id = $this->user->id;
			$this->firstname = $this->user->firstname;
			$this->lastname = $this->user->lastname;
			$this->username = $this->user->username;
			$this->email = $this->user->email;
			$this->status = $this->user->status;
									
		}else {
			$this->user = ORM::factory('User');
			$this->customer = ORM::factory('Customer');
			$this->division = ORM::factory('Division');
		}
	}
	
	public function deleteUser() {
		$log=Kohana_Log::instance();
	
		if($this->user->loaded()) {
			if($this->user->delete()) {
				$log->add(Log::DEBUG,"Success: Removed user:".$user->user->username."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove user:".$user->user->username."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove user:".$user->user->username."\n");
			return false;
		}
	}
	
	public function lockUser() {
		$log=Kohana_Log::instance();
		
		if($this->user->loaded()) {
			$this->user->status="locked";
			if($this->user->save()) {
				$log->add(Log::DEBUG,"Success: Locked user:".$user->user->username."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Locked user:".$user->user->username."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Locked user:".$user->user->username."\n");
			return false;
		}
	}
	
	public function unlockUser() {
		$log=Kohana_Log::instance();
	
		if($this->user->loaded()) {
			$this->user->status="active";
			if($this->user->save()) {
				$log->add(Log::DEBUG,"Success: UnLocked user:".$user->user->username."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: UnLocked user:".$user->user->username."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: UnLocked user:".$user->user->username."\n");
			return false;
		}
	}
		
	public function editUser($params) {
	
		$log=Kohana_Log::instance();
		$user=$this->user;
		$customer=$this->customer;
		$division=$this->division;
	
		if(is_array($params)) {
						
			try {
				$user->firstname=$params['firstname'];
				$user->lastname=$params['lastname'];
				$user->email=$params['email'];
				$user->username=$params['username'];
				$user->password=$params['pass'];
				$user->update();
						
					$log->add(Log::DEBUG,"Success: Updated user with params:".serialize($params)."\n");
					return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}
		
	public function registerUser($params) {
		
		$log=Kohana_Log::instance();
		$user=$this->user;
		$customer=$this->customer;
		$division=$this->division;
		
		if(is_array($params)) {
			
			try {
				if($user->save()) {
					
					$user->firstname=$params['firstname'];
					$user->lastname=$params['lastname'];
					$user->email=$params['email'];
					$user->username=$params['username'];
					$user->password=$params['pass'];
					$user->save();
											
					}
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");
					return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}
}


?>
