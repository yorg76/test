<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Order extends ORM {

	public $order;
	public $id;
	public $status;
	public $type;
	
	public $types = array('Zamówienie pudeł i kodów kreskowych','Zamówienie odbioru i magazynowania pudeł','Zamówienie zniszczenie magazynowanych pozycji','Zamówienie skanowania, kopii dokumentów','Zamówienie kopii notarialnej dokumentów');

	public $statuses = array('Nowe','Przyjęte do realizacji','Oczekuje na wysłanie','W doręczeniu','Dostarczone','W trakcie realizacji','W trakcie odbioru','W dostrczeniu na magazyn','Na stanie magazynu','Odebrane','Zrealizowane');
	
	public static function instance($id=NULL) {
		if($id !== NULL) {
			return new Order($id);
		}else{
			return new Order(NULL);
		}
	}
	
	public function __construct($id) {
	
		if($id !== NULL) {
			$this->order=ORM::factory('Order',$id);
			$this->id=$this->order->id;
			$this->status=$this->order->status;
			$this->type=$this->order->type;
		}else {
			$this->order=ORM::factory('Order');
			$this->order->status='Nowe';
			$this->status='Nowe';
		}
	}
	
	public function register($params) {

		$log=Kohana_Log::instance();
		
		if(is_array($params)) {
			$this->order->user_id=Auth_ORM::instance()->get_user()->id;
			$this->order->status="Nowe";
			$this->order->type=$this->types[$params['order_type']];
			
			if(isset($params['pickup_address']) && $params['pickup_address'] != '-- Wybierz --' && $params['pickup_address'] != NULL) {
				$this->order->address_id=$params['pickup_address'];
			}elseif(isset($params['delivery_address']) && $params['delivery_address'] != '-- Wybierz --' && $params['pickup_address'] != NULL) {
				$this->order->address_id=$params['delivery_address'];
			}elseif($params['order_type'] == 0 || $params['order_type'] == 1){
				$address=ORM::factory('Address');
				$address->city=$params['city'];
				$address->street=$params['street'];
				$address->number=$params['number'];
				$address->flat=$params['flat'];
				$address->postal=$params['postal'];
				$address->country=$params['country'];
				$address->telephone=$params['telephone'];
				
				if($params['order_type']==1) $address->address_type='odbioru';
				else $address->address_type='wysyłki';
				
				$address->save();
				$this->order->address_id=$address->id;
				
				
				
			}else {
				$this->order->address_id=$this->order->user->customer->addresses->where('address_type','=','firmowy')->find()->id;
			}
			
			$this->order->warehouse_id=$params['warehouse'];
			$this->order->division_id=$params['division'];
			
			if($params['box_quantity'] > 0) {
				$this->order->quantity=$params['box_quantity'];
			}else {
				$this->order->quantity=-1;
			}
			
			if($params['date_reception'] != "") {
				$this->order->pickup_date=$params['date_reception'];
			}

			
			
			try {
					
				if($this->order->save()) {
					if($params['order_type'] == 0 || $params['order_type'] == 2 || $params['order_type'] == 3 || $params['order_type'] == 4) {
						if(isset($params['boxes']) && is_array($params['boxes']) && $params['order_type'] == 0) {
							foreach ($params['boxes'] as $box) {
								$bbox=ORM::factory('Box')->where('id', '=', $box)->find();
								if($bbox->lock != 1) {
									$bbox->lock='1';
									if($bbox->update()) {
										$this->order->add('boxes', $box);
									}
								}
							}
						}
					}elseif($params['order_type'] == 1 && $params['box_quantity'] > 0) {
						for($i=1; $i <= $params['box_quantity']; $i++) {
							$order_detail = ORM::factory('OrderDetail');
							$order_detail->box_number = $params['box_id'][$i];
							$order_detail->box_storagecategory = $params['box_storagecategory'][$i]["storagecategory"];
							$order_detail->box_description = $params['box_description'][$i]["description"];
							$order_detail->box_date =  date('Y-m-d', strtotime('+'.$params['box_date'][$i]["date"].' years')); 
							$order_detail->order_id = $this->order->id;
							if($order_detail->save()) {
								$log->add(Log::DEBUG,"Success: Dodano pudła do zamówienia:".serialize($i)."\n");
							}
						}
					}
					
					$this->id=$this->order->id;
					
					$paramse = array();
					
					$user = Auth_ORM::instance()->get_user();
					
					$operators=$user->customer->users->join('roles_users')->on('roles_users.user_id','=','user.id')->join('roles')->on('roles_users.role_id','=','roles.id')->where('roles.name','=','operator')->find_all(); 

					foreach($operators as $opertor) {
					
						$paramse['subject']="Nowe zamówienie w systemie";
						$paramse['email_title'] = "Złożono nowe zamówienie: ".$this->order->id;
						$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
						$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
						$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
						$paramse['email_content'] .="<p>Użytkownik: ".$this->order->user->username."</p>";
						$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
						$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
						$paramse['email_content'] .="<p>Link do akceptacji: <a href=\"".URL::base('https',FALSE)."order/accept/".$this->order->id."\">Kliknij aby zaakceptować zamówienie</a></p>";					
						$paramse['email'] = $opertor->email;
						$paramse['firstname'] = $opertor->firstname;
						$paramse['lastname']= $opertor->lastname;
						
						$this->sendEmail($paramse);
						
						$notification = ORM::factory('Notification');
							
						$notification->status=0;
						$notification->message="Nowe zamówienie w systemie<br /><br />";
						$notification->message.="<p>Link do akceptacji: <a href=\"".URL::base('https',FALSE)."order/accept/".$this->order->id."\">Kliknij aby zaakceptować zamówienie</a></p>";
						$notification->user_id=$opertor->id;
						
						try {
							$notification->save();
						}catch (Exception $e) {
							$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
						}
					}
					
					$paramse['subject']="Twoje nowe zamówienie w systemie";
					$paramse['email_title'] = "Nowe zamówienie zostało dodane pod numerem: ".$this->order->id;
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
					$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
					$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
					$paramse['email'] = $user->email;
					$paramse['firstname'] = $user->firstname;
					$paramse['lastname']= $user->lastname;
					
					$this->sendEmail($paramse);
					
					$log->add(Log::DEBUG,"Success: Dodano zamówienie parametrami:".serialize($params)."\n");
		
				}else {
					$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodwania zamówienia'."\n");
				}
				return true;
			}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage().$e->getTraceAsString()."\n");
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

	public function changeStatus() {

		return;
	}

	public function printConfirmation() {

		return;
	}

	public function generateConfirmationCode() {

		return;
	}

	public function getBoxesDescription() {

		return;
	}

}


?>
