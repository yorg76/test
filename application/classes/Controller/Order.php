<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Order extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
	
		if(strtolower ( $this->request->action()) == 'add')  {
				$this->add_init("OrderWizard.init();\t\n");
				$this->add_init("ComponentsPickers.init();\t\n");
		}
		
		if(strtolower ( $this->request->action()) == 'orders_new') $this->add_init("TableOrdersNew.init();\t\n");
		if(strtolower ( $this->request->action()) == 'orders_inprogress') $this->add_init("TableOrdersInprogress.init();\t\n");
		if(strtolower ( $this->request->action()) == 'orders_realized') $this->add_init("TableOrdersRealized.init();\t\n");
		if(strtolower ( $this->request->action()) == 'orders') $this->add_init("TableOrders.init();\t\n");
		if(strtolower ( $this->request->action()) == 'send') $this->add_init("SendOrder.init();\t\n");
		if(strtolower ( $this->request->action()) == 'edit_order') $this->add_init("Edit_order.init();\t\n");
		if(strtolower ( $this->request->action()) == 'recept') $this->add_init("ReceptOrder.init();\t\n");
		
		$this->add_init("UIAlertDialogApi.init();\t\n");
		
	}
	
	protected function load_content() {
		
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'select2/select2.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/css/datepicker.css');
		
		if(strtolower ( $this->request->action()) == 'orders_search') {
			$this->add_css ( ASSETS_ADMIN_PAGES_CSS.'search.css');
		}
		
		if(strtolower ( $this->request->action()) == 'add' || $this->request->action() == 'edit_order') {
			$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-modal/css/bootstrap-modal-bs3patch.css');
			$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-modal/css/bootstrap-modal.css');
		}
		
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
		
		if(strtolower ( $this->request->action()) == 'add' ) {
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-wizard/jquery.bootstrap.wizard.min.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-modal/js/bootstrap-modalmanager.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-modal/js/bootstrap-modal.js');
		
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'base64.js');
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'order-wizard.js');
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ui-extended-modals.js');
		}

		if(strtolower ( $this->request->action()) == 'edit_order' ) {
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-modal/js/bootstrap-modalmanager.js');
			$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-modal/js/bootstrap-modal.js');
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'base64.js');
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ui-extended-modals.js');
		}
		
		if(strtolower ( $this->request->action()) == 'recept') {
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'order_recept.js');
		}
		
		if(strtolower ( $this->request->action()) == 'send') {
			$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'order_send.js');
		}
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-orders.js');
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

	public function action_orders_search() {
		
		$user = Auth::instance()->get_user();
		$customer=$user->customer;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			$users = ORM::factory('User')->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}elseif(!Auth::instance()->logged_in('admin') && Auth::instance()->logged_in('operator')) {
			$users = $customer->users->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}else {
			$divisions = $user->divisions->find_all();
			$users_ids=array();
			
			foreach ($divisions as $division) {
				$users = $division->users->find_all();
			
				foreach ($users as $u) {
					array_push($users_ids, $u->id);
				}
			}
		}
		
		$users_ids=array_unique($users_ids);
		
		$orders=ORM::factory('Order')->where('user_id', 'IN', $users_ids)->find_all();
		
		//var_dump($orders);
		
		$this->content->bind('orders', $orders);
	
	}
	
	public function action_view_order() {
		if($this->request->param('id') > 0) {
			$user = Auth::instance()->get_user();
			$order=Order::instance();
			$customer=$user->customer;
			$divisions = $customer->divisions->find_all();
			$divisions_ids= array();
			$virtualbriefcases = array();
			$warehouses = $customer->warehouses->find_all();
			$warehouses_ids = array();
			$storagecategories = ORM::factory('StorageCategory')->find_all();
	
			foreach ($divisions as $division) {
				array_push($divisions_ids, $division->id);
					
			}
	
			$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
	
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
	
			$boxes = ORM::factory('Box')->where('division_id','IN',$divisions_ids)->find_all();
	
			$delivery_addresses = $customer->addresses->where('address_type','=','dostawy')->or_where('address_type','=','firmowy')->and_where('customer_id','=',$customer->id)->find_all();
			$pickup_addresses = $customer->addresses->where('address_type','=','odbioru')->or_where('address_type','=','firmowy')->and_where('customer_id','=',$customer->id)->find_all();
	
			$order = Order::instance($this->request->param('id'));
				
			$this->content->bind('order_types',$order->types);
			$this->content->bind('order_statuses',$order->statuses);
			$this->content->bind('customer', $customer);
			$this->content->bind('divisions', $divisions);
			$this->content->bind('virtualbriefcases', $virtualbriefcases);
			$this->content->bind('user', $user);
			$this->content->bind('warehouses',$warehouses);
			$this->content->bind('boxes',$boxes);
			$this->content->bind('delivery_addresses',$delivery_addresses);
			$this->content->bind('pickup_addresses',$pickup_addresses);
			$this->content->bind('storagecategories',$storagecategories);
			$this->template->content->bind('order',$order);
		}
	}
	
	public function action_edit_order() {
		if($this->request->param('id') > 0) {
			$user = Auth::instance()->get_user();
			$order=Order::instance();
			$customer=$user->customer;
			$divisions = $customer->divisions->find_all();
			$divisions_ids= array();
			$virtualbriefcases = array();
			$warehouses = $customer->warehouses->find_all();
			$warehouses_ids = array();
			$storagecategories = ORM::factory('StorageCategory')->find_all();
		
			foreach ($divisions as $division) {
				array_push($divisions_ids, $division->id);
			
			} 
				
			$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
		
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
		
			$boxes = array();
		
			$delivery_addresses = $customer->addresses->where('address_type','=','dostawy')->or_where('address_type','=','firmowy')->and_where('customer_id','=',$customer->id)->find_all();
			$pickup_addresses = $customer->addresses->where('address_type','=','odbioru')->or_where('address_type','=','firmowy')->and_where('customer_id','=',$customer->id)->find_all();
		
			$order = Order::instance($this->request->param('id'));
					
			$this->content->bind('order_types',$order->types);
			$this->content->bind('order_statuses',$order->statuses);
			$this->content->bind('customer', $customer);
			$this->content->bind('divisions', $divisions);
			$this->content->bind('virtualbriefcases', $virtualbriefcases);
			$this->content->bind('user', $user);
			$this->content->bind('warehouses',$warehouses);
			$this->content->bind('boxes',$boxes);
			$this->content->bind('delivery_addresses',$delivery_addresses);
			$this->content->bind('pickup_addresses',$pickup_addresses);
			$this->content->bind('storagecategories',$storagecategories);
			$this->template->content->bind('order',$order);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params = $_POST;
				
				if($order->updateOrder($params)) {
					Message::success(ucfirst(__('Zamówienie zostało zapisane')),'/order/orders');
				}else {
					Message::error(ucfirst(__('Wystąpił problem podczas wysyłania zamówienia')),'/order/edit_order/'.$this->request->param('id'));
				}
					
			}
		}
	}
	
	public function action_orders() {
		$user = Auth::instance()->get_user();
		$customer=$user->customer;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			$users = ORM::factory('User')->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}elseif(!Auth::instance()->logged_in('admin') && Auth::instance()->logged_in('operator')) {
			$users = $customer->users->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}else {
			$divisions = $user->divisions->find_all();
			$users_ids=array();
			
			foreach ($divisions as $division) {
				$users = $division->users->find_all();
			
				foreach ($users as $u) {
					array_push($users_ids, $u->id);
				}
			}
		}
		
		$users_ids=array_unique($users_ids);
				
		$orders=ORM::factory('Order')->where('user_id', 'IN', $users_ids)->find_all();
		
		
		$this->content->bind('orders', $orders);
	}
	
	public function action_orders_new() {
		$user = Auth::instance()->get_user();
		$customer=$user->customer;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			$users = ORM::factory('User')->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}elseif(!Auth::instance()->logged_in('admin') && Auth::instance()->logged_in('operator')) {
			$users = $customer->users->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}else {
			$divisions = $user->divisions->find_all();
			$users_ids=array();
			
			foreach ($divisions as $division) {
				$users = $division->users->find_all();
			
				foreach ($users as $u) {
					array_push($users_ids, $u->id);
				}
			}
		}
		
		$users_ids=array_unique($users_ids);
		
		$orders=ORM::factory('Order')->where('user_id', 'IN', $users_ids)->and_where('status', '=', 'Nowe')->order_by('id','DESC')->find_all();
		
		//var_dump($orders);
		
		$this->content->bind('orders', $orders);
	}
	
	public function action_orders_inprogress() {
		$user = Auth::instance()->get_user();
		$customer=$user->customer;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			$users = ORM::factory('User')->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}elseif(!Auth::instance()->logged_in('admin') && Auth::instance()->logged_in('operator')) {
			$users = $customer->users->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}else {
			$divisions = $user->divisions->find_all();
			$users_ids=array();
			
			foreach ($divisions as $division) {
				$users = $division->users->find_all();
			
				foreach ($users as $u) {
					array_push($users_ids, $u->id);
				}
			}
		}
		
		$users_ids=array_unique($users_ids);
		
		$orders=ORM::factory('Order')->where('user_id', 'IN', $users_ids)->and_where('status', '!=', 'Nowe')->and_where('status', '!=', 'Dostarczone')->and_where('status', '!=', 'Zrealizowane')->find_all();		
		//var_dump($orders);
		
		$this->content->bind('orders', $orders);
	}
	
	public function action_orders_realized() {
		$user = Auth::instance()->get_user();
		$customer=$user->customer;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			$users = ORM::factory('User')->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}elseif(!Auth::instance()->logged_in('admin') && Auth::instance()->logged_in('operator')) {
			$users = $customer->users->find_all();
			$users_ids=array();
		
			foreach ($users as $u) {
				array_push($users_ids, $u->id);
			}
		}else {
			$divisions = $user->divisions->find_all();
			$users_ids=array();
			
			foreach ($divisions as $division) {
				$users = $division->users->find_all();
			
				foreach ($users as $u) {
					array_push($users_ids, $u->id);
				}
			}
		}
		
		$users_ids=array_unique($users_ids);
		
		$orders=ORM::factory('Order')->where('user_id', 'IN', $users_ids)->and_where('status', '=', 'Dostarczone')->or_where('status', '=', 'Zrealizowane')->find_all();		
		//var_dump($orders);
		
		$this->content->bind('orders', $orders);
	}
	
	public function action_accept() {
		if($this->request->param('id') > 0) {
			$order = Order::instance($this->request->param('id'));
			if($order->status=="Nowe") {
				if($order->acceptOrder()) {
					Message::success(ucfirst(__('Zamówienie zostało zaakceptowane')),'/order/orders_inprogress');
				}else {
					Message::error(ucfirst(__('Wystąpił problem podczas akceptacji zamówienia')),'/order/orders_inprogress');
				}
			}else {
				Message::error(ucfirst(__('Zamówienia w tym statusie nie można zaakceptować')),'/order/orders_inprogress');
			}
		}	
	}


	public function action_recept() {
		if($this->request->param('id') > 0) {
			$order = Order::instance($this->request->param('id'));
		
			if($order->status=="Oczekuje na wysłanie") {
				if($this->request->method()===HTTP_Request::POST) {
					
					if($order->receptOrder()) {
						Message::success(ucfirst(__('Zamówienie zostało przyjęte na magazyn')),'/order/orders_inprogress');
					}else {
						Message::error(ucfirst(__('Wystąpił problem podczas przyjęcia zamówienia')),'/order/orders_inprogress');
					}
				}
			}else {
				Message::error(ucfirst(__('Zamówienia w tym statusie nie można przyjąć')),'/order/orders_inprogress');
			}
		}
	}
	
	public function action_complete() {
		if($this->request->param('id') > 0) {
			$order = Order::instance($this->request->param('id'));
			if($order->status=="Przyjęte do realizacji") {
				if($order->completeOrder()) {
					Message::success(ucfirst(__('Zamówienie zostało skompletowane')),'/order/orders_inprogress');
				}else {
					Message::error(ucfirst(__('Wystąpił problem podczas kompletowania zamówienia')),'/order/orders_inprogress');
				}
			}else {
				Message::error(ucfirst(__('Zamówienia w tym statusie nie można skompletować')),'/order/orders_inprogress');
			}
		}
	}
	
	
	public function action_send() {
		if($this->request->param('id') > 0) {
			$order = Order::instance($this->request->param('id'));
			$shipmentcompanies = Auth_ORM::instance()->get_user()->customer->shipmentcompanies->find_all();
			
			$this->content->bind('order', $order);
			$this->content->bind('shipmentcompanies', $shipmentcompanies);
			
			if($this->request->method()===HTTP_Request::POST) {
				$params = $_POST;
				if($order->sendOrder($params)) {
					Message::success(ucfirst(__('Zamówienie zostało przygotowane do wysłania')),'/order/orders_inprogress');
				}else {
					Message::error(ucfirst(__('Wystąpił problem podczas wysyłania zamówienia')),'/order/orders_inprogress');
				}
					
			}
		}
	}
	
	public function action_deliver() {
		if($this->request->param('id') > 0) {
			$order = Order::instance($this->request->param('id'));
								
			if($order->deliverOrder($params)) {
				Message::success(ucfirst(__('Zamówienie zostało przygotowane do wysłania')),'/order/orders_realized');
			}else {
				Message::error(ucfirst(__('Wystąpił problem podczas wysyłania zamówienia')),'/order/orders_realized');
			}
		}
	}
	
	public function action_delete() {
		if($this->request->param('id') > 0) {
			
			$order = Order::instance($this->request->param('id'));
			
			if($order->status=="Nowe") {
				if($order->deleteOrder()) {
					Message::success(ucfirst(__('Zamówienie zostało usunięte')),'/order/orders');
				}else {
					Message::error(ucfirst(__('Wystąpił problem podczas usuwania zamówienia')),'/order/orders');
				}
			}else {
				Message::error(ucfirst(__('Zamówienia w tym statusie nie można usunąć')),'/order/orders');
			}
		}
	}
	
	public function action_add() {
		$user = Auth::instance()->get_user();
		$order=Order::instance();
		$customer=$user->customer;
		$divisions = $customer->divisions->find_all();
		$divisions_ids= array();
		$virtualbriefcases = array();
		$warehouses = $customer->warehouses->find_all();
		$warehouses_ids = array();
		$storagecategories = ORM::factory('StorageCategory')->find_all();
		
		foreach ($divisions as $division) {
			array_push($divisions_ids, $division->id);
			
		} 
				
		$virtualbriefcases = ORM::factory('VirtualBriefcase')->where('division_id','IN',$divisions_ids)->find_all();
		
		foreach ($warehouses as $warehouse) {
			array_push($warehouses_ids, $warehouse->id);
		}
		
		$boxes = ORM::factory('Box')->where('division_id','IN',$divisions_ids)->and_where('lock', '=', 0)->find_all();
		
		$delivery_addresses = $customer->addresses->where('address_type','=','dostawy')->or_where('address_type','=','firmowy')->and_where('customer_id','=',$customer->id)->find_all();
		$pickup_addresses = $customer->addresses->where('address_type','=','odbioru')->or_where('address_type','=','firmowy')->and_where('customer_id','=',$customer->id)->find_all();
		
		$pricetable = $customer->pricetables->where('active','=',1)->find();
		
		$this->content->bind('order_types',$order->types);
		$this->content->bind('order_statuses',$order->statuses);
		$this->content->bind('customer', $customer);
		$this->content->bind('divisions', $divisions);
		$this->content->bind('virtualbriefcases', $virtualbriefcases);
		$this->content->bind('user', $user);
		$this->content->bind('warehouses',$warehouses);
		$this->content->bind('boxes',$boxes);
		$this->content->bind('delivery_addresses',$delivery_addresses);
		$this->content->bind('pickup_addresses',$pickup_addresses);
		$this->content->bind('storagecategories',$storagecategories);
		$this->content->bind('pricetable',$pricetable);
		
		if($this->request->method()===HTTP_Request::POST) {
			$params = $_POST;
			
			$params['customer_id'] = $customer->id;
			
			$params['warehouse'] =$params['warehouse_'.$params['order_type']]; 
			$params['division'] =$params['division_'.$params['order_type']];
			$params['boxes'] = $params['boxes_'.$params['order_type']];
			$params['documents'] = $params['contents_'.$params['order_type']];
		
			if($order->registerOrder($params)) {
				Message::success(ucfirst(__('Zamówienie zostało utworzone')),'/order/orders_new');
			}else {
				Message::error(ucfirst(__('Wystąpił problem podczas dodawania zamówienia')),'/order/orders_new');
			}
			
		}
	}
	
	public function action_order_document() {
		
		if($this->request->param('id') > 0) {
			$user = Auth::instance()->get_user();
			$customer=$user->customer;
			$address=$user->customer->addresses->where('address_type','=','firmowy')->find();
			$order = Order::instance($this->request->param('id'));
				
			
			$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$_POST['warehouse']."-".$_POST['division'].".pdf";
			
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
			
			$document_template = View_MPDF::factory('order/order_document');

			$document_template->bind_global('customer', $customer);
			$document_template->bind_global('address', $address);
			$document_template->bind_global('user', $user);
			
			$document_template->bind_global('order',$order);
			
			$document_template->get_mpdf()->SetDisplayMode('fullpage');
			$document_template->get_mpdf()->WriteHTML($document_css,1);
			$document_template->download($document_filename);
		}
	}
	
	public function action_utilisation_document() {
	
		if($this->request->param('id') > 0) {
			$user = Auth::instance()->get_user();
			$customer=$user->customer;
			$address=$user->customer->addresses->where('address_type','=','firmowy')->find();
			$order = Order::instance($this->request->param('id'));
	
				
			$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$_POST['warehouse']."-".$_POST['division'].".pdf";
				
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
				
			$document_template = View_MPDF::factory('order/utilisation_document');
	
			$document_template->bind_global('customer', $customer);
			$document_template->bind_global('address', $address);
			$document_template->bind_global('user', $user);
				
			$document_template->bind_global('order',$order);
				
			$document_template->get_mpdf()->SetDisplayMode('fullpage');
			$document_template->get_mpdf()->WriteHTML($document_css,1);
			$document_template->download($document_filename);
		}
	}
}

