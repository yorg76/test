<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Admin extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		
		array_push($this->_bread, ucfirst($this->request->action ()));
		
		$this->template->message = Message::factory();
		
		if($this->request->param('id') > 0) {
			$this->add_init("var id='".$this->request->param('id')."';\t\n");
		}
		
		if($this->request->param('id') > 0) {
			$this->add_init("TableCustomerUsers.id='".$this->request->param('id')."';\t\n");
			$this->add_init("TableUsers.id='".$this->request->param('id')."';\t\n");
		}
		
		if(strtolower ( $this->request->action()) == 'customers') $this->add_init("TableCustomers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'customer_users') $this->add_init("TableCustomerUsers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'users') $this->add_init("TableUsers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'customer_add_user') $this->add_init("PasswordGenerator.init();\t\nAdd_user.init();\t\n");
		if(strtolower ( $this->request->action()) == 'user_add') $this->add_init("PasswordGenerator.init();\t\nUser_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'user_edit') $this->add_init("PasswordGenerator.init();\t\nUser_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'customer_edit') $this->add_init("PasswordGenerator.init();\t\nCustomer_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'customer_add') $this->add_init("PasswordGenerator.init();\t\nCustomer_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'storagecategories') $this->add_init("TableStorageCategories.init();\t\n");
		if(strtolower ( $this->request->action()) == 'storagecategory_add') $this->add_init("StorageCategory_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'storagecategory_edit') $this->add_init("StorageCategory_edit.init();\t\n");
		
		
		$this->add_init("UIAlertDialogApi.init();\t\n");

	}
	
	protected function load_content() {
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'select2/select2.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/css/datepicker.css');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/additional-methods.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'select2/select2.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/media/js/jquery.dataTables.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->add_fjs ( ASSETS_GLOBAL_SCRIPTS.'datatable.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootbox/bootbox.min.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ui-alert-dialog-api.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-customers.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-users.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-storagecategories.js');
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'custom.js');
		
		
		if(strtolower ( $this->request->action()) == 'customer_add_user') $this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'add_user.js');
			
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
	public function action_index() {
		
	}
		
	public function action_users() {
		
		$users = ORM::factory("User")->find_all();
		
		$this->content->bind('users', $users);
		
	}
	
	public function action_customers() {
		
		$customers = ORM::factory("Customer")->find_all();
		
		$this->content->bind('customers', $customers);
		
	}
	
	public function action_customer_add_user() {
		
		if($this->request->param('id') > 0) {
			$customer = Customer::instance($this->request->param('id'));
			$this->content->bind('customer', $customer);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params = $this->request->post();
				$params['customer_id'] = $customer->id;
				
				$user=User::instance();
				if($user->registerUser($params)) {
					Message::success(ucfirst(__('Użytkownik firmy został dodany')),'/admin/customers');
				}else {
					Message::error(ucfirst(__('Nie udało się dodać użytkownika')),'/admin/customers');
				}
				
	
					
			}
			
		}else {
			Message::error(ucfirst(__('Nie podałeś id klienta')),'/admin/customers');
		}
	}
		
	public function action_customer_delete() {
		if($this->request->param('id') > 0) {
			if(Customer::instance($this->request->param('id'))->deleteCompany()) {
				Message::success(ucfirst(__('Klient został usunięty')),'/admin/customers');
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć klienta')),'/admin/customers');
			}
		}else {
			Message::error(ucfirst(__('Nie podałeś id klienta')),'/admin/customers');
		}
	}
	
	public function action_customer_edit() {
		
		if($this->request->param('id') > 0) {
			
			$customer = Customer::instance($this->request->param('id'));
			
			if($this->request->method()===HTTP_Request::POST) {
				
				$params = $this->request->post();
				
				if($customer->updateCompany($params)) {
					Message::success(ucfirst(__('Firma została zaktualizowana')),'/admin/customers');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować firmy')),'/admin/customers');
				}
			}
			
			$this->content->bind('customer', $customer);
			
		}else {
			Message::error(ucfirst(__('Nie podałeś id klienta')),'/admin/customers');
		}
	}
	
	public function action_customer_add() {
	
		
		$customer = Customer::instance();
			
		if($this->request->method()===HTTP_Request::POST) {

			$params = $this->request->post();

			if($customer->addCompany($params)) {
				Message::success(ucfirst(__('Firma została dodana')),'/admin/customers');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać firmy')),'/admin/customers');
			}
		}
			
		$this->content->bind('customer', $customer);
				
	}
	
	public function action_customer_users() {
		
		if($this->request->param('id') > 0) {
			
			$users = ORM::factory("Customer")->where('id','=',$this->request->param('id'))->find()->users->find_all();	
			
			$this->content->bind('users', $users);
			
		}else {
			Message::error(ucfirst(__('Nie podałeś id klienta')),'/admin/customers');
		}
		
	}
	
	public function action_user_add() {
		
		$customers = ORM::factory("Customer")->find_all();
		
		$this->content->bind('customers', $customers);			
		
		if($this->request->method()===HTTP_Request::POST) {
			$params = $this->request->post();
			$user=User::instance();
			if($user->registerUser($params)) {
				Message::success(ucfirst(__('Użytkownik firmy został dodany')),'/admin/users');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać użytkownika')),'/admin/users');
			}		
		}
	}
	
	public function action_user_edit() {
		$customers = ORM::factory("Customer")->find_all();
		$this->content->bind('customers', $customers);

		
		if($this->request->param('id') > 0) {
			$user = ORM::factory('User',$this->request->param('id'));
			$roles = ORM::factory('Role')->find_all(); 
			
			$this->content->bind('user', $user);
			$this->content->bind('roles', $roles);
			
			if($this->request->method()===HTTP_Request::POST) {
				
				
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
					Message::success(ucfirst(__('Dane użytkownika zostały zaktualizowane')),'/admin/users');
				}else{
					Message::error(ucfirst(__('Wystąpił błąd')." ".$validate->errors('msg')),'/admin/users');
				}
			
			}
		}else {
			Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/admin/customers/'.$customer_id);
		}
	}
	
	public function action_user_delete() {
		if($this->request->param('id') > 0) {
			$user = User::instance($this->request->param('id'));
			$customer_id = $user->customer->id;
			
			
			if($user->deleteUser()) {
				Message::success(ucfirst(__('Użytkownik został usunięty')),'/admin/customer_users/'.$customer_id);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć użytkownika')),'/admin/customer_users/'.$customer_id);
			}
		}
	}	
	
	public function action_user_lock() {
		
		if($this->request->param('id') > 0) {
			$user = User::instance($this->request->param('id'));
			$customer_id = $user->customer->id;
			
			if($user->lockUser()) {
				Message::success(ucfirst(__('Użytkownik został zablokowany')),'/admin/customer_users/'.$customer_id);
			}else {
				Message::error(ucfirst(__('Nie udało się zablokować użytkownika')),'/admin/customer_users/'.$customer_id);
			}
		}else {
			Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/admin/customer_users');
		}
	}

	public function action_user_unlock() {
	
		if($this->request->param('id') > 0) {
			$user = User::instance($this->request->param('id'));
			$customer_id = $user->customer->id;
			
			if($user->unlockUser()) {
				Message::success(ucfirst(__('Użytkownik został odblokowany')),'/admin/customer_users/'.$customer_id);
			}else {
				Message::error(ucfirst(__('Nie udało się oblokować użytkownika')),'/admin/customer_users/'.$customer_id);
			}
		}else {
			Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/admin/customer_users');
		}
	}
	
	public function action_storagecategories() {
		$storagecategories = ORM::factory("StorageCategory")->find_all();
		$this->content->bind('storagecategories', $storagecategories);
	}
	
	public function action_storagecategory_add() {
		$storagecategory = StorageCategory::instance();
			
		if($this->request->method()===HTTP_Request::POST) {
	
			$params = $_POST;
				
			if($storagecategory->addStorageCategory($params)) {
				Message::success(ucfirst(__('Kategoria magazynowania została utworzona')),'/admin/storagecategories/');
			}else {
				Message::error(ucfirst(__('Kategoria magazynowania nie została utworzona')),'/admin/storagecategories/');
			}
				
		}
	}
	
	public function action_storagecategory_edit() {
	
		if($this->request->param('id') > 0) {
			$storagecategory = StorageCategory::instance($this->request->param('id'));
			$this->content->bind('storagecategory', $storagecategory);
				
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
	
				if($storagecategory->updateStorageCategory($params)) {
					Message::success(ucfirst(__('Kategoria magazynowania została zaktualizowana')),'/admin/storagecategories/');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować kategorii magazynowania')),'/admin/storagecategories/');
				}
			}
		}
	}
	
	public function action_storagecategory_delete() {
		if($this->request->param('id') > 0) {
			$storagecategory = StorageCategory::instance($this->request->param('id'));
			$storagecategory_id = $storagecategory->id;
			$name = $storagecategory->name;
	
			if($storagecategory->deleteStorageCategory()) {
				Message::success(ucfirst(__('Kategoria magazynowania została usunięty')),'/admin/storagecategories/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć kategorii magazynowania')),'/admin/storagecategories/'.$name);
			}
		}
	}
}
	
