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
		
		if(strtolower ( $this->request->action()) == 'warehouses') $this->add_init("TableWarehouses.init();\t\n");
		if(strtolower ( $this->request->action()) == 'warehouse_add') $this->add_init("Warehouse_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'warehouse_edit') $this->add_init("Warehouse_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'boxes') $this->add_init("TableBoxes.init();\t\n");
		if(strtolower ( $this->request->action()) == 'box_add') $this->add_init("Box_add.init();\t\nComponentsPickers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'box_edit') $this->add_init("Box_edit.init();\t\nComponentsPickers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'documents') $this->add_init("TableDocuments.init();\t\n");
		if(strtolower ( $this->request->action()) == 'document_add') $this->add_init("Document_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'document_edit') $this->add_init("Document_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'documentlists') $this->add_init("TableDocumentLists.init();\t\n");
		if(strtolower ( $this->request->action()) == 'documentlist_add') $this->add_init("DocumentList_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'documentlist_edit') $this->add_init("DocumentList_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'bulkpackagings') $this->add_init("TableBulkPackagings.init();\t\n");
		if(strtolower ( $this->request->action()) == 'bulkpackaging_add') $this->add_init("BulkPackaging_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'bulkpackaging_edit') $this->add_init("BulkPackaging_edit.init();\t\n");
		
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
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'components-pickers.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-warehouses.js');
		
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
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();
		
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('storagecategories', $storagecategories);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
				
	}
	
	public function action_documents() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$warehouses_ids= array();
		$boxes_ids = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		
		foreach ($boxes as $box) {
			array_push($boxes_ids, $box->id);
		}
		$documents = ORM::factory('Document')->where('box_id','IN', $boxes_ids)->find_all();
		
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('documents', $documents);
	}
	
	public function action_documentlists() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$warehouses_ids= array();
		$boxes_ids = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		
		foreach ($boxes as $box) {
			array_push($boxes_ids, $box->id);
		}
		$documentlists = ORM::factory('DocumentList')->where('box_id','IN', $boxes_ids)->find_all();
		
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('documentlists', $documentlists);
	}
	
	public function action_bulkpackagings() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$warehouses_ids= array();
		$boxes_ids = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		
		foreach ($boxes as $box) {
			array_push($boxes_ids, $box->id);
		}
		$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','IN', $boxes_ids)->find_all();
		
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('bulkpackagings', $bulkpackagings);
	}
	
	
	
	public function action_warehouse_add() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouse = Warehouse::instance();			
		$this->content->bind('customer', $customer);
				
		if($this->request->method()===HTTP_Request::POST) {

			$params = $_POST;
			$params['customer_id'] = $customer->id;
			
			if($warehouse->addWarehouse($params)) {
				Message::success(ucfirst(__('Magazyn został utworzony')),'/warehouse/warehouses/');
			}else {
				Message::error(ucfirst(__('Magazyn nie został utworzony')),'/warehouse/warehouses/');
			}
			
		}
	}
	
	public function action_warehouse_edit() {
		
		if($this->request->param('id') > 0) {
			//$warehouse = ORM::factory('warehouse')->where('id','=',$this->request->param('id'))->find();
			$warehouse = Warehouse::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer_id = $user->customer->id;
			$this->content->bind('user', $user);
			$this->content->bind('customer', $user->customer);
			$this->content->bind('warehouse', $warehouse);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
				$params['customer_id'] = $customer_id;
			
				if($warehouse->updateWarehouse($params)) {
					Message::success(ucfirst(__('Magazyn został zaktualizowany')),'/warehouse/warehouses/');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować magazynu')),'/warehouse/warehouses/');
				}
			}
		}
	}
	
	public function action_box_add() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();
		$this->content->bind('storagecategories', $storagecategories);

		$this->content->bind('warehouses', $warehouses);
		
	if($this->request->method()===HTTP_Request::POST) {
			$params = $_POST;
			//$params = $this->request->post();
			$box=Box::instance();
	
			if($box->addBox($params)) {
				Message::success(ucfirst(__('Pozycja została dodana do magazynu')),'/warehouse/boxes');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać pozycji do magazynu')),'/warehouse/boxes');
			}		
		}
	}
	
	public function action_box_edit() {
	$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$storagecategories = ORM::factory('StorageCategory')->find_all();
		$this->content->bind('storagecategories', $storagecategories);
		$this->content->bind('customers', $customers);
		$this->content->bind('warehouses', $warehouses);

		
		if($this->request->param('id') > 0) {
			$box = ORM::factory('Box',$this->request->param('id'));
			$this->content->bind('box', $box);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params = $_POST;
							 
				if($box->updateBox($params)) {
					Message::success(ucfirst(__('Dane pozycji zostaĹ‚y zaktualizowane')),'/admin/users');
				}else{
					Message::error(ucfirst(__('Nie udaĹ‚o siÄ™ zaktualizowaÄ‡ pozycji')." ".$validate->errors('msg')),'/admin/users');
				}
			
			}
		}else {
			Message::error(ucfirst(__('Nie podaĹ‚eĹ› id uĹĽytkownika')));
		}
	}
	
	public function action_warehouse_delete() {
		if($this->request->param('id') > 0) {
			$warehouse = Warehouse::instance($this->request->param('id'));
			$warehouse_id = $warehouse->id;
			$name = $warehouse->name;
								
			if($warehouse->deleteWarehouse()) {
				Message::success(ucfirst(__('Magazyn został usunięty')),'/warehouse/warehouses/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć magazynu')),'/warehouse/warehouses/'.$name);
			}
		}
	}
	
	public function action_box_delete() {
		
	}
	
	public function action_document_add() {
		
	}
	
	public function action_document_edit() {
	
	}
	
	public function action_document_delete() {
	
	}
	
	public function action_documentlist_add() {
	
	}
	
	public function action_documentlist_edit() {
	
	}
	
	public function action_documentlist_delete() {
	
	}
	
	public function action_bulkpackaging_add() {
	
	}
	
	public function action_bulkpackaging_edit() {
	
	}
	
	public function action_bulkpackaging_delete() {
	
	}
	
	public function action_item_add() {
		
	
	}
	
}