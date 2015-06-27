<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Order {

	public $order;
	public $id;
	public $status;
	public $type;
	
	public $types = array('Zamówienie pustych pudeł i kodów kreskowych',
						'Zamówienie odbioru i magazynowania pudeł',
						'Zamówienie zniszczenie magazynowanych pudeł',
						'Zamówienie skanowania, kopii dokumentów',
						'Zamówienie kopii notarialnej dokumentów',
						'Wypożyczenie pudeł',
						'Zamówienie ogólne');
	
	public $types_short = array('Zamówienie pustych pudeł i kodów kreskowych'=>'ZPPiKK',
							'Zamówienie odbioru i magazynowania pudeł'=>'ZOiMP',
							'Zamówienie zniszczenie magazynowanych pudeł'=>'ZZMP',
							'Zamówienie skanowania, kopii dokumentów'=>'ZSKD',
							'Zamówienie kopii notarialnej dokumentów'=>'ZKND',
							'Wypożyczenie pudeł'=>'WP',
							'Zamówienie ogólne'=>'ZO');
	
	public $statuses = array('Nowe',
							'Przyjęte do realizacji',
							'Oczekuje na wysłanie',
							'W doręczeniu',
							'Dostarczone',
							'W trakcie realizacji',
							'W trakcie odbioru',
							'W dostarczeniu na magazyn',
							'Na stanie magazynu',
							'Odebrane',
							'Zrealizowane');
	
	public $pricetable;
	
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
			$this->pricetable = $this->order->pricetable->where('active','=','1');
		}else {
			$this->order=ORM::factory('Order');
			$this->order->status='Nowe';
			$this->pricetable = Auth_ORM::instance()->get_user()->customer->pricetables->where('active','=','1')->find();
			$this->order->pricetable = $this->pricetable;
			$this->status='Nowe';
		}
	}
	
	public function updateOrder($params) {
		$log=Kohana_Log::instance();
	
	
		if($this->order->loaded()) {
					
			if(date('Y-m-d',strtotime($this->order->pickup_date)) != date('Y-m-d',strtotime($params['pickup_date']))) {
				$this->pickup_date=$params['pickup_date'];
				$this->order->pickup_date=$params['pickup_date'];
				
				if($this->order->update()) {
					$paramse = array();
					
					$paramse['subject']="W twoim zamówieniu zmieniono datę";
					$paramse['email_title'] = "W zamówieniu numer ".$this->order->id." zmieniono datę.";
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] = "<p>Przyczyna zmiany: ".$params['reason']." </p>";
					$paramse['email'] = $this->order->user->email;
					$paramse['firstname'] = $this->order->user->firstname;
					$paramse['lastname']= $this->order->user->lastname;
				
					$this->sendEmail($paramse);
					
					return true;
					
				}else {
					return false;
				}
			}else {
				return true;
			}
		}else {
			return false;
		}
	}
		
	public function deliverOrder() {
		$log=Kohana_Log::instance();
	
		//TODO API firmy kurierskiej
	
		if($this->order->loaded()) {
			$this->status='Dostarczone';
			$this->order->status='Dostarczone';
				
			if($this->order->update()) {
				
				
					
				$paramse = array();
					
				$paramse['subject']="Twoje zamówienie zmieniło status";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Firma kurierska: ".$this->order->shipmentcompany->name."</p>";
				$paramse['email_content'] .="<p>Numer paczki: ".$this->order->shipping_number."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
	
				$this->sendEmail($paramse);
	
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zmieniło status<br /><br />";
				$notification->user_id=$this->order->user->id;
	
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
	
				$paramse = array();
					
				$user = Auth_ORM::instance()->get_user();
					
				$delivery_managers=$user->customer->users->join('roles_users')->on('roles_users.user_id','=','user.id')->join('roles')->on('roles_users.role_id','=','roles.id')->where('roles.name','=','operator')->find_all();
	
				foreach($delivery_managers as $dm) {
	
					$paramse['subject']="Zamówienie zmieniło status";
					$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
					$paramse['email_content'] .="<p>Firma kurierska: ".$this->order->shipmentcompany->name."</p>";
					$paramse['email_content'] .="<p>Numer paczki: ".$this->order->shipping_number."</p>";
					$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
					$paramse['email_content'] .="<p>Użytkownik: ".$this->order->user->username."</p>";
					$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
					$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
					$paramse['email'] = $dm->email;
					$paramse['firstname'] = $dm->firstname;
					$paramse['lastname']= $dm->lastname;
	
					$this->sendEmail($paramse);
	
					$notification = ORM::factory('Notification');
	
					$notification->status=0;
					$notification->message="Nowe zamówienie zostało wysłane<br /><br />";
					$notification->user_id=$dm->id;
	
					try {
						$notification->save();
					}catch (Exception $e) {
						$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
					}
				}
	
				$log->add(Log::DEBUG,"Success: Zamówienie zostało zaakceptowane parametrami:".$this->order->id."\n");
	
				return true;
			}else return false;
		}else return false;
			
	}
	
	
	public function sendOrderByEmail($params) {
		$log=Kohana_Log::instance();

		if($this->order->loaded()) {
			$this->status='Zrealizowane';
			$this->order->status='Zrealizowane';
				
			if($this->order->update()) {
				$paramse = array();
				$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$params['order_type']."-".$order->order->id.".pdf";
				
				$user = Auth::instance()->get_user();
				$customer=$user->customer;
				$address=$user->customer->addresses->where('address_type','=','firmowy')->find();
				$order = $this;
				
				$documents = $this->order->documents->find_all();
				
				$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
				$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
				$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
				$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
				$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
				$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
				$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
					
				$document_template = View_MPDF::factory('order/order_scans');
				
				$document_template->bind_global('documents', $documents);
				$document_template->bind_global('customer', $customer);
				$document_template->bind_global('address', $address);
				$document_template->bind_global('user', $user);
					
				$document_template->bind_global('order',$order);
					
				$document_template->get_mpdf()->SetDisplayMode('fullpage');
				$document_template->get_mpdf()->WriteHTML($document_css,1);
				$document_template->write_to_disk(PDF.$document_filename);
				
				$pdf = EasyRSA::signFile(PDF.$document_filename);
				
				$pdf->Output(PDF.$document_filename,'F');
				
				if(file_exists(PDF.$document_filename)) {
					$this->order->utilisation_document=$document_filename;
					$log->add(Log::DEBUG,'Dokument utylizacji został wygenerowany'."\n");
					$paramse['attachments'] = array(0=>PDF.$document_filename);
					try {
						$this->order->update();
					}catch (Exception $e) {
						$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodwania dokumentu zamówienia'."\n");
					}
				}	
								
				$paramse['subject']="Twoje zamówienie zmieniło status";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Firma kurierska: ".$this->order->shipmentcompany->name."</p>";
				$paramse['email_content'] .="<p>Numer paczki: ".$this->order->shipping_number."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
	
				$this->sendEmail($paramse);
	
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zmieniło status<br /><br />";
				$notification->user_id=$this->order->user->id;
	
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
	
				$paramse = array();
					
				$user = Auth_ORM::instance()->get_user();
					
				$delivery_managers=$user->customer->users->join('roles_users')->on('roles_users.user_id','=','user.id')->join('roles')->on('roles_users.role_id','=','roles.id')->where('roles.name','=','operator')->find_all();
	
				foreach($delivery_managers as $dm) {
	
					$paramse['subject']="Zamówienie zmieniło status";
					$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
					$paramse['email_content'] .="<p>Firma kurierska: ".$this->order->shipmentcompany->name."</p>";
					$paramse['email_content'] .="<p>Numer paczki: ".$this->order->shipping_number."</p>";
					$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
					$paramse['email_content'] .="<p>Użytkownik: ".$this->order->user->username."</p>";
					$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
					$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
					$paramse['email'] = $dm->email;
					$paramse['firstname'] = $dm->firstname;
					$paramse['lastname']= $dm->lastname;
	
					$this->sendEmail($paramse);
	
					$notification = ORM::factory('Notification');
	
					$notification->status=0;
					$notification->message="Nowe zamówienie zostało wysłane<br /><br />";
					$notification->user_id=$dm->id;
	
					try {
						$notification->save();
					}catch (Exception $e) {
						$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
					}
				}
	
				$log->add(Log::DEBUG,"Success: Zamówienie zostało zaakceptowane parametrami:".$this->order->id."\n");
	
				return true;
			}else return false;
		}else return false;
			
	}
	
	public function sendOrder($params) {
		$log=Kohana_Log::instance();
	
		//TODO API firmy kurierskiej
	
		if($this->order->loaded()) {
			$this->status='W doręczeniu';
			$this->order->status='W doręczeniu';
			$this->order->shipmentcompany_id=$params['shipmentcompany_id'];
			$this->order->shipping_number=$params['shipping_number'];
			
			if($this->order->update()) {
				$paramse = array();
					
				$paramse['subject']="Twoje zamówienie zmieniło status";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Firma kurierska: ".$this->order->shipmentcompany->name."</p>";
				$paramse['email_content'] .="<p>Numer paczki: ".$this->order->shipping_number."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
	
				$this->sendEmail($paramse);
	
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zmieniło status<br /><br />";
				$notification->user_id=$this->order->user->id;
	
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
	
				$paramse = array();
					
				$user = Auth_ORM::instance()->get_user();
					
				$delivery_managers=$user->customer->users->join('roles_users')->on('roles_users.user_id','=','user.id')->join('roles')->on('roles_users.role_id','=','roles.id')->where('roles.name','=','operator')->find_all();
	
				foreach($delivery_managers as $dm) {
	
					$paramse['subject']="Zamówienie zmieniło status";
					$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
					$paramse['email_content'] .="<p>Firma kurierska: ".$this->order->shipmentcompany->name."</p>";
					$paramse['email_content'] .="<p>Numer paczki: ".$this->order->shipping_number."</p>";
					$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
					$paramse['email_content'] .="<p>Użytkownik: ".$this->order->user->username."</p>";
					$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
					$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
					$paramse['email'] = $dm->email;
					$paramse['firstname'] = $dm->firstname;
					$paramse['lastname']= $dm->lastname;
	
					$this->sendEmail($paramse);
	
					$notification = ORM::factory('Notification');
	
					$notification->status=0;
					$notification->message="Nowe zamówienie zostało wysłane<br /><br />";
					$notification->user_id=$dm->id;
	
					try {
						$notification->save();
					}catch (Exception $e) {
						$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
					}
				}
	
				$log->add(Log::DEBUG,"Success: Zamówienie zostało zaakceptowane parametrami:".$this->order->id."\n");
	
				return true;
			}else return false;
		}else return false;
			
	}
	
	public function customerdeliveryOrder() {
		$log=Kohana_Log::instance();
	
		//TODO API firmy kurierskiej
	
		if($this->order->loaded()) {
			$this->status='W trakcie odbioru';
			$this->order->status='W trakcie odbioru';
			if($this->order->update()) {
				$paramse = array();
					
				$paramse['subject']="Twoje zamówienie zostało skompletowane";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
	
				$this->sendEmail($paramse);
	
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zmieniło status<br /><br />";
				$notification->user_id=$this->order->user->id;
	
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
	
				$paramse = array();
					
				$user = Auth_ORM::instance()->get_user();
					
				$delivery_managers=$user->customer->users->join('roles_users')->on('roles_users.user_id','=','user.id')->join('roles')->on('roles_users.role_id','=','roles.id')->where('roles.name','=','operator')->find_all();
	
				foreach($delivery_managers as $dm) {
	
					$paramse['subject']="Nowe zamówienie zostało skompletowane";
					$paramse['email_title'] = "Nowe zamówienie zostało skompletowane: ".$this->order->id;
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
					$paramse['email_content'] .="<p>Użytkownik: ".$this->order->user->username."</p>";
					$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
					$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
					$paramse['email'] = $dm->email;
					$paramse['firstname'] = $dm->firstname;
					$paramse['lastname']= $dm->lastname;
	
					$this->sendEmail($paramse);
	
					$notification = ORM::factory('Notification');
	
					$notification->status=0;
					$notification->message="Nowe zamówienie zostało skompletowane<br /><br />";
					$notification->user_id=$dm->id;
	
					try {
						$notification->save();
					}catch (Exception $e) {
						$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
					}
				}
	
				$log->add(Log::DEBUG,"Success: Zamówienie zostało zaakceptowane parametrami:".$this->order->id."\n");
	
				return true;
			}else return false;
		}else return false;
			
	}
	
	public function completeOrder() {
		$log=Kohana_Log::instance();
	
		//TODO API firmy kurierskiej 
		
		if($this->order->loaded()) {
			$this->status='Oczekuje na wysłanie';
			$this->order->status='Oczekuje na wysłanie';
			if($this->order->update()) {
				$paramse = array();
					
				$paramse['subject']="Twoje zamówienie zostało skompletowane";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
	
				$this->sendEmail($paramse);
	
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zmieniło status<br /><br />";
				$notification->user_id=$this->order->user->id;
	
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
	
				$paramse = array();
					
				$user = Auth_ORM::instance()->get_user();
					
				$delivery_managers=$user->customer->users->join('roles_users')->on('roles_users.user_id','=','user.id')->join('roles')->on('roles_users.role_id','=','roles.id')->where('roles.name','=','operator')->find_all();
				
				foreach($delivery_managers as $dm) {
						
					$paramse['subject']="Nowe zamówienie zostało skompletowane";
					$paramse['email_title'] = "Nowe zamówienie zostało skompletowane: ".$this->order->id;
					$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
					$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
					$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
					$paramse['email_content'] .="<p>Użytkownik: ".$this->order->user->username."</p>";
					$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
					$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
					$paramse['email'] = $dm->email;
					$paramse['firstname'] = $dm->firstname;
					$paramse['lastname']= $dm->lastname;
				
					$this->sendEmail($paramse);
				
					$notification = ORM::factory('Notification');
						
					$notification->status=0;
					$notification->message="Nowe zamówienie zostało skompletowane<br /><br />";
					$notification->user_id=$dm->id;
				
					try {
						$notification->save();
					}catch (Exception $e) {
						$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
					}
				}
				
				$log->add(Log::DEBUG,"Success: Zamówienie zostało zaakceptowane parametrami:".$this->order->id."\n");
	
				return true;
			}else return false;
		}else return false;
			
	}
	
	public function acceptOrder() {
		$log=Kohana_Log::instance();
		
		if($this->order->loaded()) {
			$this->status='Przyjęte do realizacji';
			$this->order->status='Przyjęte do realizacji';
			if($this->order->update()) {
				$paramse = array();
					
				$paramse['subject']="Twoje zamówienie zostało przyjęte do realizacji";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zmieniło status.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] = "<p>Status zamówienia: ".$this->order->status." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email_content'] .="<p>Adres: ".$this->order->address->street." ".$this->order->address->number."/".$this->order->address->flat.", ".$this->order->address->postal.", ".$this->order->address->city."</p><br />";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
				
				if($this->order->type == "Zamówienie zniszczenie magazynowanych pudeł") {
					$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$params['order_type']."-".$order->order->id.".pdf";
					$user = Auth::instance()->get_user();
					$customer=$user->customer;
					$address=$user->customer->addresses->where('address_type','=','firmowy')->find();
					$order = $this;
				
					$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
					$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
					$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
					$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
					$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
					$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
					$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
				
					$document_template = View_MPDF::factory('order/utilisation_document');
						
					$document_template->bind_global('customer', $customer);
					$document_template->bind_global('address', $address);
					$document_template->bind_global('user', $user);
				
					$document_template->bind_global('order',$order);
				
					$document_template->get_mpdf()->SetDisplayMode('fullpage');
					$document_template->get_mpdf()->WriteHTML($document_css,1);
					$document_template->write_to_disk(PDF.$document_filename);
						
					$pdf = EasyRSA::signFile(PDF.$document_filename);
						
					$pdf->Output(PDF.$document_filename,'F');
						
					if(file_exists(PDF.$document_filename)) {
						$this->order->utilisation_document=$document_filename;
						$log->add(Log::DEBUG,'Dokument utylizacji został wygenerowany'."\n");
						$paramse['attachments'] = array(0=>PDF.$document_filename);
						try {
							$this->order->update();
						}catch (Exception $e) {
							$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodwania dokumentu zamówienia'."\n");
						}
					}
				}
						
				$this->sendEmail($paramse);
		
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zmieniło status<br /><br />";
				$notification->user_id=$this->order->user->id;
		
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
		
				$log->add(Log::DEBUG,"Success: Zamówienie zostało zaakceptowane parametrami:".$this->order->id."\n");
		
				return true;
			}else return false;
		}else return false;
			
	}
	
	public function deleteOrder() {
		
		//TODO zwolnienie locka z zamówień
		
		$log=Kohana_Log::instance();
		
		if($this->order->loaded()) {
			
			$boxes = $this->order->boxes->find_all();
			
			foreach ($boxes as $box) {
				$box->lock=0;
				$box->update();
				$this->order->remove('boxes',$box);
			}
			
			if($this->order->delete()) {
				$paramse = array();
					
				$paramse['subject']="Twoje zamówienie zostało odrzucone";
				$paramse['email_title'] = "Zamówienie numer ".$this->order->id." zostało usunięte.";
				$paramse['email_info'] = "Poniżej znajdują się informacje odnośnie zmówienia";
				$paramse['email_content'] = "<p>Numer zamówienia: ".$this->order->id." </p>";
				$paramse['email_content'] .="<p>Rodzaj zamówienia: ".$this->order->type."</p>";
				$paramse['email_content'] .="<p>Data utworzenia: ".date('d-m-Y')."</p>";
				$paramse['email'] = $this->order->user->email;
				$paramse['firstname'] = $this->order->user->firstname;
				$paramse['lastname']= $this->order->user->lastname;
				try {
					$this->sendEmail($paramse);
					
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się powiadomić użytkownika'."\n");
				}
		
				$notification = ORM::factory('Notification');
					
				$notification->status=0;
				$notification->message="Zamówienie ".$this->order->id." zostało usunięte <br /><br />";
				$notification->user_id=$this->order->user->id;
		
				try {
					$notification->save();
				}catch (Exception $e) {
					$log->add(Log::ERROR,'Nie udało się dodać powiadomienia systemowego'."\n");
				}
		
				$log->add(Log::DEBUG,"Success: Zamówienie zostało usunięte - numer:".$this->order->id."\n");
		
				return true;
			}else return false;
		}else return false;
	}
	
	public function receptOrder($params) {
		if($this->order->loaded()) {
			
			$this->status='Na stanie magazynu';
			$this->order->status='Na stanie magazynu';
			if($this->order->update()) {
				
				if(isset($params['boxes']) && is_array($params['boxes'])) {
					
					foreach ($params['boxes'] as $box) {
						$bbox=ORM::factory('Box')->where('id', '=', $box)->find();
						$bbox->lock='0';
						if($bbox->update()) {
							$this->order->add('boxes', $box);
						}
					}

					return true;
				}else return false;
			}else return false;
		}else return false;
	}
	
	public function registerOrder($params) {

		$log=Kohana_Log::instance();

		if(is_array($params)) {
			
			$this->order->final_price = floatval($params['final_price']);
			
			$this->order->user_id=Auth_ORM::instance()->get_user()->id;
			$this->order->status="Nowe";
			$this->order->type=$this->types[$params['order_type']];
			
			if(isset($params['pickup_address']) && $params['pickup_address'] != '-- Wybierz --' && $params['pickup_address'] != NULL) {
				$this->order->address_id=$params['pickup_address'];
			}elseif(isset($params['delivery_address']) && $params['delivery_address'] != '-- Wybierz --' && $params['delivery_address'] != NULL) {
				$this->order->address_id=$params['delivery_address'];
			}elseif($params['order_type'] == 0 || $params['order_type'] == 1 || $params['order_type'] == 5 || $params['order_type'] == 6){
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
			$this->order->sealed_boxes=$params['sealed_boxes'];
			$this->order->description=$params['order_description'];
			
			if($params['order_type']==0) {
				$this->order->quantity=$params['box_quantity_0'];
			}elseif($params['order_type']==1) {
				$this->order->quantity=$params['box_quantity_1'];
			}elseif($params['order_type']==5) {
				$this->order->quantity=$params['box_quantity_5'];
			}else {
				$this->order->quantity=-1;
			}
				
			if($params['date_reception_0'] != "" && $params['order_type']==0) {
				$this->order->pickup_date=$params['date_reception_0'];
			}

			if($params['date_reception_1'] != "" && $params['order_type']==1) {
				$this->order->pickup_date=$params['date_reception_1'];
			}
				
			if($params['date_reception_5'] != "" && $params['order_type']==5) {
				$this->order->pickup_date=$params['date_reception_5'];
			}
			
			if($params['date_reception_6'] != "" && $params['order_type']==6) {
				$this->order->pickup_date=$params['date_reception_6'];
			}
			
			try {
					
				if($this->order->save()) {
					$this->id=$this->order->id;
					$this->order->reload();
					$paramse = array();
					$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$params['order_type']."-".$order->order->id.".pdf";
					
					if($params['order_type'] == 2 || $params['order_type'] == 3 || $params['order_type'] == 4 || $params['order_type'] == 5 || $params['order_type'] == 6) {
						if(isset($params['boxes']) && is_array($params['boxes']) && ($params['order_type'] == 0 || $params['order_type'] == 2 || $params['order_type'] == 3 || $params['order_type'] == 4 || $params['order_type'] == 5)) {
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
						
						if(isset($params['documents']) && is_array($params['documents']) && ($params['order_type'] == 3 || $params['order_type'] == 4)) {
							foreach ($params['documents'] as $doc) {
								if($doc > 0) {
									$ddoc=ORM::factory('Document')->where('id', '=', $doc)->find();
									$this->order->add('documents', $ddoc);
								}
							}
						}
						
						if($params['order_type'] == 2) {
							$user = Auth::instance()->get_user();
							$customer=$user->customer;
							$address=$user->customer->addresses->where('address_type','=','firmowy')->find();
							$order = $this;
								
							$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
							$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
							$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
							$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
							$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
							$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
							$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
								
							$document_template = View_MPDF::factory('order/utilisation_document');
							
							$document_template->bind_global('customer', $customer);
							$document_template->bind_global('address', $address);
							$document_template->bind_global('user', $user);
								
							$document_template->bind_global('order',$order);
								
							$document_template->get_mpdf()->SetDisplayMode('fullpage');
							$document_template->get_mpdf()->WriteHTML($document_css,1);
							$document_template->write_to_disk(PDF.$document_filename);
							
							$pdf = EasyRSA::signFile(PDF.$document_filename);
							
							$pdf->Output(PDF.$document_filename,'F');
							
							if(file_exists(PDF.$document_filename)) {
								$this->order->utilisation_document=$document_filename;
								$log->add(Log::DEBUG,'Dokument utylizacji został wygenerowany'."\n");
								$paramse['attachments'] = array(0=>PDF.$document_filename);
								try {
									$this->order->update();
								}catch (Exception $e) {
									$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodwania dokumentu zamówienia'."\n");
								}
							}	
						}
					}elseif($params['order_type'] == 1 && $params['box_quantity_1'] > 0) {
						for($i=1; $i <= $params['box_quantity_1']; $i++) {
							$order_detail = ORM::factory('OrderDetail');
							$order_detail->box_number = $params['box_id'][$i];
							$order_detail->box_storagecategory = $params['box_storagecategory'][$i]["storagecategory"];
							$order_detail->box_description = $params['box_description'][$i]["description"];
							$order_detail->box_date =  date('Y-m-d', strtotime(date('d').'-'.date('m').'-'.$params['box_end_date'][$i]["box_end_date"])); 
							$order_detail->order_id = $this->order->id;
							if($order_detail->save()) {
								$log->add(Log::DEBUG,"Success: Dodano pudła do zamówienia:".serialize($i)."\n");
							}
						}
						
						$user = Auth::instance()->get_user();
						$customer=$user->customer;
						$address=$user->customer->addresses->where('address_type','=','firmowy')->find();
						$order = $this;
							
						$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
						$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
						$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
						$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
						$document_css .= @file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
						$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
						$document_css .= @file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
							
						$document_template = View_MPDF::factory('order/order_document');
						
						$document_template->bind_global('customer', $customer);
						$document_template->bind_global('address', $address);
						$document_template->bind_global('user', $user);
							
						$document_template->bind_global('order',$order);
							
						$document_template->get_mpdf()->SetDisplayMode('fullpage');
						$document_template->get_mpdf()->WriteHTML($document_css,1);
						$document_template->write_to_disk(PDF.$document_filename);
						
						$pdf = EasyRSA::signFile(PDF.$document_filename);
						
						$pdf->Output(PDF.$document_filename,'F');
						
						if(file_exists(PDF.$document_filename)) {
							$this->order->order_document=$document_filename;
							$log->add(Log::DEBUG,'Dokument zamówienia został wygenerowany'."\n");
							$paramse['attachments'] = array(0=>PDF.$document_filename);
							try {
								$this->order->update();
							}catch (Exception $e) {
								$log->add(Log::ERROR,'Exception: Wystąpił błąd podczas dodwania dokumentu zamówienia'."\n");
							}
						}
					}
					
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
					if($params['order_type'] == 6) $paramse['email_content'] .="<p>Opis zamówienia: ".$this->order->description."</p>"; 
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
			$log->add(Log::ERROR,"Error: User email not sent".$e->getMessage()."\n\n");
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
