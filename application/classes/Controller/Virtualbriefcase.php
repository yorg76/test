<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Virtualbriefcase extends Controller_Welcome {
	
public $controller_title = 'Wirtualne teczki';
		public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
		
		if(strtolower ( $this->request->action()) == 'virtualbriefcases') $this->add_init("TableVirtualBriefcases.init();\t\n");
		if(strtolower ( $this->request->action()) == 'virtualbriefcase_add') $this->add_init("VirtualBriefcase_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'virtualbriefcase_edit') $this->add_init("VirtualBriefcase_edit.init();\t\n");
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
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-virtualbriefcases.js');
		
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
	
	public function action_virtualbriefcases() {
		
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$virtualbriefcases = $customer->divisions->virtualbriefcases->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('user', $user);
	}
	
	public function action_boxes() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$boxes = $customer->warehouses->boxes->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
				
	}
	
	public function action_documents() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$documents = $customer->warehouses->boxes->documents->find_all();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('documents', $documents);
	}
	
	public function action_documentlists() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$documentlists = $customer->warehouses->boxes->documentlists->find_all();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('documentlists', $documentlists);
	}
	
	public function action_bulkpackagings() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$bulkpackagings = $customer->warehouses->boxes->bulkpackagings->find_all();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('bulkpackagings', $bulkpackagings);
	}
	
	
	
	public function action_virtualbriefcase_add() {
		$customer=Auth::instance()->get_user()->customer;
		$virtualbriefcase = VirtualBriefcase::instance();
		$divisions = $customer->divisions->find_all();

		$this->content->bind('divisions', $divisions);
		
	if($this->request->method()===HTTP_Request::POST) {
			
			$params = $_POST;
			//$params['division_id'] = $division->id;
			//$virtualbriefcase=VirtualBriefcase::instance();
			if($virtualbriefcase->addVirtualBriefcase($params)) {
				Message::success(ucfirst(__('Wirtualna teczka została dodana do działu')),'/virtualbriefcase/virtualbriefcases');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać wirtualnej teczki do działu')),'/virtualbriefcase/virtualbriefcases');
			}		
		}
	}
	
	public function action_virtualbriefcase_edit() {
		
		if($this->request->param('id') > 0) {
			$division = Division::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer_id = $user->customer->id;
			$division_id = $user->customer->division->id;
			$this->content->bind('user', $user);
			$this->content->bind('customer', $user->customer);
			$this->content->bind('division', $division);
				
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
				$params['division_id'] = $division_id;
	
				if($warehouse->updateBox($params)) {
					Message::success(ucfirst(__('Wirtualna teczka została zaktualizowana')),'/virtualbriefcase/virtualbriefcases');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować wirtualnej teczki')),'/virtualbriefcase/virtualbriefcases');
				}
			}
		}
	}
	
	public function action_box_add() {
		$customer=Auth::instance()->get_user()->customer;
		$virtualbriefcases = $customer->divisions->find_all();

		$this->content->bind('warehouses', $warehouses);
		
	if($this->request->method()===HTTP_Request::POST) {
			$params = $_POST;
			$box=Box::instance();
			if($box->addBox($params)) {
				Message::success(ucfirst(__('Pozycja została dodana do magazynu')),'/warehouse/boxes');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać pozycji do magazynu')),'/warehouse/boxes');
			}		
		}
	}
	
	public function action_box_edit() {
		if($this->request->param('id') > 0) {
			$warehouse = Warehouse::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer_id = $user->customer->id;
			$warehouse_id = $user->customer->warehouse->id;
			$this->content->bind('user', $user);
			$this->content->bind('customer', $user->customer);
			$this->content->bind('warehouse', $warehouse);
				
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
				$params['warehouse_id'] = $warehouse_id;
	
				if($warehouse->updateBox($params)) {
					Message::success(ucfirst(__('Pozycja została zaktualizowana')),'/warehouse/boxes/');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować pozycji')),'/warehouse/boxes/');
				}
			}
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
}