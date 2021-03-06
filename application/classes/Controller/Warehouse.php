
<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

/* Celem updateu u Mańka ;-) */
 
class Controller_Warehouse extends Controller_Welcome {
		
		public $controller_title = 'Magazyny';
		public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
		
		if(strtolower ( $this->request->action()) == 'warehouses') $this->add_init("TableWarehouses.init();\t\n");
		if(strtolower ( $this->request->action()) == 'places') $this->add_init("TablePlaces.init();\t\n");
		if(strtolower ( $this->request->action()) == 'warehouse_add') $this->add_init("Warehouse_add.init();\t\n");
		if(strtolower ( $this->request->action()) == 'warehouse_edit') $this->add_init("Warehouse_edit.init();\t\n");
		if(strtolower ( $this->request->action()) == 'boxes') $this->add_init("TableBoxes.init();\t\n");
		if(strtolower ( $this->request->action()) == 'box_add') $this->add_init("Box_add.init();\t\nComponentsPickers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'boxes_search') $this->add_init("Boxes_search.init();\t\nComponentsPickers.init();\t\n");
		if(strtolower ( $this->request->action()) == 'add_item') $this->add_init("Add_item.init();\t\nComponentsPickers.init();\t\n");
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
		if(strtolower ( $this->request->action()) == 'childbulkpackaging_remove') $this->add_init("Remove_item_vb.init();\t\n");
		if(strtolower ( $this->request->action()) == 'add_item_bp') $this->add_init("Add_item_bp.init();\t\n");
		if(strtolower ( $this->request->action()) == 'box_barcode_print') $this->add_init("//deployQZ();\t\n");
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
		
		if(strtolower ( $this->request->action()) == 'box_barcode_print') {
			$this->add_fjs ( ASSETS_QZPRINT .'js/deployJava.js');
			$this->add_fjs ( ASSETS_QZPRINT .'js/jquery.plugin.html2canvas.js');
			$this->add_fjs ( ASSETS_QZPRINT .'js/html2canvas.js');
		}
		
		if(strtolower ( $this->request->action()) == 'childbulkpackaging_remove') $this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'remove_item_vb.js');
		
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
	
	public function action_box_barcode_print() {
		
		if($this->request->method()===HTTP_Request::POST) {
			$this->template = View::factory('templates/barcodes');
			
			$ids=array();
			
			for($f=0; $f < $_POST['count'];$f++) {
				$box=Box::instance();
				$box->createBox();
				array_push($ids, $box->id);
			
			}
			
			$boxes= ORM::factory('Box')->where('id', 'IN', $ids)->find_all();
		
			$this->template->bind('boxes', $boxes);
		}else {
			
		}
	}
	
	public function action_places() {
		$customer=Auth::instance()->get_user()->customer;
		if(Auth::instance()->logged_in('admin')) $places = ORM::factory('Place')->find_all();
		else $places = array();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('places', $places);
		$this->content->bind('user', $user);
	}

	public function action_place_add() {
	
		$place = ORM::factory('Place');
		
		if($this->request->method()===HTTP_Request::POST) {
	
			$params = $_POST;
			//$params['customer_id'] = $customer->id;
				
			if($place->values($params) && $place->save()) {
				Message::success(ucfirst(__('Regał został utworzony')),'/warehouse/places');
			}else {
				Message::error(ucfirst(__('Regał nie został utworzony')),'/warehouse/places');
			}
				
		}
	}
	
