<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class User {
	
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
		if($id!=NULL) {
			return new User($id);
		}else{
			return new User(NULL);
		}
	}
	
	public function __construct($id) {
		if($id!=NULL) {
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
				//$user->username=$params['username'];
				$user->password=$params['password'];
				
				if(is_array($params['divisions'])) {
					foreach($params['divisions'] as $div) {
						if(!$user->has('divisions',$div))	{
							$user->add('divisions',$div);
						}
					}
					foreach ($user->divisions->find_all() as $div) {
						if(!in_array($div->id, $_POST['divisions'])) {
							$user->remove('divisions',$div->id);
						}
					}
				}
				
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

		$logo = $email->embed(DOCROOT.ASSETS_ADMIN_LAYOUT_IMG."logo-big.png");
		$social_facebook= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_facebook.png");
		$social_twitter= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_twitter.png");
		$social_googleplus= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_googleplus.png");
		$social_linkedin= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_linkedin.png");
		$social_rss= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_rss.png");
						
		$message = $message_template->render();
		$message = str_replace("logo.png", $logo, $message);
		$message = str_replace("social_facebook.png", $social_facebook, $message);
		$message = str_replace("social_twitter.png", $social_twitter, $message);
		$message = str_replace("social_googleplus.png", $social_googleplus, $message);
		$message = str_replace("social_linkedin.png", $social_linkedin, $message);
		$message = str_replace("social_rss.png", $social_rss, $message);

		if(isset($params['attachments']) && is_array($params['attachments'])) {
			foreach ($params['attachments'] as $attachment) {
				$email->attach_file($attachment);
			}
		}
		
		$email->message($message, 'text/html');
		$email->to($params['email'],$params['firstname']." ".$params['lastname']);
		$email->from(Kohana::$config->load('email')->as_array()['options']['fromemail'],"System magazynowy");
			
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

					foreach ($params['divisions'] as $division) {
						if(!$user->has('divisions',$division)) {
							$user->add('divisions',$division);
						}
					}
					
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					
					if($user->update()) {
						$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");
						$paramse = array();
						
						if(EasyRSA::PKI_initieted()) {
							EasyRSA::setClientCertFile($user->username, $params['password'], $customer->name, $user->email,TRUE);
							$paramse['attachments'] = array(EasyRSA::getClientCertFile($user->username));
						}
						
						
						$paramse['subject']="Rejestracja nowego użytkownika systemu";
						$paramse['email_title'] = "Witamy w gronie użytkowników systemu";
						$paramse['email_info'] = "Poniżej znajdują się dane do logowania do systemu";
						$paramse['email_content'] = "<p>Użytkownik: ".$user->username." </p><p>Hasło: ".$params['password']."<br />";
						$paramse['email'] = $user->email;
						$paramse['firstname'] = $user->firstname;
						$paramse['lastname']= $user->lastname;
					
						$this->sendEmail($paramse);
					
						
					}else {
						$log->add(Log::ERROR,"Error: User role not added:".serialize($params)."\n");
						return false;
					}
					
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
