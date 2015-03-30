<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_User extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();

		if(strtolower ( $this->request->action()) == 'calendar') $this->add_init(" Calendar.init();\t\n");
		if(strtolower ( $this->request->action()) == 'dashboard') $this->add_init(" Calendar.init();\t\n");
		
	}
	
	
	protected function load_content() {
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.min.js');
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ecommerce-index.js');
		
		if(strtolower ( $this->request->action()) == 'calendar') {
			$this->add_css ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/fullcalendar.css');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/lib/moment.min.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/fullcalendar.min.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/lang-all.js');
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'calendar.js');
		}
		
		if(strtolower ( $this->request->action()) == 'dashboard') {
			$this->add_css ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/fullcalendar.css');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/lib/moment.min.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/fullcalendar.min.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'fullcalendar/lang-all.js');
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'calendar.js');
		}
		
		$this->class='page-header-fixed page-quick-sidebar-over-content';
	
		
		if (Kohana::find_file ( 'views', $this->_req )) {

			
			$this->content = View::factory ( $this->_req );
				
			if (file_exists ( CSS . $this->_req . '.css' )) {
				$this->add_css ( CSS . $this->_req . '.css' );
			}
				
			if (file_exists ( JS . $this->_req . '.js' )) {
				$this->add_js ( JS . $this->_req . '.js' );
			}
		}
	}
	
	public function action_index() {
		
	}
	
	public function action_test() {
		
		$customer = Customer::instance('0');
			
		$who_get_notified = $customer->customer->users->where('id','IN',DB::expr('(SELECT user_id FROM user_rights WHERE get_monthly_email=1)'));
		
		var_dump($who_get_notified->find_all());
	}
	
	
	
	public function action_import1() {
		
		die;
		
		$row = 1;
		
		$content = "";
		
		if (($handle = fopen(DOCROOT."/sql/importy/klienci.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Customer:".$data[2]."\n";
					$params = array();
					
					$customer = Customer::instance();
					$customer->id = str_replace('\N', NULL, $data[0]);
					$customer->customer->code =str_replace('\N', NULL,  $data[1]);
					$customer->name =str_replace('\N', NULL,  $data[2]);
					$customer->nip =str_replace('\N', NULL,  $data[12]);
					$customer->comments = "Klient importowany";
					$customer->create_date = date('Y-m-d');
					
					$params['street'] =str_replace('\N', NULL,  explode(' ',$data[5])[0]);
					$params['number'] =str_replace('\N', NULL,  explode(' ',$data[5])[1]);
					$params['city'] =str_replace('\N', NULL,  $data[7]);
					$params['postal'] =str_replace('\N', NULL,  $data[8]);
					$params['telephone']  =str_replace('\N', NULL,  $data[9]);
					
					$params['name'] =str_replace('\N', NULL,  $data[2]);
					$params['nip'] =str_replace('\N', NULL,  $data[12]);
					$params['comments'] = "Klient importowany";
					
					$customer->customer->id=str_replace('\N', NULL, $data[0]);
					
					if($customer->addCompany($params)) {
						$content .= "<p> Customer added </p>";
					}
					
					
				}
				
				$row++;
			}
			fclose($handle);
		}
		
		$this->template->bind('content', $content);
	}
	
	public function action_import2() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/magazyny.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
					
					$warehouse = ORM::factory('Warehouse');
					
					$warehouse->id = $data[0];
					$warehouse->name = $data[1];
					$warehouse->description = $data[2];
					$warehouse->customer_id = 0;
					
					if($warehouse->save()) {
						$content .= "<p> Warehouse added </p>";
					}
						
						
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}

	
	
	public function action_import3() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/baza_opak.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";

					if($data[5] == "23" || $data[5]=="24") {
						$box= ORM::factory("Box");
					
						//0 - opakowanie nowe 10 - opakowanie przyjete do magazynu 20 - opakowanie wydane z magazynu 90 - skasowane
					
						$box->id = $data[0];
						$box->barcode = $data[2];
						$box->place = str_replace("\N", NULL,$data[1]);
						$box->description = str_replace("\N", NULL,$data[3]);
					
						if($data[4] = 0) {
							$box->status = "Nowe";
							
						}elseif($data[4] = 10) {
							$box->status = "Na magazynie";
							
						}elseif($data[4] = 20) {
							$box->status = "Wypożyczone";
						
						}elseif($data[4] = 90) {
							$box->status = "Usunięte";
						}else {
							$box->status = NULL;
						}
					
						if($box->save()) {
						$content .= "<p> Warehouse added </p>";
						}
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}

	public function action_import3_1() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/pudla.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					if($data[5] == "23" || $data[5]=="24") {
						$box= ORM::factory("Box",$data[0]);
							
						//0 - opakowanie nowe 10 - opakowanie przyjete do magazynu 20 - opakowanie wydane z magazynu 90 - skasowane
							
						$box->barcode = $data[2];
						$box->place = str_replace("\N", NULL,$data[1]);
						$box->description = str_replace("\N", NULL,$data[3]);
							
						if($data[4] = 0) {
							$box->status = "Nowe";
								
						}elseif($data[4] = 10) {
							$box->status = "Na magazynie";
								
						}elseif($data[4] = 20) {
							$box->status = "Wypożyczone";
	
						}elseif($data[4] = 90) {
							$box->status = "Usunięte";
						}else {
							$box->status = NULL;
						}
							
						$box->date_to = str_replace("\N", NULL,$data[9]);
						
						if($box->update()) {
							$content .= "<p> Box updated </p>";
						}
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import3_2() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/baza_opak.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					if($data[5] == "18") {
						$place= ORM::factory("Place");
							
						//0 - opakowanie nowe 10 - opakowanie przyjete do magazynu 20 - opakowanie wydane z magazynu 90 - skasowane
						$place->id = $data[0];
						$place->barcode = $data[2];
						$place->description = $data[3];
						
						
							
						if($data[4] = 10) {
							$place->status = "Używane";
	
						}elseif($data[4] = 90) {
							$place->status = "Usunięte";
						}else {
							$place->status = NULL;
						}
	
						if($place->save()) {
							$content .= "<p> Place added </p>";
						}
					}
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}

	public function action_import3_3() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/baza_opak.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					if($data[5] == "23" || $data[5] == "24") {
						
						$box = ORM::factory('Box',$data[0]);
						
						if(str_replace("\N", NULL,$data[1]) != NULL  ) {
							
							$place= ORM::factory("Place",$data[1]);
							
							if($place->loaded()) {
								$place->capacity++;
								if($place->update()) {
									$content .= "<p> Place added </p>";
								}
							}else {
								$box->place_id=NULL;
								if($box->update()) {
										$content .= "<p> Box updated</p>\n";
									$bulkp = ORM::factory('BulkPackaging');
									$bulkp->id=$data[1];
									$bulkp->name="Opakownie zbiorcze";
									$bulkp->description="Opakownie zbiorcze";
									$bulkp->box_id=$box->id;
									try {
										if($bulkp->save()) {
											$content .= "<p> Saved bulkpacking</p>\n";
										}
									}catch(Exception $e) {
											$content .= "<p> Bulkpacking not saved</p>\n";
									}
								}
							}
						}
					}
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import4() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/pudla_magazyny.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					$box= ORM::factory("Box",$data[1]);
					$box->warehouse_id = $data[2];
						
					if($box->loaded() && $box->update()) {
						$content .= "<p> Warehouse added </p>";
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import5() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/opisy_pudla.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					$box= ORM::factory("Box",$data[1]);
					$box->description = $data[3];
	
					if($box->update()) {
						$content .= "<p> Warehouse added </p>";
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import6() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/documenty.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					$doc = ORM::factory('Document');
					$doc->id = $data[0];
					$doc->name = $data[1];
	
					if($doc->save()) {
						$content .= "<p> Warehouse added </p>";
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}		

	public function action_import7() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/dokumenty_opak.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
	
					$doc = ORM::factory('Document',$data[1]);
					
					if($doc->loaded()) {
						$doc->box_id = $data[4];
						try {
							if($doc->update()) {
								$content .= "<p> Doc added </p>";
							}
						}catch (Exception $e) {
							$content .= "<p>".$e->getMessage()."</p>";
						}
					}else {
						
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import8() {
die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/kategorie.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Warehouse:".$data[1]."\n";
						
					$warehouse = ORM::factory('StorageCategory');
						
					$warehouse->id = $data[0];
					$warehouse->name = $data[1];
					$warehouse->description = $data[2];
					$warehouse->period = $data[3];
						
					if($warehouse->save()) {
						$content .= "<p> Warehouse added </p>";
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import9() {
		die;
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/grupydok.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Grupa:".$data[1]."\n";
	
					$division = ORM::factory('Division');
	
					$division ->id = $data[0];
					$division ->name = $data[1];
					$division ->description = $data[1];
					$division ->customer_id = $data[2];
	
					if($division->save()) {
						$content .= "<p> Division added </p>";
					}
	
	
				}
	
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}

	public function action_import10() {
		
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/pudla.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Grupa:".$data[12]."\n";
	
					$box = ORM::factory('Box',$data[0]);
					
					$box->division_id=$data[12];
					
					if($box->loaded() && $box->update()) {
						$content .= "<p> Box updated</p>";
					}
				}
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_import11() {
	
		$row = 1;
	
		$content = "";
	
		if (($handle = fopen(DOCROOT."/sql/importy/klienci.csv", "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
	
				if($row > 1) {
					$content .= "<p> $num fields in line $row: <br /></p> Grupa:".$data[12]."\n";
	
					$pricetable = Pricetable::instance();
					$params=array();
					$params['boxes_reception'] = 1;
					$params['boxes_sending'] = 1;
					$params['boxes_storage'] = 1;
					$params['document_scan'] = 1;
					$params['document_copy'] = 1;
					$params['document_notarial_copy']= 1; 
					$params['position_disposal']= 1;
					$params['discount']= 1;
					$params['customer_id']= $data[0];
					
					$pricetable->addPricetable($params);
					
					if($pricetable->addPricetable($params)) {
						$content .= "<p> Box updated</p>";
					}
				}
				$row++;
			}
			fclose($handle);
		}
	
		$this->template->bind('content', $content);
	}
	
	public function action_dashboard() {
		
		
		$customer=Auth::instance()->get_user()->customer;
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$boxes = array();
			$boxes = ORM::factory('Box')->count_all();
		}
		elseif(Auth::instance()->logged_in('manager')){
			$warehouses = $customer->warehouses->find_all();
			$warehouses_ids= array();
			$boxes = array();
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->count_all();
		}
		elseif(Auth::instance()->logged_in('login')) {
			$user = Auth::instance()->get_user();
			$divisions = $user->divisions->find_all();
			$divisions_ids= array();
			$boxes = array();
			foreach ($divisions as $division) {
				array_push($divisions_ids, $division->id);
					
			}
			
			if(count($divisions_ids) > 0) {
				$boxes = ORM::factory('Box')->where('division_id','IN', $divisions_ids)->count_all();
			}else {
				$boxes = 0;
			}
		}
		
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('storagecategories', $storagecategories);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('divisions', $divisions);
		
		//=============================================
		
		$user = Auth::instance()->get_user();
		$customer=$user->customer;
		$users = $customer->users->find_all();
		$users_ids=array();
		
		foreach ($users as $u) {
			array_push($users_ids, $u->id);
		}
		
		$orders=ORM::factory('Order')->where('user_id', 'IN', $users_ids)->count_all();
		$this->content->bind('orders', $orders);
		
		//==============================================
		
		$customers = Auth::instance()->get_user()->customer->count_all();
		$this->content->bind('customers', $customers);
		
		$orders_per_month = $user->orders->where(DB::expr("MONTH(create_date)"),'=',date('m'))->find_all();
		$orders_sum = 0;
		
		foreach ($orders_per_month as $order) {
			$orders_sum += $order->final_price;	
		}
		
		$this->content->bind('orders_sum',$orders_sum);
		
	}
	
	public function action_calendar() {
		
	}

	public function action_create() 
	{
		$this->template->content = View::factory('user/create')
			->bind('errors', $errors)
			->bind('message', $message);
			
		if (HTTP_Request::POST == $this->request->method()) 
		{			
			try {
				$user = ORM::factory('user')->create_user($this->request->post(), array(
					'username',
					'password',
					'email'				
				));
				
				$user->add('roles', ORM::factory('role', array('name' => 'login')));
				
				$_POST = array();
				
				$message = "Doda�e� u�ytkownika '{$user->username}' do bazy";
				
			} catch (ORM_Validation_Exception $e) {
				
				// Set failure message
				$message = 'Wyst�pi�y b��dy. Prosz� poprawi� formularz';

				
				// Set errors using custom messages
				$errors = $e->errors('models');
			}
		}
	}
	
	public function action_login() 
	{
		$this->template->content = View::factory('user/login')
			->bind('message', $message);
			
		if (HTTP_Request::POST == $this->request->method()) 
		{
			// Attempt to login user
			$remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
			$user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
			
			// If successful, redirect user
			if ($user) 
			{
				Request::current()->redirect('user/index');
			} 
			else 
			{
				$message = 'Login failed';
			}
		}
	}
	
	public function action_logout() 
	{
		// Log user out
		Auth::instance()->logout();
		
		// Redirect to login page
		Request::current()->redirect('user/login');
	}



public function action_profile(){
	
		$user = Auth::instance()->get_user();
		$roles = ORM::factory('Role')->where('name','!=','admin')->find_all();
		$divisions = $user->customer->divisions->find_all();
		 
		$user_divisions = $user->divisions->find_all();
		 
		$this->content->bind('user', $user);
		 
		$this->content->bind('divisions', $divisions);
		$this->content->bind('user_divisions', $user_divisions);
		$this->content->bind('roles', $roles);

		if($this->request->method()===HTTP_Request::POST) {
			 
			if(is_array($_POST['divisions'])) {
				foreach($_POST['divisions'] as $div) {
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


			$user->values($_POST);

			foreach ($_POST['roles'] as $role) {
				if(!$user->has('roles',$role)) {
					$user->add('roles',$role);
				}
			}

			foreach($user->roles->find_all() as $role) {
				if(!in_array($role->id, $_POST['roles'])) {
					$user->remove('roles',$role);
				}
			}

			$validate = new Validation($_POST);
			$validate->rule('firstname', 'not_empty')
			->rule('lastname', 'not_empty')
			->rule('username', 'not_empty');

			if($validate->check() && $user->update($validate)){
				Message::success(ucfirst(__('Dane użykownika zostały zaktualizowane')),'/customer/users');
			}else{
				Message::error(ucfirst(__('Wystąpił błąd')." ".$validate->errors('msg')),'/customer/users');
			}

		}
	
	}
}
