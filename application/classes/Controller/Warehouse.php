<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Warehouse extends Controller_Welcome {
		public $controller_title = 'Magazyny';
		public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
		
		if(strtolower ( $this->request->action()) == 'warehouse_add') $this->add_init("PasswordGenerator.init();\t\nAdd_warehouse.init();\t\n");
		if(strtolower ( $this->request->action()) == 'warehouse_edit') $this->add_init("PasswordGenerator.init();\t\nEdit_warehouse.init();\t\n");
		
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
		
	public function action_index() {
		
	}
	
	public function action_warehouses() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
	}
	
	public function action_boxes() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$box = $warehouses->box->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('box', $box);
		$this->content->bind('user', $user);
	}
	
	public function action_documents() {
	
	}
	
	public function action_documentlists() {
			
	}
	
	public function action_bulkpackagings() {
	
	}
	
	
	
	public function action_warehouse_add() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouse = Warehouse::instance();			
		$this->content->bind('customer', $customer);
				
		if($this->request->method()===HTTP_Request::POST) {

			$params = $_POST;
			$params['customer_id'] = $customer->id;
			
			if($warehouse->addWarehouse($params)) {
				Message::success(ucfirst(__('Magazyn zosta³ utworzony')),'/warehouse/warehouses/');
			}else {
				Message::error(ucfirst(__('Magazyn nie zosta³ utworzony')),'/warehouse/warehouses/');
			}
			
		}
	}
	
	public function action_warehouse_edit() {

		
		
		if($this->request->param('id') > 0) {
			
			$warehouse = ORM::factory('Warehouse')->where('id','=',$this->request->param('id'))->find();
        	
        	$this->content->bind('warehouse', $warehouse);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params = $this->request->post();
				//$params=$_POST;
				//$params['customer_id'] = $customer_id;
				
				if($warehouse->updateWarehouse($params)) {
					Message::success(ucfirst(__('Magazyn zosta³ zaktualizowany')),'/warehouse/warehouses/');
				}else {
					Message::error(ucfirst(__('Nie uda³o siê zaktualizowaæ magazynu')),'/warehouse/warehouses/');
				}
			}
		}
	}
	
	public function action_box_add() {
	
	}
	
	public function action_document_add() {
	
	}
	
	public function action_documentlist_add() {
			
	}
	
	public function action_bulkpackaging_add() {
	
	}
	
}