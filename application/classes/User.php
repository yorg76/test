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
	public $customer;
	public $division;
		
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
			$this->id = $this->user->id;
			$this->customer = $this->user->customer;
			$this->division = $this->user->divisions;
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
			$username=$this->user->username;
					
			if($this->user->delete()) {
				$log->add(Log::DEBUG,"Success: Removed user:".$username."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Remove user:".$username."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Remove user:".$username."\n");
			return false;
		}
	}
	
	public function lockUser() {
		$log=Kohana_Log::instance();
		
		if($this->user->loaded()) {
			$this->user->status="zablokowany";
			if($this->user->update()) {
				$log->add(Log::DEBUG,"Success: Locked user:".$this->user->username."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: Locked user:".$this->user->username."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: Locked user:".$this->user->username."\n");
			return false;
		}
	}
	
	public function unlockUser() {
		$log=Kohana_Log::instance();
	
		if($this->user->loaded()) {
			$this->user->status="aktywny";
			if($this->user->update()) {
				$log->add(Log::DEBUG,"Success: UnLocked user:".$this->user->username."\n");
				return true;
			}
			else {
				$log->add(Log::DEBUG,"Fail: UnLocked user:".$this->user->username."\n");
				return false;
			}
		}else {
			$log->add(Log::DEBUG,"Fail: UnLocked user:".$this->user->username."\n");
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
	
	public function sendEmail($params) {
		
		$log=Kohana_Log::instance();
		
		$email = Email::factory($params['subject']);
		
		$message_template = View::factory('templates/email_template');
		$title = $params['subject'];
		$message_template->bind('title', $title);
		
		$message_template->bind('email_title', $params['email_title']);
		
		
		$message_template->bind('email_info', $params['email_info']);
		
		
		$message_template->bind('email_content', $params['email_content']);
			
		$message = $message_template->render();
			
		$logo = $email->embed(DOCROOT.ASSETS_ADMIN_LAYOUT_IMG."logo-big.png");
			
		$message = str_replace("logo.png", $logo, $message);
			
		$social_facebook= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_facebook.png");
			
		$message = str_replace("social_facebook.png", $social_facebook, $message);
			
		$social_twitter= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_twitter.png");
			
		$message = str_replace("social_twitter.png", $social_twitter, $message);
			
		$social_googleplus= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_googleplus.png");
			
		$message = str_replace("social_googleplus.png", $social_googleplus, $message);
			
		$social_linkedin= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_linkedin.png");
			
		$message = str_replace("social_linkedin.png", $social_linkedin, $message);
			
		$social_rss= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_rss.png");
			
		$message = str_replace("social_rss.png", $social_rss, $message);
			
		$email->message($message, 'text/html');
		$email->to($params['email'],$params['firstname']." ".$params['lastname']);
		$email->from(Kohana::$config->load('email')->as_array()['default']['options']['fromemail'],"System magazynowy");
			
		try {
			if($email->send()) $log->add(Log::DEBUG,"Success: User email sent\n");
			else $log->add(Log::ERROR,"Error: User email not sent\n");
		}catch (Exception $e) {
			$log->add(Log::ERROR,"Error: User email not sent\n");
		}
	}
		
	public function registerUser($params) {
		
		$log=Kohana_Log::instance();
		$user=$this->user;
		$customer=$this->customer;
		$division=$this->division;
		
		$user->firstname=$params['firstname'];
		$user->lastname=$params['lastname'];
		$user->email=$params['email'];
		$user->username=$params['username'];
		$user->password=$params['password'];
		$user->customer_id=$params['customer_id'];
		
		
		if(is_array($params)) {
			
			try {
			
				if($user->save()) {
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");

					$paramse = array();
					$paramse['subject']="Rejestracja nowego użytkownika systemu";
					$paramse['email_title'] = "Witamy w gronie użytkowników systemu";
					$paramse['email_info'] = "Poniżej znajdują się dane do logowania do systemu";
					$paramse['email_content'] = "<p>Użytkownik: ".$user->username." </p><p>Hasło: ".$params['password']."<br />";
					$paramse['email'] = $user->email;
					$paramse['firstname'] = $user->firstname;
					$paramse['lastname']= $user->lastname;
					
					$this->sendEmail($paramse);
					
					return true;
				}else {
					$log->add(Log::ERROR,'Exception:Wystąpił błąd podczas dodwania usera'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}
}


?>
