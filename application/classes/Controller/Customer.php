<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Customer extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
		
		if(strtolower ( $this->request->action()) == 'users') $this->add_init("TableUsers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'user_add') $this->add_init("PasswordGenerator.init();\t\nUser_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'user_edit') $this->add_init("PasswordGenerator.init();\t\nUser_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'division_add') $this->add_init("PasswordGenerator.init();\t\nAdd_division.init();\t\n");
		if(strtolower ( $this->request->action()) == 'division_edit') $this->add_init("PasswordGenerator.init();\t\nEdit_division.init();\t\n");
		if(strtolower ( $this->request->action()) == 'info') $this->add_init("MapsGoogle.init();\t\n");
		if(strtolower ( $this->request->action()) == 'edit') $this->add_init("Customer_edit.init();\t\nCustomer_Add_delivery_address.init();\t\nCustomer_Add_pickup_address.init();\t\n");
		
		$this->add_init("UIAlertDialogApi.init();\t\n");
		
		
	}
	
	protected function load_content() {
		
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'select2/select2.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/css/datepicker.css');
		
		if(strtolower ( $this->request->action()) == 'info') $this->add_css ( ASSETS_ADMIN_PAGES_CSS.'profile.css');
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/additional-methods.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'select2/select2.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/media/js/jquery.dataTables.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->add_fjs ( ASSETS_GLOBAL_SCRIPTS.'datatable.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootbox/bootbox.min.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ui-alert-dialog-api.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-users.js');
		$this->add_fjs ( "http://maps.google.com/maps/api/js?sensor=false");
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'gmaps/gmaps.min.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'maps-google.js');
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'custom.js');
		
		if (file_exists (DOCROOT.ASSETS_ADMIN_PAGES_SCRIPTS . strtolower ( $this->request->action()) . '.js' )) {
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.strtolower ( $this->request->action()).'.js');
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
	   
    public function action_index(){    
        $modelCustomer = new Model_Customer();
        
        $pagination = Pagination::factory(array(
  		'total_items'    => $modelCustomer->count(),
  		'items_per_page' => 1,
        ));
        $customer = $modelCustomer->getList($pagination);
        $page_links = $pagination->render();
        
        $this->template->content= View::factory('customer/index')
                                    ->set('customer',$customer)
                                    ->bind('page_links',$page_links);
    }    
    
    public function action_users() {
    
    	$users = Auth::instance()->get_user()->customer->users->find_all();
    	    	   
    	$this->content->bind('users', $users);
    
    }
    
    public function action_add(){
        $Model = new Model_Customer();
                
        if($this->request->method()===HTTP_Request::POST) {
            $validate = new Validation($_POST);
            $validate->rule('nazwa', 'not_empty')
                     ->rule('nip', 'not_empty')
					 ->rule('regon', 'not_empty');
            
            if($validate->check()){
                $Model->add($_POST);
                $success = "Nowy klient zosta� utworzony";
            }else{
                $error = $validate->errors('msg');
            }
        }
        $this->template->content = View::factory('Customer/add')
                                        ->bind('success',$success)
                                        ->bind('error',$error);;       
    } 
    public function action_delete(){        
        $id = $this->request->param('id');
        $modelCustomer = new Model_Customer();
        $modelCustomer->delete($id);
        $this->request->redirect('Customer/index');
    } 
    
    public function action_user_edit(){   
    	if($this->request->param('id') > 0 ) {
    		
        	$user = ORM::factory('User')->where('id','=',$this->request->param('id'))->find();
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
	                Message::success(ucfirst(__('Dane klienta zostały zaktualizowane')),'/customer/users');
    	        }else{
        	    	Message::error(ucfirst(__('Wystąpił błąd')." ".$validate->errors('msg')),'/customer/users');
            	}
          
        	}
    	}else{
    		Message::error(ucfirst(__('Wystąpił błąd')." - nie podałeś id uzytkownika"),'/customer/users');
    	}
    }    
    
    public function action_user_add(){
    		
    		$customer=Auth::instance()->get_user()->customer;
    		$divisions = $customer->divisions->find_all();
    		
    		$this->content->bind('customer', $customer);
    		$this->content->bind('divisions', $divisions);
    		
    		if($this->request->method()===HTTP_Request::POST) {
    			$user = User::instance();
    			
    			$user->user->values($_POST);
    			
    			$validate = new Validation($_POST);
    			
    			$validate->rule('firstname', 'not_empty')
    			->rule('lastname', 'not_empty')
    			->rule('username', 'not_empty')
    			->rule('password', 'not_empty')
    			->rule('email', 'not_empty');
    			
    			if($validate->check() && $user->registerUser($_POST)){
    				Message::success(ucfirst(__('Dodano użytkownika')),'/customer/users');
    			}else{
    				Message::error(ucfirst(__('Wystąpił błąd')." ".$validate->errors()),'/customer/users');
    			}
    		}
    }
    
    
    public function action_user_lock() {
    
    	if($this->request->param('id') > 0) {
    		$user = User::instance($this->request->param('id'));
    		$customer_id = $user->customer->id;
    			
    		if($user->lockUser()) {
    			Message::success(ucfirst(__('Użytkownik został zablokowany')),'/customer/users/');
    		}else {
    			Message::error(ucfirst(__('Nie udało się zablokować użytkownika')),'/customer/users/');
    		}
    	}else {
    		Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/customer/users');
    	}
    }
    
    public function action_user_unlock() {
    
    	if($this->request->param('id') > 0) {
    		$user = User::instance($this->request->param('id'));
    		$customer_id = $user->customer->id;
    			
    		if($user->unlockUser()) {
    			Message::success(ucfirst(__('Użytkownik został odblokowany')),'/customer/users/');
    		}else {
    			Message::error(ucfirst(__('Nie udało się oblokować użytkownika')),'/customer/users/');
    		}
    	}else {
    		Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/customer/users');
    	}
    }
    
    
    public function after(){     
        parent::after();
    }	
	
	
	public function action_search() {
		
		
	}
	
	public function action_divisions() {
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('user', $user);
	}
	
	public function action_division_add() {
		$customer=Auth::instance()->get_user()->customer;
		$division = Division::instance();			
		$this->content->bind('customer', $customer);
				
		if($this->request->method()===HTTP_Request::POST) {

			$params = $_POST;
			$params['customer_id'] = $customer->id;
			
			if($division->addDivision($params)) {
				Message::success(ucfirst(__('Dział został utworzony')),'/customer/divisions/');
			}else {
				Message::error(ucfirst(__('Dział nie został utworzony')),'/customer/divisions/');
			}
			
		}
	}
	
	public function action_division_edit() {
		if($this->request->param('id') > 0) {
			$division = Division::instance($this->request->param('id'));
			$user = Auth_ORM::instance()->get_user();
			$customer_id = $user->customer->id;
			$this->content->bind('user', $user);
			$this->content->bind('customer', $user->customer);
			$this->content->bind('division', $division);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
				$params['customer_id'] = $customer_id;
				
				if($division->updateDivision($params)) {
					Message::success(ucfirst(__('Dział został zaktualizowany')),'/customer/divisions/');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować działu')),'/customer/divisions/');
				}
			}
		}
	}
	
	public function action_info() {
		$user = Auth_ORM::instance()->get_user();
	
		$this->content->bind('user', $user);
		$this->content->bind('customer', $user->customer);
		
		$dc=$user->divisions->count_all();
		$wc=$user->customer->warehouses->count_all();
		$bc=$user->customer->warehouses->boxes->count_all();
		$xc=$user->customer->warehouses->boxes->documents->count_all();
		$vc=$user->divisions->virtualbriefcases->count_all();
		
		$this->content->bind('divisions_count',$dc);
		$this->content->bind('warehouses_count',$wc);
		$this->content->bind('boxes_count',$bc);
		$this->content->bind('documents_count',$xc);
		$this->content->bind('virtualbriefcases_count',$vc);
		
		
	}
	
	
	public  function action_edit() {
		$user = Auth_ORM::instance()->get_user();
		$customer = Customer::instance($user->customer->id);
		
		$delivery_addresses = $customer->delivery_addresses;
		$pickup_addresses = $customer->pickup_addresses;		
		
		$this->content->bind('user', $user);
		$this->content->bind('customer', $customer);
		$this->content->bind('delivery_addresses', $delivery_addresses);
		$this->content->bind('pickup_addresses', $pickup_addresses);
		

		
	}
	
	public function action_add_address() {
		if($this->request->method()===HTTP_Request::POST) {
			$user = Auth_ORM::instance()->get_user();
			$customer = Customer::instance($user->customer->id);
			
			var_dump($_POST);
			
			if($_POST['address_type'] == 'dostawy') {			
				if($customer->addDeliveryAddress($_POST)) {
					
					Message::success(ucfirst(__('Adres został dodany')),'/customer/edit/');
				}else {
					
					Message::error(ucfirst(__('Nie udało się dodać adresu')),'/customer/edit/');
				}
			}elseif($_POST['address_type']=='odbioru') {
				if($customer->addPickupAddress($_POST)) {
					
					Message::success(ucfirst(__('Adres został dodany')),'/customer/edit/');
				}else {
					
					Message::error(ucfirst(__('Nie udało się dodać adresu')),'/customer/edit/');
				}
			}
		}
	}
}