	public function action_place_edit() {
		
		if($this->request->param('id') > 0) {
			
			
			$place= ORM::factory('Place',$this->request->param('id'));
			
			$user = Auth::instance()->get_user();
			$this->content->bind('user', $user);
			$this->content->bind('place', $place);
				
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
					
				if($place->values($params) && $place->update()) {
					Message::success(ucfirst(__('Magazyn został zaktualizowany')),'/warehouse/places');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować magazynu')),'/warehouse/places');
				}
			}
		}
	}
	
	public function action_place_view() {
		if($this->request->param('id') > 0) {
			$place = ORM::factory('Place',$this->request->param('id'));
			
			$this->content->bind('place', $place);
				
			$boxes = $place->boxes->find_all();
			
			$this->content->bind('boxes', $boxes);
		}
	
	}
	
	public function action_warehouses() {
		$customer=Auth::instance()->get_user()->customer;
		if(Auth::instance()->logged_in('admin')) $warehouses = ORM::factory('Warehouse')->find_all(); 
		else $warehouses = $customer->warehouses->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
	}
	
	public function action_boxes() {
		
		$customer=Auth::instance()->get_user()->customer;
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$boxes = array();
			$boxes = ORM::factory('Box')->find_all();
		}
		elseif(Auth::instance()->logged_in('manager')){
			$warehouses = $customer->warehouses->find_all();
			$warehouses_ids= array();
			$boxes = array();
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		}
		elseif(Auth::instance()->logged_in('login')) {
			$user = Auth::instance()->get_user();
			$divisions = $user->divisions->find_all();
			$divisions_ids= array();
			$boxes = array();
			foreach ($divisions as $division) {
				array_push($divisions_ids, $division->id);
					
			}
			$boxes = ORM::factory('Box')->where('division_id','IN', $divisions_ids)->find_all();
		}
				
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('storagecategories', $storagecategories);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('divisions', $divisions);
				
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
		$customers=ORM::factory('Customer')->find_all();
		$warehouse = Warehouse::instance();			
		$this->content->bind('customer', $customer);
		$this->content->bind('customers', $customers);
				
		if($this->request->method()===HTTP_Request::POST) {

			$params = $_POST;
			//$params['customer_id'] = $customer->id;
			
			if($warehouse->addWarehouse($params)) {
				Message::success(ucfirst(__('Magazyn został utworzony')),'/warehouse/warehouses');
			}else {
				Message::error(ucfirst(__('Magazyn nie został utworzony')),'/warehouse/warehouses');
			}
			
		}
	}
	
	public function action_warehouse_edit() {
		$customers=ORM::factory('Customer')->find_all();
		$this->content->bind('customers', $customers);
		
		if($this->request->param('id') > 0) {
			$warehouse = Warehouse::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$this->content->bind('user', $user);
			$this->content->bind('customer', $user->customer);
			$this->content->bind('warehouse', $warehouse);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
			
				if($warehouse->updateWarehouse($params)) {
					Message::success(ucfirst(__('Magazyn został zaktualizowany')),'/warehouse/warehouses');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować magazynu')),'/warehouse/warehouses');
				}
			}
		}
	}
	
	public function action_box_add() {
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$storagecategory = ORM::factory('StorageCategory');
		$boxbarcode = ORM::factory('BoxBarcode');
		$storagecategories = $storagecategory->find_all();
		$this->content->bind('storagecategories', $storagecategories);
		$this->content->bind('boxbarcode', $boxbarcode);
		$this->content->bind('warehouses', $warehouses);
		
		if($this->request->method()===HTTP_Request::POST) {
			$params = $_POST;
			//$params = $this->request->post();
			$box=Box::instance();
			
			if($box->addBox($params)) {
				Message::success(ucfirst(__('Pudło zostało dodana do magazynu')),'/warehouse/boxes');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać pudła do magazynu')),'/warehouse/boxes');
			}		
		}
	}
	
	public function action_box_edit() {
		$storagecategories = ORM::factory('StorageCategory')->find_all();
		$this->content->bind('storagecategories', $storagecategories);
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$divisions = $customer->divisions->find_all();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('divisions', $divisions);
		
		if($this->request->param('id') > 0) {
			
			$box = ORM::factory('Box',$this->request->param('id'));
			$this->content->bind('box', $box);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params = $_POST;

				$params['date_from']=date('Y-m-d',strtotime(str_replace('/','-',$_POST['date_from'])));
				$params['date_to'] =date('Y-m-d',strtotime(str_replace('/','-',$_POST['date_to'])));
				$params['date_reception'] =date('Y-m-d',strtotime(str_replace('/','-',$_POST['date_reception'])));
							
				//$box->values($_POST);
				$box=Box::instance($this->request->param('id'));
				
					if($box->updateBox($params)) {
						Message::success(ucfirst(__('Dane pudła zostały zaktualizowane')),'/warehouse/boxes');
					}else{
					Message::error(ucfirst(__('Nie udało się zaktualizować informacji o pudle')." ".$validate->errors('msg')),'/warehouse/boxes');
				}
			}
		}else {
		Message::error(ucfirst(__('Nie podałeś id użytkownika')));
		}
	}
	
	public function action_warehouse_delete() {
		if($this->request->param('id') > 0) {
			$warehouse = Warehouse::instance($this->request->param('id'));
			$warehouse_id = $warehouse->id;
			$name = $warehouse->name;
								
			if($warehouse->deleteWarehouse()) {
				Message::success(ucfirst(__('Magazyn został usunięty.')),'/warehouse/warehouses/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć magazynu.')),'/warehouse/warehouses/'.$name);
			}
		}
	}
	
	public function action_box_delete() {
		if($this->request->param('id') > 0) {
			$box = Box::instance($this->request->param('id'));
			$box_id = $box->id;
					
			if($box->deleteBox()) {
				Message::success(ucfirst(__('Pudło zostało usunięta.')),'/warehouse/boxes');
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć pudła.')),'/warehouse/boxes');
			}
		}
	}
	
	public function action_document_add() {
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		
		$warehouses_ids= array();
		$boxes = array();
		$boxes_ids = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		
		foreach ($boxes as $box) {
			array_push($boxes_ids, $box->id);
		}
		$documentlists = ORM::factory('DocumentList')->where('box_id','IN', $boxes_ids)->find_all();
		$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','IN', $boxes_ids)->find_all();
		
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		$this->content->bind('documentlists', $documentlists);
		$this->content->bind('bulkpackagings', $bulkpackagings);
		
		if($this->request->param('id') > 0) {
			$box_id =$this->request->param('id'); 
			$this->content->bind('box_id', $box_id);
		}
		
		if($this->request->method()===HTTP_Request::POST) {
				
			$params = $_POST;
			
			$document = Document::instance();
			
			if(isset($_FILES['plik']['size']) && $_FILES['plik']['size'] > 0) {
				$filename = isset($_FILES["plik"]) ? $_FILES["plik"] : '';
			
				$path_parts = pathinfo($_FILES["plik"]["name"]);
				$extension = $path_parts['extension'];
			
				if ( ! Upload::valid($filename) OR ! Upload::not_empty($filename) OR ! Upload::type($filename, array('pdf', 'tif', 'tiff', 'png','jpg','jpeg'))) {
					Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
				}
			
				if ($file = Upload::save($filename, "scan-".$customer->id."-".$document->id."-".time().".".$extension, UPLOAD)) {
					$params['file'] = $file;
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
				}
			}
			
			if($document->addDocument($params)) {
				Message::success(ucfirst(__('Dokument został dodany do pudła.')),'/warehouse/documents');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać dokumentu do pudła.')),'/warehouse/documents');
			}
		}
	}
	
	public function action_document_edit() {
		if($this->request->param('id') > 0) {
			
			$document = Document::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer = $user->customer;
			$warehouses = $customer->warehouses->find_all();
			
			$warehouses_ids= array();
			$boxes = array();
			
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
			
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
			$boxes_ids = array();
			
			foreach ($boxes as $box) {
				array_push($boxes_ids, $box->id);
			}
			$documentlists = ORM::factory('DocumentList')->where('box_id','IN', $boxes_ids)->find_all();
			$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','IN', $boxes_ids)->find_all();
			
			$this->content->bind('customer', $customer);
			$this->content->bind('warehouses', $warehouses);
			$this->content->bind('user', $user);
			$this->content->bind('boxes', $boxes);
			$this->content->bind('document', $document);
			$this->content->bind('documentlists', $documentlists);
			$this->content->bind('bulkpackagings', $bulkpackagings);
			
			if($this->request->method()===HTTP_Request::POST) {
			
				$params = $_POST;
				
				if(isset($_FILES['plik']['size']) && $_FILES['plik']['size'] > 0) { 			
					$filename = isset($_FILES["plik"]) ? $_FILES["plik"] : '';
				
					$path_parts = pathinfo($_FILES["plik"]["name"]);
					$extension = $path_parts['extension'];
				
					if ( ! Upload::valid($filename) OR ! Upload::not_empty($filename) OR ! Upload::type($filename, array('pdf', 'tif', 'tiff', 'png','jpg','jpeg'))) {
						Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
					}
				
					if ($file = Upload::save($filename, "scan-".$customer->id."-".$document->id."-".time().".".$extension, UPLOAD)) {
						$params['file'] = $file;	
					}else {
						Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
					}
				}
				
				if($document->editDocument($params)) {
					
					Message::success(ucfirst(__('Dokument został zaktualizowany.')),'/warehouse/documents');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
				}
			}
		}
	}
	
	public function action_document_view() {
		if($this->request->param('id') > 0) {
				
			$document = Document::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer = $user->customer;
			$warehouses = $customer->warehouses->find_all();
				
			$warehouses_ids= array();
			$boxes = array();
				
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
				
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
			$boxes_ids = array();
				
			foreach ($boxes as $box) {
				array_push($boxes_ids, $box->id);
			}
			$documentlists = ORM::factory('DocumentList')->where('box_id','IN', $boxes_ids)->find_all();
			$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','IN', $boxes_ids)->find_all();
				
			$this->content->bind('customer', $customer);
			$this->content->bind('warehouses', $warehouses);
			$this->content->bind('user', $user);
			$this->content->bind('boxes', $boxes);
			$this->content->bind('document', $document);
			$this->content->bind('documentlists', $documentlists);
			$this->content->bind('bulkpackagings', $bulkpackagings);
				
			if($this->request->method()===HTTP_Request::POST) {
					
				$params = $_POST;
	
				if(isset($_FILES['plik']['size']) && $_FILES['plik']['size'] > 0) {
					$filename = isset($_FILES["plik"]) ? $_FILES["plik"] : '';
	
					$path_parts = pathinfo($_FILES["plik"]["name"]);
					$extension = $path_parts['extension'];
	
					if ( ! Upload::valid($filename) OR ! Upload::not_empty($filename) OR ! Upload::type($filename, array('pdf', 'tif', 'tiff', 'png','jpg','jpeg'))) {
						Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
					}
	
					if ($file = Upload::save($filename, "scan-".$customer->id."-".$document->id."-".time().".".$extension, UPLOAD)) {
						$params['file'] = $file;
					}else {
						Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
					}
				}
	
				if($document->editDocument($params)) {
						
					Message::success(ucfirst(__('Dokument został zaktualizowany.')),'/warehouse/documents');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documents');
				}
			}
		}
	}
		
	
	public function action_document_delete() {
		if($this->request->param('id') > 0) {
			$document = Document::instance($this->request->param('id'));
			$document_id = $document->id;
			$name = $document->name;
		
			if($document->deleteDocument()) {
				Message::success(ucfirst(__('Dokument został usunięty.')),'/warehouse/documents');
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć dokumentu.')),'/warehouse/documents');
			}
		}
	}
	
	public function action_documentlist_add() {
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		
		
		if($this->request->param('id') > 0) {
			$box_id =$this->request->param('id');
			$this->content->bind('box_id', $box_id);
		}
		
		if($this->request->method()===HTTP_Request::POST) {
			
			$params = $_POST;
			$documentlist = DocumentList::instance();
				
			if(isset($_FILES['attachment']['size']) && $_FILES['attachment']['size'] > 0) {
				$filename = isset($_FILES["attachment"]) ? $_FILES["attachment"] : '';
			
				$path_parts = pathinfo($_FILES["attachment"]["name"]);
				$extension = $path_parts['extension'];
			
				if ( ! Upload::valid($filename) OR ! Upload::not_empty($filename) OR ! Upload::type($filename, array('pdf', 'tif', 'tiff', 'png','jpg','jpeg'))) {
					Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documentlists');
				}
			
				if ($file = Upload::save($filename, "attachment-".$customer->id."-".$user->id."-".time().".".$extension, UPLOAD)) {
					$params['file'] = $file;
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documentlists');
				}
			}
			
			
			if($documentlist->addDocumentList($params)) {
				Message::success(ucfirst(__('Lista dokumentów została dodana do pudła.')),'/warehouse/documentlists');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać listy dokumentów do pudła.')),'/warehouse/documentlists');
			}
		}
	}
	
	public function action_documentlist_edit() {
		if($this->request->param('id') > 0) {
				
			$documentlist = DocumentList::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer = $user->customer;
			$warehouses = $customer->warehouses->find_all();
				
			$warehouses_ids= array();
			$boxes = array();
				
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
				
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
			$boxes_ids = array();
				
			foreach ($boxes as $box) {
				array_push($boxes_ids, $box->id);
			}
			$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','IN', $boxes_ids)->find_all();
			
			$this->content->bind('customer', $customer);
			$this->content->bind('warehouses', $warehouses);
			$this->content->bind('user', $user);
			$this->content->bind('boxes', $boxes);
			$this->content->bind('documentlist', $documentlist);
			$this->content->bind('bulkpackagings', $bulkpackagings);
				
			if($this->request->method()===HTTP_Request::POST) {
					
				$params = $_POST;
				
				if(isset($_FILES['attachment']['size']) && $_FILES['attachment']['size'] > 0) {
					$filename = isset($_FILES["attachment"]) ? $_FILES["attachment"] : '';
						
					$path_parts = pathinfo($_FILES["attachment"]["name"]);
					$extension = $path_parts['extension'];
						
					if ( ! Upload::valid($filename) OR ! Upload::not_empty($filename) OR ! Upload::type($filename, array('pdf', 'tif', 'tiff', 'png','jpg','jpeg'))) {
						Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documentlists');
					}
						
					if ($file = Upload::save($filename, "attachment-".$customer->id."-".$user->id."-".time().".".$extension, UPLOAD)) {
						$params['file'] = $file;
					}else {
						Message::error(ucfirst(__('Nie udało się zaktualizować dokumentu.')),'/warehouse/documentlists');
					}
				}
					
										
				if($documentlist->editDocumentList($params)) {
						
					Message::success(ucfirst(__('Lista dokumentów została zaktualizowana.')),'/warehouse/documentlists');
				}else {
					Message::error(ucfirst(__('Nie udało się dodać zaktualizować listy dokumentów.')),'/warehouse/documentlists');
				}
			}
		}
	}
	
	public function action_documentlist_delete() {
		if($this->request->param('id') > 0) {
			$documentlist = DocumentList::instance($this->request->param('id'));
			$documentlist_id = $documentlist->id;
			$name = $documentlist->name;
		
			if($documentlist->deleteDocumentList()) {
				Message::success(ucfirst(__('Lista dokumentów została usunięta.')),'/warehouse/documentlists/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć Listy dokumentów.')),'/warehouse/documentlists/'.$name);
			}
		}
	}
	
	public function action_bulkpackaging_add() {
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);

		if($this->request->param('id') > 0) {
			$box_id =$this->request->param('id');
			$this->content->bind('box_id', $box_id);
		}
				
		if($this->request->method()===HTTP_Request::POST) {
		
			$params = $_POST;
		
			$bulkpackaging = BulkPackaging::instance();
			
			if($bulkpackaging->addBulkPackaging($params)) {
				Message::success(ucfirst(__('Teczka została dodana do pudła')),'/warehouse/bulkpackagings');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać teczki do pudła')),'/warehouse/bulkpackagings');
			}
		}
	}
	
	public function action_bulkpackaging_edit() {
		if($this->request->param('id') > 0) {
			$customer = Auth::instance()->get_user()->customer;
			$warehouses = $customer->warehouses->find_all();
			$bulkpackaging = BulkPackaging::instance($this->request->param('id'));
			
			$warehouses_ids= array();
			$boxes = array();
				
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
				
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
			$boxes_ids = array();
				
			foreach ($boxes as $box) {
				array_push($boxes_ids, $box->id);
			}
			//$bulkpackagings = ORM::factory('BulkPackaging')->join('bulkpackagings_bulkpackagings')->on('bulkpackaging.id', '=','bulkpackagings_bulkpackagings.bulkpackaging1_id')->where('bulkpackagings_bulkpackagings.bulkpackaging2_id','=',$bulkpackaging2_id)->find_all();
			$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','IN', $boxes_ids)->find_all();
		
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
			$user = Auth::instance()->get_user();
			$this->content->bind('customer', $customer);
			$this->content->bind('warehouses', $warehouses);
			$this->content->bind('user', $user);
			$this->content->bind('boxes', $boxes);
			$this->content->bind('bulkpackaging', $bulkpackaging);
			$this->content->bind('bulkpackagings', $bulkpackagings);
			
				
			if($this->request->method()===HTTP_Request::POST) {
			
				$params = $_POST;
			
			
				
				if($bulkpackaging->editBulkPackaging($params)) {
					Message::success(ucfirst(__('Teczka została zaktualizowane.')),'/warehouse/bulkpackagings');
				}else {
					Message::error(ucfirst(__('Nie udało się zaktualizować teczki.')),'/warehouse/bulkpackagings');
				}
			}
		}
	}
	
	public function action_bulkpackaging_delete() {
		if($this->request->param('id') > 0) {
			$bulkpackaging = BulkPackaging::instance($this->request->param('id'));
			$bulkpackaging_id = $bulkpackaging->id;
			$name = $bulkpackaging->name;
		
			if($bulkpackaging->deleteBulkPackaging()) {
				Message::success(ucfirst(__('Teczka została usunięte.')),'/warehouse/bulkpackagings/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć teczki.')),'/warehouse/bulkpackagings/'.$name);
			}
		}
	}
	
	public function action_add_item() {
		
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();
		$this->content->bind('storagecategories', $storagecategories);
		
		$this->content->bind('warehouses', $warehouses);
		
		$customers = ORM::factory('Customer')->find_all();
		$this->content->bind('customers', $customers);
		
		if($this->request->method()===HTTP_Request::POST) {
			$params = $_POST;
			//$params = $this->request->post();
			$box=Box::instance();
		
			if($box->addBox($params)) {
				Message::success(ucfirst(__('Pudło zostało dodane do magazynu.')),'/warehouse/boxes');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać pudła do magazynu.')),'/warehouse/boxes');
			}
		}
		
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		
		if($this->request->method()===HTTP_Request::POST) {
		
			$params = $_POST;
				
			$document = Document::instance();
				
			if($document->addDocument($params)) {
				Message::success(ucfirst(__('Dokument został dodany do pudła.')),'/warehouse/documents');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać dokumentu do pudła.')),'/warehouse/documents');
			}
		}
		
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		
		if($this->request->method()===HTTP_Request::POST) {
		
			$params = $_POST;
		
			$documentlist = DocumentList::instance();
				
			if($documentlist->addDocumentList($params)) {
				Message::success(ucfirst(__('Lista dokumentów została dodana do pudła.')),'/warehouses/documentlists');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać listy dokumentów do pudła.')),'/warehouses/documentlists');
			}
		}
		
		$customer = Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		
		if($this->request->method()===HTTP_Request::POST) {
		
			$params = $_POST;
		
			$bulkpackaging = BulkPackaging::instance();
				
			if($bulkpackaging->addBulkPackaging($params)) {
				Message::success(ucfirst(__('Teczka została dodana do pudła.')),'/warehouse/bulkpackagings');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać teczki do pudła.')),'/warehouse/bulkpackagings');
			}
		}
		
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
	
		$this->content->bind('divisions', $divisions);
	
		if($this->request->method()===HTTP_Request::POST) {
				
			$params = $_POST;
			//$params['division_id'] = $division->id;
			$virtualbriefcase=VirtualBriefcase::instance();
			if($virtualbriefcase->addVirtualBriefcase($params)) {
				Message::success(ucfirst(__('Wirtualna teczka została dodana do działu.')),'/virtualbriefcase/virtualbriefcases');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać wirtualnej teczki do działu.')),'/virtualbriefcase/virtualbriefcases');
			}
		}
		
	
	}
	
	public function action_documents_search() {
		
		
	}
	
	public function action_documents_search_result() {
	
	
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
		//$documents = ORM::factory('Document')->where('box_id','IN', $boxes_ids)->find_all();
	
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('boxes', $boxes);
		
		if($this->request->method()===HTTP_Request::POST) {
	
			$params = $_POST;
			$name=$_POST['name'];
			$description=$_POST['description'];
				
			$documents = ORM::factory('Document')
				->where_open()
				->where('document.name', 'LIKE', "%$name%")
				->and_where('document.description', 'LIKE', "%$description%")
				->where_close()
				->find_all();
						
			$count = $documents->count();
			$this->content->bind('documents', $documents);
			$this->content->bind('count', $count);
				
		}
	}
	
	public function action_boxes_search() {
	
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();
		$warehouses_ids= array();
		$boxes_ids = array();
		
		//foreach ($warehouses as $warehouse) {
		//	array_push($warehouses_ids, $warehouse->id);
		//}
		
		//$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		
		//foreach ($boxes as $box) {
		//	array_push($boxes_ids, $box->id);
		//}
		//$documents = ORM::factory('Document')->where('box_id','IN', $boxes_ids)->find_all();
		
		$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('storagecategories', $storagecategories);
		//$this->content->bind('boxes', $boxes);
		//$this->content->bind('documents', $documents);
		
		
	}
		
		public function action_boxes_search_result() {
		
			$customer=Auth::instance()->get_user()->customer;
			$warehouses = $customer->warehouses->find_all();
			$storagecategory = ORM::factory('StorageCategory');
			$storagecategories = $storagecategory->find_all();
			$warehouses_ids= array();
			$boxes_ids = array();
		
			$this->content->bind('customer', $customer);
			$this->content->bind('warehouses', $warehouses);
			$this->content->bind('storagecategories', $storagecategories);
			
			if($this->request->method()===HTTP_Request::POST) {
					
				$params=$_POST;
				if($_POST['warehouse_id']) $warehouse_id = $params['warehouse_id'];
				if($_POST['date_from']) $date_from = $params['date_from'];
				if($_POST['date_to']) $date_to = $params['date_to'];
				if($_POST['date_reception']) $date_reception = $params['date_reception'];
				if($_POST['storage_category_id']) $storage_category_id = $params['storage_category_id'];
				if($_POST['description']) $description = $params['description'];
				if($_POST['barcode']) $barcode = $params['barcode'];
				
				foreach ($warehouses as $warehouse) {
					array_push($warehouses_ids, $warehouse->id);
				}
				
				$boxes = ORM::factory('Box');
				
				
				if($_POST['warehouse_id']) $boxes = $boxes->and_where('box.warehouse_id', '=', $warehouse_id);
				if($_POST['storage_category_id']) $boxes = $boxes->and_where('box.storage_category_id', '=', $storage_category_id);
				if($_POST['date_from']) $boxes = $boxes->and_where('box.date_from', '=', $date_from);
				if($_POST['date_to']) $boxes = $boxes->and_where('box.date_to', '=', $date_to);
				if($_POST['date_reception']) $boxes = $boxes->and_where('box.date_reception', '=', $date_reception);
				if($_POST['description']) $boxes = $boxes->and_where('box.description', 'LIKE', "%".$description."%");
				if($_POST['barcode']) $boxes = $boxes->and_where('box.barcode', '=', $barcode);
				
				$boxes = $boxes->limit(100)->find_all();

				$count = $boxes->count();
				$this->content->bind('boxes', $boxes);
				$this->content->bind('count', $count);
		
			}
		
		
	
	}
	
	public function action_warehouse_view() {
		if($this->request->param('id') > 0) {
			$warehouse = Warehouse::instance($this->request->param('id'));
			$warehouse_id = $warehouse->id;
			$storagecategory = ORM::factory('StorageCategory');
			$storagecategories = $storagecategory->find_all();
			$this->content->bind('warehouse', $warehouse);
			$name = $warehouse->name;
			
			$boxes = ORM::factory('Box')->where('warehouse_id','=', $warehouse_id)->find_all();
			$this->content->bind('storagecategories', $storagecategories);
			$this->content->bind('boxes', $boxes);
		}
	
	}
	
	public function action_box_view() {
		if($this->request->param('id') > 0) {
			$box = Box::instance($this->request->param('id'));
			$box_id = $box->id;
			
			$wh = ORM::factory('WarehouseHistory')->where("box_id", "=", $box_id)->find_all();
			
			$this->content->bind('wh', $wh);
			$this->content->bind('box', $box);
			
			$documents = ORM::factory('Document')->where('box_id','=', $box_id)->find_all();
			$documentlists = ORM::factory('DocumentList')->where('box_id','=', $box_id)->find_all();
			$bulkpackagings = ORM::factory('BulkPackaging')->where('box_id','=', $box_id)->find_all();
			
			$this->content->bind('storagecategories', $storagecategories);
			$this->content->bind('documents', $documents);
			$this->content->bind('documentlists', $documentlists);
			$this->content->bind('bulkpackagings', $bulkpackagings);
		}
	}
	
	public function action_documentlist_view() {
		if($this->request->param('id') > 0) {
			$documentlist = DocumentList::instance($this->request->param('id'));
			$documentlist_id = $documentlist->id;
			$this->content->bind('documentlist', $documentlist);
				
			$documents = ORM::factory('Document')->where('documentlist_id','=', $documentlist_id)->find_all();
			$this->content->bind('documents', $documents);
		}
	}
	
	public function action_bulkpackaging_view() {
		if($this->request->param('id') > 0) {
			$bulkpackaging = BulkPackaging::instance($this->request->param('id'));
			$bulkpackaging_id = $bulkpackaging->id;
			$this->content->bind('bulkpackaging', $bulkpackaging);
	
			$documents = ORM::factory('Document')->where('bulkpackaging_id','=', $bulkpackaging_id)->find_all();
			$documentlists = ORM::factory('DocumentList')->where('bulkpackaging_id','=', $bulkpackaging_id)->find_all();
			$bulkpackagings = ORM::factory('BulkPackaging')->join('bulkpackagings_bulkpackagings')->on('bulkpackaging.id', '=','bulkpackagings_bulkpackagings.bulkpackaging2_id')->where('bulkpackagings_bulkpackagings.bulkpackaging1_id','=',$bulkpackaging_id)->find_all();
			$this->content->bind('documents', $documents);
			$this->content->bind('documentlists', $documentlists);
			$this->content->bind('bulkpackagings', $bulkpackagings);
		}
	}
	
	public function action_childbulkpackaging_add() {
	
		if($this->request->method()===HTTP_Request::POST) {
	
			$params = $_POST;
			$bulkpackaging2_id = $params['bulkpackaging2_id'];
			$childbulkpackaging = BulkPackaging::instance($bulkpackaging2_id);
			$bulkpackaging1_id = $params['bulkpackaging1_id'];
			$bulkpackaging = BulkPackaging::instance($bulkpackaging1_id);
				
			if ($bulkpackaging->bulkpackaging->has('bulkpackagings', $childbulkpackaging->bulkpackaging)) {
				Message::error(ucfirst(__('Podana teczka jest już dodana do nadrzędnej teczki.')),'/warehouse/bulkpackagings');
			}elseif ($childbulkpackaging->bulkpackaging->has('bulkpackagings', $bulkpackaging->bulkpackaging)) {
				Message::error(ucfirst(__('Podana nadrzędna teczka zawiera już podaną teczkę.')),'/warehouse/bulkpackagings');
			}
	
			if($bulkpackaging->addChildBulkPackaging($params)) {
				Message::success(ucfirst(__('Teczka została dodana do teczki nadrzędnej.')),'/warehouse/bulkpackagings');
				var_dump($_POST);
			}else {
				Message::error(ucfirst(__('Nie udało się dodać teczki do teczki nadrzędnej.')),'/warehouse/bulkpackagings');
			}
		}
	
	}
	
	public function action_childbulkpackaging_remove() {
		if($this->request->param('id') > 0) {
			$childbulkpackaging = BulkPackaging::instance($this->request->param('id'));
			$bulkpackaging2_id = $childbulkpackaging->id;
				
			$bulkpackagings = ORM::factory('BulkPackaging')->join('bulkpackagings_bulkpackagings')->on('bulkpackaging.id', '=','bulkpackagings_bulkpackagings.bulkpackaging1_id')->where('bulkpackagings_bulkpackagings.bulkpackaging2_id','=',$bulkpackaging2_id)->find_all();
	
			$this->content->bind('bulkpackagings', $bulkpackagings);
			$this->content->bind('childbulkpackaging', $childbulkpackaging);
	
			if($this->request->method()===HTTP_Request::POST) {
					
				$params = $_POST;
				$bulkpackaging1_id = $params['bulkpackaging1_id'];
				$bulkpackaging = BulkPackaging::instance($bulkpackaging1_id);
				$bulkpackaging2_id = $params['bulkpackaging2_id'];
				$childbulkpackaging = BulkPackaging::instance($bulkpackaging2_id);
	
				if($bulkpackaging->removeChildBulkPackaging($params)) {
					Message::success(ucfirst(__('Teczka została usunięta. ')),'/warehouse/bulkpackagings');
				}else {
					Message::error(ucfirst(__('Nie udało się usunąć teczki.')),'/warehouse/bulkpackagings');
				}
			}
		}
	}
	
	public function action_document_add_bp() {
						
			if($this->request->method()===HTTP_Request::POST) {
					
				$params = $_POST;
				$document_id = $params['document_id'];
				$document = Document::instance($document_id);
				$bulkpackaging_id = $params['bulkpackaging_id'];
				$bulkpackaging = BulkPackaging::instance($bulkpackaging_id);
	
				if($bulkpackaging->addDocument($params)) {
					Message::success(ucfirst(__('Dokument został dodany do teczki.')),'/warehouse/bulkpackaging_view/'.$bulkpackaging_id);
				}else {
					Message::error(ucfirst(__('Nie udało się dodać dokumentu do teczki.')),'/warehouse/bulkpackaging_view/'.$bulkpackaging_id);
						
				}
			}
	}
	
	
	
	
	
	public function action_documentlist_add_bp() {

		if($this->request->method()===HTTP_Request::POST) {
					
				$params = $_POST;
				$documentlist_id = $params['documentlist_id'];
				$documentlist = DocumentList::instance($documentlist_id);
				$bulkpackaging_id = $params['bulkpackaging_id'];
				$bulkpackaging = BulkPackaging::instance($bulkpackaging_id);
	
				if($bulkpackaging->addDocumentList($params)) {
					Message::success(ucfirst(__('Lista dokumentów została dodana do teczki.')),'/warehouse/bulkpackaging_view/'.$bulkpackaging_id);
				}else {
					Message::error(ucfirst(__('Nie udało się usunąć dodać listy dokumentów z teczki.')),'/warehouse/bulkpackaging_view/'.$bulkpackaging_id);
				}
			}
		
	}
	
		
	public function action_add_item_bp() {
	
		if($this->request->param('id') > 0) {
			$bulkpackaging = BulkPackaging::instance($this->request->param('id'));
			$box_id = $bulkpackaging->box->id;
			
			
			$documents = ORM::factory('Document')->where_open()
				->where('document.box_id','=', $bulkpackaging->box->id)
				->and_where('document.bulkpackaging_id','=', NULL)
				->and_where('document.documentlist_id','=', NULL)
				->where_close()->find_all();
			
			
			$documentlists = ORM::factory('DocumentList')->where_open()
				->where('documentlist.box_id','=', $bulkpackaging->box->id)
				->and_where('documentlist.bulkpackaging_id','=', NULL)
				->where_close()->find_all();
			
			
			$childbulkpackagings = ORM::factory('BulkPackaging')->where_open()
				->where('bulkpackaging.box_id','=', $bulkpackaging->box->id)
				->and_where('bulkpackaging.id','!=', $bulkpackaging->id)
				->where_close()->find_all();
			
		
			$this->content->bind('documents', $documents);
			$this->content->bind('documentlists', $documentlists);
			$this->content->bind('childbulkpackagings', $childbulkpackagings);
			$this->content->bind('bulkpackaging', $bulkpackaging);
		
		}
	
	
	
	
	
	}
	
}
