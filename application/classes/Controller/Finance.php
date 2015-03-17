<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Finance extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
			
		if(strtolower ( $this->request->action()) == 'prices') $this->add_init("TablePrices.init();\t\n");
		if(strtolower ( $this->request->action()) == 'pricetable_add') $this->add_init("PriceTable_add.init();\t\n");
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
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-prices.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'components-pickers.js');
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
	
	public function action_invoice_add() {
		
		$customers = ORM::factory('Customer')->find_all();
		$this->content->bind('customers', $customers);
		
		$id =  $this->request->param('id');
		
		if($this->request->param('id') > 0) {
			$customer = Customer::instance($id);
			$invoice = $customer->generateMonthlyInvoice();
			
			$customer_divisions= $customer->customer->divisions->find_all();
			$divisions_ids = array();
			$sum = 0;
				
			foreach ($customer_divisions as $div ) {
				array_push($divisions_ids, $div->id);
			}
				
				
				
			if(count($divisions_ids) > 0) {
				$boxes_in_wh=ORM::factory('Box')->where('division_id','IN',$divisions_ids)->and_where('status','=','Na magazynie')->and_where('utilisation_status', '=', 0)->count_all();
			
			}else {
				$boxes_in_wh=0;
			}
			
			if($customer->customer->loaded()) {
				
							
				$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
				$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
				$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
				$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
				$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
				$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
				$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
				$this->template = View_MPDF::factory('templates/monthly_invoice_template');
				$this->template->get_mpdf()->SetDisplayMode('fullpage');
				$this->template->get_mpdf()->WriteHTML($document_css,1);
				
				$html = FALSE;
				
				$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$customer->customer->id."-".$invoice->id.".pdf";
				
				$this->template->bind_global('html', $html);
				$this->template->bind_global('invoice', $invoice);
				$this->template->bind_global('box_quantity', $boxes_in_wh);
				$this->template->bind_global('customer', $customer);

				$this->template->download($document_filename);
				
				Message::success(ucfirst(__('Faktura została utworzona')),'/finance/invoice_add');
				
			}else {
				Message::error(ucfirst(__('Faktura nie została utworzona')),'/finance/invoice_add');
			}
		}
	}
	
	public function action_pricetable_add() {
		
		$customers = ORM::factory('Customer')->find_all();
		
		$this->content->bind('customers', $customers);
		
		if($this->request->method()===HTTP_Request::POST) {
			
			
			$pricetable = Pricetable::instance();
			
			$params = $_POST;

			$pricetable->pricetable->values($params);
			
			if($pricetable->addPricetable($params)) {
				Message::success(ucfirst(__('Cennik został utworzony')),'/finance/prices');
			}else {
				Message::error(ucfirst(__('Cennik nie został utworzony')),'/finance/prices');
			}
				
		}
	}
	
	public function action_prices() {
		
		$pricetables = ORM::factory('Pricetable')->find_all();
		
		$this->content->bind('pricetables', $pricetables);
	}
		
	public function action_invoices() {
		$customer = Auth_ORM::instance()->get_user()->customer;
		$invoices = ORM::factory('Invoice')->where('customer_id', '=', $customer->id)->find_all();
		
		$this->content->bind('invoices', $invoices);	 
	}
	
	public function action_print_invoice() {
		
			
		if($this->request->param('id') > 0) {
			$order=Order::instance($this->request->param('id'));
			$customer = Auth_ORM::instance()->get_user()->customer;
			$invoice = ORM::factory('Invoice');
			
			$this->template=View::factory('templates/invoice_template');
			$html = TRUE;
			$this->template->bind('html', $html);
			$this->template->bind('order', $order);
			$this->template->bind('invoice', $invoice);
				
		}
	}
	
}
