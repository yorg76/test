<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class User {
	
	public  $user;
	
	// association with Address class	
	public $address;
	
	// association with Company class	
	public $company;
	
	public $id;

	public $email;

	public $username;

	public $password;

	public $logins;

	public $last_login;

	public $cname;
	
	public $firstname;
	
	public $lastname;
	
	public $pesel;
	
	public $nip;
	
	public $regon;
	
	public $phone;
	
	public $status;
	
	protected $csa;
	
	public $comments;
	
	public $street;
	
	public $postal;
	
	public $city;
	
	public $country;
	

	// association with Service class
	// association with Order class
	
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
			$this->company = $this->user->companies->find();
			$this->id = $this->user->id;
			$this->firstname = $this->user->firstname;
			$this->lastname = $this->user->lastname;
			$this->username = $this->user->username;
			$this->email = $this->user->email;
			$this->status = $this->user->status;
			$this->phone = $this->user->phone;
			$this->comments = $this->user->comments;
			$this->csa = $this->user->csa;
			
			if ($this->user->pesel != '') {
				$this->pesel=$this->user->pesel;
			}else{
				$this->cname=$this->company->name;
				$this->nip=$this->company->nip;
				$this->regon=$this->company->regon;
			}
			
			$this->street=$this->address->street;
			$this->city=$this->address->city;
			$this->postal=$this->address->postal;
			$this->country=$this->address->country;
				
		}else {
			$this->user = ORM::factory('User');
			$this->address = ORM::factory('Address');
			$this->company = ORM::factory('Company');
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
		
	public function getCSA() {
		return $this->csa;
	}
	
	public function updateUser($params) {
	
		$log=Kohana_Log::instance();
		$user=$this->user;
		$address=$this->address;
		$company=$this->company;
	
		if(is_array($params)) {
				
			$user->firstname=$params['firstname'];
			$user->lastname=$params['lastname'];
			$user->email=$params['email'];
			$user->username=$params['username'];
			$user->password=$params['pass'];
			$user->comments=$params['comments'];
			$user->csa=$params['csa'];
				
			if($params['tel'])	$user->phone=$params['tel'];
			if($params['pesel'] AND $params['IsIndividual']) $user->pesel=$params['pesel'];
				
			try {
				if($user->update()) {
						
					if(!$params['IsIndividual']) {
	
						$company->name=$params['cname'];
						$company->nip=$params['nip'];
						$company->regon=$params['regon'];
						$company->update();

						$address->street=$params['cstreet'];
						$address->postal=$params['cpostal'];
						$address->city=$params['ccity'];
						$address->country=$params['ccountry'];
						$address->update();
							
					}else {
						$address->street=$params['street'];
						$address->postal=$params['postal'];
						$address->city=$params['city'];
						$address->country=$params['country'];
						$address->update();
					}
						
					$log->add(Log::DEBUG,"Success: Updated user with params:".serialize($params)."\n");
					return true;
				}
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}
		
	public function registerUser($params) {
		
		$log=Kohana_Log::instance();
		$user=$this->user;
		$address=$this->address;
		$company=$this->company;
		
		if(is_array($params)) {
			
			$user->firstname=$params['firstname'];
			$user->lastname=$params['lastname'];
			$user->email=$params['email'];
			$user->username=$params['username'];
			$user->password=$params['pass'];
			$user->comments=$params['comments'];
			
			if($params['tel'])	$user->phone=$params['tel'];
			if($params['pesel'] AND $params['IsIndividual']) $user->pesel=$params['pesel'];
			
			try {
				if($user->save()) {
					
					if(!$params['IsIndividual']) {
						
						$company->name=$params['cname'];
						$company->nip=$params['nip'];
						$company->regon=$params['regon'];
	
						if($company->save()) {
							$user->add('companies',$company);
						}
	
						$address->street=$params['cstreet'];
						$address->postal=$params['cpostal'];
						$address->city=$params['ccity'];
						$address->country=$params['ccountry'];
						
						
						if($address->save()) { 
							$user->add('addresses',$address);
							$this->registerHRD($params,$user,$address,$company);
						}
					
					}else {
						$address->street=$params['street'];
						$address->postal=$params['postal'];
						$address->city=$params['city'];
						$address->country=$params['country'];
						
						if($address->save()) {
							$user->add('addresses',$address);
							$this->registerHRD($params,$user,$address,$company);
						}
					}
					
					$user->add('roles', ORM::factory('role', array('name' => 'login')));
					$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");
					return true;
				} 
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				return false;
			}
		}
	}


	public function registerHRD($params,$user=NULL,$address=NULL,$company=NULL) {
		
		$log=Kohana_Log::instance();
		$ClientService = new ClientService(HRDConfig::CLIENT, array("encoding"=>"UTF-8", "exceptions" => true));
		$ClientService->__setSoapHeaders(array(new SoapHeader(HRDConfig::CLIENT, "AuthHeader", new HRDConfig())));
		$ClientService_Response=array();
		
		if(!$params['IsIndividual']) {
			try {
				$ClientService_Response=json_decode($ClientService->create($user->firstname." ".$user->lastname,
						"",
						1,
						$user->pesel,
						$user->email,
						"+48." . preg_replace ( array ( "/.*\./", "/^48/", "/^\+48/" ), "", $user->phone ),
						"",
						"",
						$address->street,
						$address->city,
						$address->postal,
						'PL'));
					
				if((boolean) $ClientService_Response->status) {
					$user->csa= (String) $ClientService_Response->clientId;
					$user->save();
				}else {
					if(isset($ClientService_Response->error)) $log->add(Log::ERROR,'HRD:'.$ClientService_Response->error."\n\n");
				}
				$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");
				return true;
					
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				if(isset($ClientService_Response->error)) $log->add(Log::ERROR,'HRD:'.$ClientService_Response->error."\n\n");
				return false;
			}
		}else{
			try {
				$ClientService_Response=json_decode($ClientService->create($company->name,
						$user->firstname." ".$user->lastname,
						0,
						$company->nip,
						$user->email,
						"+48." . preg_replace ( array ( "/.*\./", "/^48/", "/^\+48/" ), "", $user->phone ),
						"",
						"",
						$address->street,
						$address->city,
						$address->postal,
						'PL'));
					
				if((boolean) $ClientService_Response->status) {
					$user->csa= (String) $ClientService_Response->clientId;
					$user->save();
				}else {
					if(isset($ClientService_Response->error)) $log->add(Log::ERROR,'HRD:'.$ClientService_Response->error."\n\n");
				}
				$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");
				return true;

			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
				if(isset($ClientService_Response->error)) $log->add(Log::ERROR,'HRD:'.$ClientService_Response->error."\n\n");
				return false;
			}
		}
	}


	public function registerDA() {
		
		$log=Kohana_Log::instance();
		
		// TODO Change Server Id
		
 		try {
			$sock = HTTPSocket::instance(1);
		
			$sock->query('/CMD_API_ACCOUNT_USER',
				array(
						'action' => 'create',
						'domain' => strtolower($this->username).".blade-runner.pl",
						'username' => substr($this->username,0,7),
						'email' => $this->email,
						'passwd' => md5($this->email.$this->username),
						'passwd2' => md5($this->email.$this->username),
						'ubandwidth' => 'ON',
						'notify' => no,
						'vdomains' => '100',
						'quota' => '100',
						'dnscontrol' => 'OFF',
						'sysinfo' => 'OFF',
						'ssh' => 'OFF',
						'php' => 'ON',
						'ssl' => 'ON',
						'cron' => 'ON',
						'cgi' => 'ON',
						'add' => 'Submit',
						'ip' => '178.32.201.117',
			));
		
			$result = $sock->fetch_parsed_body();
			$log->add(Log::DEBUG,'DA:'.serialize($result)."\n\n");
			$log->add(Log::DEBUG,'DA:'."Successfully added DA user\n\n");
			
			if($result['error']=="0") return true;
			else return $result['text'].": ".$result['details'];
			
 		}catch (Exception $e) {
 			$log->add(Log::ERROR,'DA:'.$e->getMessage()."\n\n");
 			return $result;
 		}
	}
	
	public function modifyDA() {
		
		$log=Kohana_Log::instance();
		
		try {
			
			$sock = HTTPSocket::instance(1);
				
			$sock->query('/CMD_API_MODIFY_USER',array(
				'action' => 'customize',
				'user'=>substr($username,0,7)
			));
		
			$result = $sock->fetch_parsed_body();
			return $result;
		
		}catch (Exception $e) {
 			$log->add(Log::ERROR,'DA:'.$e->getMessage()."\n\n");
 			return $result;
		}
	}
	
	public function getDAUsername($username=NULL) {
	
		// TODO Set server id
		try {
			$sock = HTTPSocket::instance(1);
	
			$sock->set_method("GET");
	
			$sock->query('/CMD_API_SHOW_USER_CONFIG',array(
				'user'=>substr($username,0,7)
			));
	
			$result = $sock->fetch_parsed_body();
			return $result;
		}catch (Exception $e) {
 			$log->add(Log::ERROR,'DA:'.$e->getMessage()."\n\n");
 			return $result;
		}
	
	}
	
	public function getDA() {
		
		// TODO Set server id
		try {
			$sock = HTTPSocket::instance(1);
		
			$sock->set_method("GET");
		
			$sock->query('/CMD_API_SHOW_USER_CONFIG',array(
				'user'=>substr($this->username,0,7)
			));
		
			$result = $sock->fetch_parsed_body();
			return $result;
		}catch (Exception $e) {
			$log->add(Log::ERROR,'DA:'.$e->getMessage()."\n\n");
			return $result;
		}
	}


	public function getHRD() {
		
		$log=Kohana_Log::instance();
		$ClientService = new ClientService(HRDConfig::CLIENT, array("encoding"=>"UTF-8", "exceptions" => true));
		$ClientService->__setSoapHeaders(array(new SoapHeader(HRDConfig::CLIENT, "AuthHeader", new HRDConfig())));
		$ClientService_Response=array();
		
		try {
			$ClientService_Response=json_decode($ClientService->info($this->csa));
				
			if((boolean) $ClientService_Response->status) {
				$log->add(Log::DEBUG,"Success: Registered user with params:".serialize($params)."\n");
				return $ClientService_Response;
			}else {
				if(isset($ClientService_Response->error)) $log->add(Log::ERROR,'HRD:'.$ClientService_Response->error."\n\n");
				return false;
			}
		
		}catch (Exception $e) {
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
			if(isset($ClientService_Response->error)) $log->add(Log::ERROR,'HRD:'.$ClientService_Response->error."\n\n");
			return false;
		}
		return false;
	}


	public function getUserOrders() {

		return;
	}


	public function getUserServices() {

		return;
	}


	public function getUserDomains() {

		return;
	}


	public function addUserAddress() {

		return;
	}


	public function addCorepondenceAddress() {

		return;
	}


	public function sendInitialEmail() {

		return;
	}


	public function addUserCompany() {

		return;
	}


}


?>
