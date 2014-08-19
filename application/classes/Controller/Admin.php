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
		
		if(strtolower ( $this->request->action()) == 'customers') $this->add_init("TableCustomers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'customer_users') $this->add_init("TableCustomerUsers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'users') $this->add_init("TableUsers.init();\t\n");
		
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
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootbox/bootbox.min.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ui-alert-dialog-api.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-customers.js');


		
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
		
		$users = array(
				array(
						'id' =>'1',
						'login'=>'test',
						'imie' => 'Test',
						'nazwisko' =>'Testowy',
						'email' =>'test@testowy.pl',
						'firma' => 'Cipa cipa'
				),
				array(
						'id' =>'2',
						'login'=>'testcik',
						'imie' => 'Testcik',
						'nazwisko' =>'Testowiutki',
						'email' =>'test123@testowy.pl',
						'firma' => 'Dupa dupa'
				),
		
				array(
						'id' =>'3',
						'login'=>'teststas',
						'imie' => 'Testas',
						'nazwisko' =>'Testikus',
						'email' =>'testikus12@testowy.pl',
						'firma' => 'Huje muje'
				),
		);
		
		$this->content->bind('users', $users);
		
	}
	
	public function action_customers() {
		
		$customers = array(
			array(
			'id' =>'1',
			'nazwa'=>'Test 1',
			'nip' =>'123456789',
			'regon' =>'0987654321'
			),
			array(
			'id' =>'2',
			'nazwa'=>'Test 2',
			'nip' =>'123456789',
			'regon' =>'0987654321'
			),
				
			array(
			'id' =>'3',
			'nazwa'=>'Test 3',
			'nip' =>'123456789',
			'regon' =>'0987654321'
			),
				
		);
		
		$this->content->bind('customers', $customers);
		
	}
	
	public function action_customer_delete() {
		if($this->request->param('id') > 0) {
			//TODO kasowanie klienta
			if(1) {
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
			//TODO edycja i zapisywanie klienta
			
			$customer = Customer::instance($this->request->param('id'));
			
			$this->content->bind('customer', $customer);
			
		}else {
			Message::error(ucfirst(__('Nie podałeś id klienta')),'/admin/customers');
		}
	}
	
	public function action_customer_users() {
		
		if($this->request->param('id') > 0) {
			
			$users = array(
					array(
							'id' =>'1',
							'login'=>'test',
							'imie' => 'Test',
							'nazwisko' =>'Testowy',
							'email' =>'test@testowy.pl'
					),
					array(
							'id' =>'2',
							'login'=>'testcik',
							'imie' => 'Testcik',
							'nazwisko' =>'Testowiutki',
							'email' =>'test123@testowy.pl'
					),
								
					array(
							'id' =>'3',
							'login'=>'teststas',
							'imie' => 'Testas',
							'nazwisko' =>'Testikus',
							'email' =>'testikus12@testowy.pl'
					),
			);
			
			$this->content->bind('users', $users);
		}else {
			Message::error(ucfirst(__('Nie podałeś id klienta')),'/admin/customers');
		}
		
	}
	
	public function action_user_edit() {
		
		$customer_id = 1;
		
		if($this->request->param('id') > 0) {
				// TODO user edit
		}else {
			Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/admin/customers/'.$customer_id);
		}
	}
	
	public function action_user_delete() {
		if($this->request->param('id') > 0) {
			//TODO kasowanie usera
			$customer_id = 1;
			if(1) {
				Message::success(ucfirst(__('Użytkownik został usunięty')),'/admin/customer_users/'.$customer_id);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć użytkownika')),'/admin/customer_users/'.$customer_id);
			}
		}else {
			Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/admin/customer_users/'.$customer_id);
		}
	}	
	
	public function action_user_lock() {
		
		if($this->request->param('id') > 0) {
			//TODO blokowanie usera
			$customer_id = 1;
			
			if(1) {
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
			//TODO odblokowanie usera
			$customer_id = 1;
				
			if(1) {
				Message::success(ucfirst(__('Użytkownik został zablokowany')),'/admin/customer_users/'.$customer_id);
			}else {
				Message::error(ucfirst(__('Nie udało się zablokować użytkownika')),'/admin/customer_users/'.$customer_id);
			}
		}else {
			Message::error(ucfirst(__('Nie podałeś id użytkownika')),'/admin/customer_users');
		}
	}
}
	
