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
		$divisions_ids= array();
		$virtualbriefcases = array();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
			
		} 
				
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();

		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('user', $user);
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
				Message::success(ucfirst(__('Wirtualna teczka zostaĹ‚a dodana do dziaĹ‚u')),'/virtualbriefcase/virtualbriefcases');
			}else {
				Message::error(ucfirst(__('Nie udaĹ‚o siÄ™ dodaÄ‡ wirtualnej teczki do dziaĹ‚u')),'/virtualbriefcase/virtualbriefcases');
			}
		}
	}
	
	public function action_virtualbriefcase_edit() {
	
		if($this->request->param('id') > 0) {
			$virtualbriefcase = VirtualBriefcase::instance($this->request->param('id'));
			$user = Auth::instance()->get_user();
			$customer=Auth::instance()->get_user()->customer;
			$customer_id = $user->customer->id;
			$division_id = $virtualbriefcase->division->id;
			$divisions = $customer->divisions->find_all();
			$this->content->bind('divisions', $divisions);
			$this->content->bind('user', $user);
			$this->content->bind('customer', $user->customer);
			$this->content->bind('virtualbriefcase', $virtualbriefcase);
	
			if($this->request->method()===HTTP_Request::POST) {
				$params=$_POST;
				$params['division_id'] = $division_id;
	
				if($virtualbriefcase->updateVirtualBriefcase($params)) {
					Message::success(ucfirst(__('Wirtualna teczka zostaĹ‚a zaktualizowana')),'/virtualbriefcase/virtualbriefcases');
				}else {
					Message::error(ucfirst(__('Nie udaĹ‚o siÄ™ zaktualizowaÄ‡ wirtualnej teczki')),'/virtualbriefcase/virtualbriefcases');
				}
			}
		}
	}
	
	public function action_virtualbriefcase_delete() {
		if($this->request->param('id') > 0) {
			$virtualbriefcase = VirtualBriefcase::instance($this->request->param('id'));
			$virtualbriefcase_id = $virtualbriefcase->id;
			$name = $virtualbriefcase->name;
	
			if($virtualbriefcase->deleteVirtualBriefcase()) {
				Message::success(ucfirst(__('Wirtualna teczka została usunięta')),'/virtualbriefcase/virtualbriefcases/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć wirtualnej teczki')),'/virtualbriefcase/virtualbriefcases/'.$name);
			}
		}
	}
	
	
	public function action_documents() {
		
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases_ids = array();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
			
		} 
		
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
		
		foreach ($virtualbriefcases as $virtualbriefcase) {
			array_push($virtualbriefcases_ids, $virtualbriefcase->id);
		}
		
		$documents = ORM::factory('Document')->join('virtualbriefcases_documents')->on('document.id', '=','virtualbriefcases_documents.document_id')->where('virtualbriefcases_documents.virtualbriefcase_id','IN',$virtualbriefcases_ids)->find_all();
		
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('documents', $documents);
		$this->content->bind('user', $user);
		
	}
	
	public function action_documentlists() {
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases_ids = array();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
			
		} 
		
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
		
		foreach ($virtualbriefcases as $virtualbriefcase) {
			array_push($virtualbriefcases_ids, $virtualbriefcase->id);
		}
		$documentlists = ORM::factory('DocumentList')->join('virtualbriefcases_documentlists')->on('documentlist.id', '=','virtualbriefcases_documentlists.documentlist_id')->where('virtualbriefcases_documentlists.virtualbriefcase_id','IN',$virtualbriefcases_ids)->find_all();
		
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('documentlists', $documentlists);
		$this->content->bind('user', $user);
	}
	
	public function action_bulkpackagings() {
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases_ids = array();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
			
		} 
		
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
		
		foreach ($virtualbriefcases as $virtualbriefcase) {
			array_push($virtualbriefcases_ids, $virtualbriefcase->id);
		}
		$bulkpackagings = ORM::factory('BulkPackaging')->join('virtualbriefcases_bulkpackagings')->on('bulkpackaging.id', '=','virtualbriefcases_bulkpackagings.bulkpackaging_id')->where('virtualbriefcases_bulkpackagings.virtualbriefcase_id','IN',$virtualbriefcases_ids)->find_all();
		
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('bulkpackagings', $bulkpackagings);
		$this->content->bind('user', $user);
	}
	
	public function action_nested_virtualbriefcases() {
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases_ids = array();
	
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
				
		}
	
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
	
		foreach ($virtualbriefcases as $virtualbriefcase) {
			array_push($virtualbriefcases_ids, $virtualbriefcase->id);
		}
		$child_virtualbriefcases = ORM::factory('VirtualBriefcase')->join('virtualbriefcases_virtualbriefcases')->on('virtualbriefcase.id', '=','virtualbriefcases_virtualbriefcases.virtualbriefcase2_id')->where('virtualbriefcases_virtualbriefcases.virtualbriefcase2_id','IN',$virtualbriefcases_ids)->find_all();
		$parent_virtualbriefcases = ORM::factory('VirtualBriefcase')->join('virtualbriefcases_virtualbriefcases')->on('virtualbriefcase.id', '=','virtualbriefcases_virtualbriefcases.virtualbriefcase1_id')->where('virtualbriefcases_virtualbriefcases.virtualbriefcase1_id','IN',$virtualbriefcases_ids)->find_all();
		
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('child_virtualbriefcases', $child_virtualbriefcases);
		$this->content->bind('parent_virtualbriefcases', $parent_virtualbriefcases);
		$this->content->bind('bulkpackagings', $bulkpackagings);
		$this->content->bind('user', $user);
	}
	
	public function action_document_add() {
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases_ids = array();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
			
		} 
				
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();

		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('user', $user);
		
		if($this->request->method()===HTTP_Request::POST) {
				
			$params = $_POST;
			
			$document=Document::instance();
			if($document->addDocument($params)) {
				Message::success(ucfirst(__('Dokument został dodany do wirtualnej teczki')),'/virtualbriefcase/documentlists');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać dokumentu do do wirtualnej teczki')),'/virtualbriefcase/documentlists');
			}
		}
	}
	
	public function action_document_edit() {
	
	}
	
	public function action_document_delete() {
		if($this->request->param('id') > 0) {
			$document = Document::instance($this->request->param('id'));
			$document_id = $document->id;
			$name = $document->name;
		
			if($document->deleteDocument()) {
				Message::success(ucfirst(__('Dokument został usunięty')),'/virtualbriefcase/documents/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć dokumentu')),'/virtualbriefcase/documents/'.$name);
			}
		}
	}
	
	public function action_documentlist_add() {
		$customer=Auth::instance()->get_user()->customer;
		$warehouses = $customer->warehouses->find_all();
		$this->content->bind('customer', $customer);
		$warehouses_ids= array();
		$boxes = array();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->find_all();
		$user = Auth::instance()->get_user();
		//$this->content->bind('customer', $customer);
		$this->content->bind('warehouses', $warehouses);
		$this->content->bind('user', $user);
		$this->content->bind('boxes', $boxes);
		
		if($this->request->method()===HTTP_Request::POST) {
		
			$params = $_POST;
				
			$documentlist=DocumentList::instance();
			if($document->addDocumentList($params)) {
				Message::success(ucfirst(__('Lista dokumentów została dodany do Pozycji')),'/warehouses/documentlists');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać listy dokumentów do pozycji')),'/warehouses/documentlists');
			}
		}
	}
	
	public function action_documentlist_edit() {
	
	}
	
	public function action_documentlist_delete() {
		if($this->request->param('id') > 0) {
			$documentlist = DocumentList::instance($this->request->param('id'));
			$documentlist_id = $documentlist->id;
			$name = $documentlist->name;
		
			if($documentlist->deleteDocumentList()) {
				Message::success(ucfirst(__('Lista dokumentów została usunięta')),'/warehouse/documentlists/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć Listy dokumentów')),'/warehouse/documentlists/'.$name);
			}
		}
	}
	
	public function action_bulkpackaging_add() {
		$customer=Auth::instance()->get_user()->customer;
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
		
			$bulkpackaging=BulkPackaging::instance();
			
			if($document->addBulkPackaging($params)) {
				Message::success(ucfirst(__('Opakowanie zbiorcze zostało dodane do Pozycji')),'/warehouses/bulkpackagings');
			}else {
				Message::error(ucfirst(__('Nie udało się dodać opakowania zbiorczego do pozycji')),'/warehouses/bulkpackagings');
			}
		}
	}
	
	public function action_bulkpackaging_edit() {
	
	}
	
	public function action_bulkpackaging_delete() {
		if($this->request->param('id') > 0) {
			$bulkpackaging = BulkPackaging::instance($this->request->param('id'));
			$bulkpackaging_id = $bulkpackaging->id;
			$name = $bulkpackaging->name;
		
			if($bulkpackaging->deleteBulkPackaging()) {
				Message::success(ucfirst(__('Opakowanie zbiorcze zostało usunięte')),'/warehouse/bulkpackagings/'.$name);
			}else {
				Message::error(ucfirst(__('Nie udało się usunąć Opakowania zbiorczego')),'/warehouse/bulkpackagings/'.$name);
			}
		}
	}
	
	public function action_virtualbriefcase_view() {
		$customer=Auth::instance()->get_user()->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases_ids = array();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
		
		}
		
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
		
		foreach ($virtualbriefcases as $virtualbriefcase) {
			array_push($virtualbriefcases_ids, $virtualbriefcase->id);
		}
		
		$documents = ORM::factory('Document')->join('virtualbriefcases_documents')->on('virtualbriefcase.id', '=','virtualbriefcases_documents.virtualbriefcase_id')->where('virtualbriefcases_documents.virtualbriefcase_id','IN',$virtualbriefcases_ids)->find_all();
		$documentlists = ORM::factory('DocumentList')->join('virtualbriefcases_documentlists')->on('virtualbriefcase.id', '=','virtualbriefcases_documentlists.virtualbriefcase_id')->where('virtualbriefcases_documentlists.virtualbriefcase_id','IN',$virtualbriefcases_ids)->find_all();
		$bulkpackagings = ORM::factory('Bulkpackaging')->join('virtualbriefcases_bulkpackagings')->on('virtualbriefcase.id', '=','virtualbriefcases_bulkpackagings.virtualbriefcase_id')->where('virtualbriefcases_bulkpackagings.virtualbriefcase_id','IN',$virtualbriefcases_ids)->find_all();
		
		
		$user = Auth::instance()->get_user();
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('documents', $documents);
		$this->content->bind('documentlists', $documentlists);
		$this->content->bind('bulkpackagings', $bulkpackagings);
		
	}
}
