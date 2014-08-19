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
		$this->add_init("TableEditable.init();\n\t");
		
		if(strtolower ( $this->request->action()) == 'add_user') $this->add_init("Add_user.init();");
		if(strtolower ( $this->request->action()) == 'edit_user') $this->add_init("Edit_user.init();");

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
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-editable.js');


		
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
			'id' =>'1',
			'nazwa'=>'Test 2',
			'nip' =>'123456789',
			'regon' =>'0987654321'
			),
				
			array(
			'id' =>'1',
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
}
	
