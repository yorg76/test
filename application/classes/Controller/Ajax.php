<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Ajax extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		$this->auto_render=FALSE;
	}
	
	public function action_check_bulkpacking() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
				$bulckpackaging = ORM::factory('BulkPackaging')->where('id', '=', (int) $_POST['id'])->find();
				if($bulckpackaging->loaded()) {
					echo json_encode(array('status'=>'OK','id'=>$bulckpackaging->id));
					die;
				}else {
					echo json_encode(array('status'=>'NOTOK'));
					die;
				}
			}else {
				echo json_encode(array('status'=>'NOTOK'));
				die;
			}
		}
	}
	
	public function action_check_virtualbriefcase() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
				$virtualbriefcase = ORM::factory('VirtualBriefcase')->where('id', '=', (int) $_POST['id'])->find();
				if($virtualbriefcase->loaded()) {
					echo json_encode(array('status'=>'OK','id'=>$virtualbriefcase->id));
					die;
				}else {
					echo json_encode(array('status'=>'NOTOK'));
					die;
				}
			}else {
				echo json_encode(array('status'=>'NOTOK'));
				die;
			}
		}
	}
	
	public function action_choose_box() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			Session::instance()->set('chosen_box', $_POST['id']);
			echo json_encode(array('status'=>'OK'));
		}
	}
	
	public function action_clear_chosen_box() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			Session::instance()->delete('chosen_box');
			echo json_encode(array('status'=>'OK'));
		}
	}
	
	public function action_choose_bulkpacking() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			Session::instance()->set('chosen_bulkpacking', $_POST['id']);
			echo json_encode(array('status'=>'OK'));
		}
	}
	
	public function action_clear_chosen_bulkpacking() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			Session::instance()->delete('chosen_bulkpacking');
			echo json_encode(array('status'=>'OK'));
		}
	}
	
	public function action_choose_virtualbriefcase() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			Session::instance()->set('chosen_virtualbriefcase', $_POST['id']);
			echo json_encode(array('status'=>'OK'));
		}
	}
	
	public function action_clear_chosen_virtualbriefcase() {
		$log=Kohana_Log::instance();
	
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		if($this->request->method()===HTTP_Request::POST) {
			Session::instance()->delete('chosen_virtualbriefcase');
			echo json_encode(array('status'=>'OK'));
		}
	}
		
	
	public function action_get_boxes_file() {

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
		$spreadsheet = Spreadsheet::factory( array(
												'path'=>APPPATH."cache".DIRECTORY_SEPARATOR,
												'name'=>'pudla_'.date('Y-m-d'),
												'format'=>'CSV',
		));

		$spreadsheet->set_active_worksheet(0);
	
		$as = $spreadsheet->get_active_worksheet();
		
				
		$data = array (
				'columns' => array (UTF8::strtoupper("Kod pudła")),
				'rows'=>array(),
		);
		
		if(Auth::instance()->logged_in('admin')) {
			$boxes = ORM::factory('Box')->where('lock', '=', 0)->and_where('status','=','Na magazynie')->find_all();
		}else {
			$boxes = ORM::factory('Box')->where('division_id','IN',$divisions_ids)->and_where('status','=','Na magazynie')->and_where('lock', '=', 0)->find_all();
		}
		
	
		foreach ($boxes as $box) {
			array_push ( $data['rows'], array (sprintf('%012d',$box->barcode)));
		}
				
		//$data['formats']=array(0=>'############');
		
		$spreadsheet->set_data( $data, FALSE );
		$spreadsheet->send();
		die;

	}
	
	public function action_get_events() {
		
		$user=Auth::instance()->get_user();
		
		$orders = array();
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			
			$orders = ORM::factory('Order');
			
			if($_GET['start']) {
				$orders = $orders->where('create_date', '>=', $_GET['start']);
			}
			
			if($_GET['end']) {
				$orders = $orders->and_where('create_date', '<=', $_GET['end']);
			}
			
			$orders = $orders->find_all();
			
			
			
		}else {
			$orders = $user->orders;
				
			if($_GET['start']) {
				$orders = $orders->where('create_date', '>=', $_GET['start']);
			}
				
			if($_GET['end']) {
				$orders = $orders->and_where('create_date', '<=', $_GET['end']);
			}
				
			$orders = $orders->find_all();
			
		}
		
		$events = array();
		
		foreach ($orders as $order) {
			$e = array();
			$e['title'] = $order->type;
			$e['start'] = $order->create_date;
			$e['url'] = URL::site('order/view_order').'/'.$order->id;
			array_push($events, $e);
		}
		
		echo json_encode($events);
		die;
	}
	
	public function action_divisions_list() {
	
		$divisions = NULL;
		$divisions_count = 0;
	
		$columns = array(
				'name',
				'description',
				'id',
				'customer_id',);
	
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$divisions = ORM::factory('Division');
			$divisions_count = ORM::factory('Division');
		}else {
			$customer=Auth::instance()->get_user()->customer;
			$divisions = $customer->divisions;
			$divisions_count = $customer->divisions;
		}
	
		if($_POST['action'] == 'filter' ) {
	
			$divisions = $divisions->where('Division.id','>','0');
			
			if($_POST['customer'] != NULL) {
				$divisions = $divisions->join('customers')->on('customers.id','=','Division.customer_id')->where('customers.name','LIKE',"%".$_POST['customer']."%")->or_where('customers.nip','LIKE',"%".$_POST['customer']."%")->or_where('customers.regon','LIKE',"%".$_POST['customer']."%")->or_where('customers.code','LIKE',"%".$_POST['customer']."%");
				$divisions_count = $divisions_count->join('customers')->on('customers.id','=','Division.customer_id')->where('customers.name','LIKE', "%".$_POST['customer']."%")->or_where('customers.nip','LIKE',"%".$_POST['customer']."%")->or_where('customers.regon','LIKE',"%".$_POST['customer']."%")->or_where('customers.code','LIKE',"%".$_POST['customer']."%");
			}
				
			if($_POST['name'] != NULL) {
				$divisions = $divisions->and_where('name','LIKE','%'.$_POST['name'].'%');
				$divisions_count = $divisions_count->and_where('name','LIKE','%'.$_POST['name'].'%');
			}
	
			if($_POST['description'] != NULL) {
				$divisions = $divisions->and_where('description','LIKE',"%".$_POST['description']."%");
				$divisions_count = $divisions_count->and_where('description','LIKE',"%".$_POST['description']."%");
			}
			
		}
	
		if($_POST['order'][0]['column'] != NULL) {
			$divisions = $divisions->order_by($columns[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
	
		}
		/*
		 * Paging
		*/
		$divisions_count = $divisions_count->count_all();
	
		$iTotalRecords = $divisions_count;
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);
	
		$records = array();
		$records["data"] = array();
	
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
	
		$divisions = $divisions->limit($iDisplayLength)->offset($iDisplayStart)->find_all();
	
		foreach ($divisions as $division) {
			$id = $division->id;
	
			$actions =" <div class=\"margin-bottom-5\">
											<button class=\"btn btn-xs green margin-bottom\" onClick=\"javascript:window.location='/customer/division_view/".$division->id."';\"><i class=\"glyphicon glyphicon-info-sign\"></i> Przegląd</button>
											<button class=\"btn btn-xs yellow division-edit margin-bottom\" onClick=\"javascript:window.location='/customer/division_edit/".$division->id."';\"><i class=\"fa fa-user\"></i> Edytuj</button>
									</div>";
			
	
			$records["data"][] = array(
					$division->name,
					$division->description,
					$division->boxes->count_all(),
					(Auth_ORM::instance()->logged_in('admin') ? $division->customer->name ."<br />NIP: ". $division->customer->nip: NULL),
					$actions
			);
		}
	
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
	
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
	
		echo json_encode($records);
		die;
	
	}
	
	public function action_places_list() {
	
		$places = NULL;
		$places_count = 0;
		
		$columns = array(
				'id',
				'barcode',
				'description',
				'status',);
	
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$places = ORM::factory('Place');
			$places_count = ORM::factory('Place');
		}

		


		if($_POST['action'] == 'filter' ) {
				
			$places = $places->where('id','>','0');
				
			if($_POST['id'] != NULL) {
				$places = $places->and_where('id','=',$_POST['id']);
				$places_count = $places_count->and_where('id','=',$_POST['id']);
			}
				
			if($_POST['barcode'] != NULL) {
				$places = $places->and_where('barcode','=',$_POST['barcode']);
				$places_count = $places_count->and_where('barcode','=',$_POST['barcode']);
			}
				
			if($_POST['description'] != NULL) {
				$places = $places->and_where('description','LIKE',"%".$_POST['description']."%");
				$places_count = $places_count->and_where('description','LIKE',"%".$_POST['description']."%");
			}
			
				
			if($_POST['status'] != NULL) {
				$places = $places->and_where('status','=',$_POST['status']);
				$places_count = $places_count->and_where('status','=',$_POST['status']);
			}
		}		
		
		if($_POST['order'][0]['column'] != NULL) {
			$places = $places->order_by($columns[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
		
		}
		/*
		 * Paging
		*/
		$places_count = $places_count->count_all();
		
		$iTotalRecords = $places_count;
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);
	
		$records = array();
		$records["data"] = array();
	
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		
		$places = $places->limit($iDisplayLength)->offset($iDisplayStart)->find_all();
	
		foreach ($places as $place) {
			$id = $place->id;
	
			$actions = "<div class=\"margin-bottom-5\">".
					"<button class=\"btn btn-xs green margin-bottom\" onClick=\"javascript:window.location='/warehouse/place_view/".$place->id."'\">".
					"<i class=\"glyphicon glyphicon-info-sign\"></i> Przegląd	</button><br />".
					"<button class=\"btn btn-xs yellow margin-bottom\"	onClick=\"javascript:window.location='/warehouse/place_edit/".$place->id."'\">".
					"<i class=\"fa fa-user\"></i> Edytuj	</button><br />".
					"<!-- <button class=\"btn btn-xs red place-delete margin-bottom\" id=\"".$place->id."\">	<i class=\"fa fa-recycle\"></i> Usuń </button> -->".
					"</div>";
				
			$records["data"][] = array(
					sprintf('%012d',$place->id),
					//"<img alt=\"barcode\" src=\"/barcode/get/".$place->barcode."\"/>",
					$place->description,
					$place->status,
					$place->boxes->count_all(),
					$place->capacity,
					$actions
			);
		}
	
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
	
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
	
		echo json_encode($records);
		die;
	
	}
	
	public function action_boxes_list() {
		
		$customer=Auth::instance()->get_user()->customer;
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();

		$boxes = NULL;
		$boxes_count = 0;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('manager')) {
			$boxes = ORM::factory('Box');
			$boxes_count = ORM::factory('Box');
		}
		elseif(Auth::instance()->logged_in('operator')){
			$warehouses = $customer->warehouses->find_all();
			$warehouses_ids= array();
			$boxes = array();
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids);
			$boxes_count = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids);
		}
		elseif(Auth::instance()->logged_in('login')) {
			$user = Auth::instance()->get_user();
			$divisions = $user->divisions->find_all();
			$divisions_ids= array();
			$boxes = array();
			foreach ($divisions as $division) {
				array_push($divisions_ids, $division->id);
					
			}
			$boxes = ORM::factory('Box')->where('division_id','IN', $divisions_ids);
			$boxes_count = ORM::factory('Box')->where('division_id','IN', $divisions_ids);
		}	
		/*
		 * Paging
		*/
		$columns = array(
			'id',
			'barcode',
			'place_id',
			'warehouse_id',
			'division_id',
			'date_from',
			'date_to',
			'status');
		
		if($_POST['action'] == 'filter' ) {
			
			$boxes = $boxes->where('id','>','0');
			
			if($_POST['id'] != NULL) {
				$boxes = $boxes->and_where('id','=',$_POST['id']);
				$boxes_count = $boxes_count->and_where('id','=',$_POST['id']);
			}
			
			if($_POST['barcode'] != NULL) {
				$boxes = $boxes->and_where('barcode','=',$_POST['barcode']);
				$boxes_count = $boxes_count->and_where('barcode','=',$_POST['barcode']);
			}
			
			if($_POST['place_id'] != NULL) {
				$boxes = $boxes->and_where('place_id','IN',DB::expr("(SELECT id FROM places WHERE barcode='".str_replace("-","",$_POST['place_id']."')")));
				$boxes_count = $boxes_count->and_where('place_id','IN',DB::expr("(SELECT id FROM places WHERE barcode='".str_replace("-","",$_POST['place_id']."')")));
			}
			if($_POST['warehouse_name'] != NULL) {
				$boxes = $boxes->and_where('warehouse_id','=',ORM::factory('Warehouse')->where('name','LIKE','%'.$_POST['warehouse_name'].'%')->find()->id);
				$boxes_count = $boxes_count->and_where('warehouse_id','=',ORM::factory('Warehouse')->where('name','LIKE','%'.$_POST['warehouse_name'].'%')->find()->id);
			}
			
			if($_POST['customer'] != NULL) {
				$customers = ORM::factory('Customer')->where('name','LIKE','%'.$_POST['customer'].'%')->find_all();
				$divisions_ids_filter = array();
				
				foreach ($customers as $customer) {
					foreach ($customer->divisions->find_all() as $division) {
						array_push($divisions_ids_filter , $division->id);
					}
				}
				
				$boxes = $boxes->and_where('division_id','IN',$divisions_ids_filter);
				$boxes_count = $boxes_count->and_where('division_id','IN',$divisions_ids_filter);
			}
			
			if($_POST['date_from'] != NULL) {
				$boxes = $boxes->and_where('date_from','=',$_POST['date_from']);
				$boxes_count = $boxes_count->and_where('date_from','=',$_POST['date_from']);
			}
			
			if($_POST['date_to'] != NULL) {
				$boxes = $boxes->and_where('date_to','=',$_POST['date_to']);
				$boxes_count = $boxes_count->and_where('date_to','=',$_POST['date_to']);
			}
			
			if($_POST['status'] != NULL) {
				$boxes = $boxes->and_where('status','=',$_POST['status']);
				$boxes_count = $boxes_count->and_where('status','=',$_POST['status']);
			}
		}
		
		if($_POST['order'][0]['column'] != NULL) {
			$boxes = $boxes->order_by($columns[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
			
		}
		

		$boxes_count = $boxes_count->count_all();
		
		$iTotalRecords = $boxes_count;
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);
		
		$records = array();
		$records["data"] = array();
		
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		
		$boxes = $boxes->limit($iDisplayLength)->offset($iDisplayStart);
		
		$boxes = $boxes->find_all();
		
		
		foreach ($boxes as $box) {			
			$id = $box->id;
		
			$actions = "<div class=\"margin-bottom-5\">".
				"<button class=\"btn btn-xs green margin-bottom\" onClick=\"javascript:window.location='/warehouse/box_view/".$box->id."'\">".
				"<i class=\"glyphicon glyphicon-info-sign\"></i> Przegląd	</button><br />".
				"<button class=\"btn btn-xs yellow margin-bottom\"	onClick=\"javascript:window.location='/warehouse/box_edit/".$box->id."'\">".
				"<i class=\"fa fa-user\"></i> Edytuj	</button><br />".
				"<!-- <button class=\"btn btn-xs red box-delete margin-bottom\" id=\"".$box->id."\">	<i class=\"fa fa-recycle\"></i> Usuń </button> -->".
				"</div>";
			
			$records["data"][] = array(
						//$box->id,
						sprintf('%012d',$box->barcode),
						//($box->place_id != '' ? '<img alt="barcode" src="/barcode/get/'.$box->place->barcode.'"/>':''),
						($box->place_id != '' ? $box->place->description : sprintf('%012d',0) ),
						$box->warehouse->name,
						$box->division->customer->name,
						$box->date_from,
						$box->date_to,
						$box->status,
						$actions
			);
		}
		
		if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
			$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
			$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
		}
		
		$records["draw"] = $sEcho;
		$records["recordsTotal"] = $iTotalRecords;
		$records["recordsFiltered"] = $iTotalRecords;
		
		echo json_encode($records);
		die;
	}
	
	
public function action_division_boxes_list() {
		
		$customer=Auth::instance()->get_user()->customer;
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();

		$boxes = NULL;
		$boxes_count = 0;
		
		if($this->request->param('id') > 0) {
			
			$divisions_id = $this->request->param('id');
			
			
			$boxes = ORM::factory('Box')->where('division_id','=',$divisions_id);
			$boxes_count = ORM::factory('Box')->where('division_id','=',$divisions_id);
			
	
			/*
			 * Paging
			*/
			$columns = array(
				'id',
				'barcode',
				'place_id',
				'warehouse_id',
				'division_id',
				'date_from',
				'date_to',
				'status');
			
				
			
			if($_POST['action'] == 'filter' ) {
				
				
				if($_POST['id'] != NULL) {
					$boxes = $boxes->and_where('id','=',$_POST['id']);
					$boxes_count = $boxes_count->and_where('id','=',$_POST['id']);
				}
				
				if($_POST['barcode'] != NULL) {
					$boxes = $boxes->and_where('barcode','=',$_POST['barcode']);
					$boxes_count = $boxes_count->and_where('barcode','=',$_POST['barcode']);
				}
				
				if($_POST['place_id'] != NULL) {
					$boxes = $boxes->and_where('place_id','=',$_POST['place_id']);
					$boxes_count = $boxes_count->and_where('place_id','=',$_POST['place_id']);
				}
				
				if($_POST['date_from'] != NULL) {
					$boxes = $boxes->and_where('date_from','=',$_POST['date_from']);
					$boxes_count = $boxes_count->and_where('date_from','=',$_POST['date_from']);
				}
				
				if($_POST['date_to'] != NULL) {
					$boxes = $boxes->and_where('date_to','=',$_POST['date_to']);
					$boxes_count = $boxes_count->and_where('date_to','=',$_POST['date_to']);
				}
				
				if($_POST['status'] != NULL) {
					$boxes = $boxes->and_where('status','=',$_POST['status']);
					$boxes_count = $boxes_count->and_where('status','=',$_POST['status']);
				}
			}
			
			if($_POST['order'][0]['column'] != NULL) {
				$boxes = $boxes->order_by($columns[$_POST['order'][0]['column']], $_POST['order'][0]['dir']);
				
			}
			
	
			$boxes_count = $boxes_count->count_all();
			
			$iTotalRecords = $boxes_count;
			$iDisplayLength = intval($_REQUEST['length']);
			$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
			$iDisplayStart = intval($_REQUEST['start']);
			$sEcho = intval($_REQUEST['draw']);
			
			$records = array();
			$records["data"] = array();
			
			$end = $iDisplayStart + $iDisplayLength;
			$end = $end > $iTotalRecords ? $iTotalRecords : $end;
			
			$boxes = $boxes->limit($iDisplayLength)->offset($iDisplayStart);
			
			$boxes = $boxes->find_all();
			
			
			foreach ($boxes as $box) {			
				$id = $box->id;
			
				$actions = "<div class=\"margin-bottom-5\">".
					"<button class=\"btn btn-xs green margin-bottom\" onClick=\"javascript:window.location='/warehouse/box_view/".$box->id."'\">".
					"<i class=\"glyphicon glyphicon-info-sign\"></i> Przegląd	</button><br />".
					"<button class=\"btn btn-xs yellow margin-bottom\"	onClick=\"javascript:window.location='/warehouse/box_edit/".$box->id."'\">".
					"<i class=\"fa fa-user\"></i> Edytuj	</button><br />".
					"<!-- <button class=\"btn btn-xs red box-delete margin-bottom\" id=\"".$box->id."\">	<i class=\"fa fa-recycle\"></i> Usuń </button> -->".
					"</div>";
				
				$records["data"][] = array(
							$box->id,
							'<img alt="barcode" src="/barcode/get/'.$box->barcode.'"/>',
							($box->place_id != '' ? '<img alt="barcode" src="/barcode/get/'.$box->place->barcode.'"/>':''),
							$box->date_from,
							$box->date_to,
							$box->status,
							$actions
				);
			}
			
			if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
				$records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
				$records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
			}
			
			$records["draw"] = $sEcho;
			$records["recordsTotal"] = $iTotalRecords;
			$records["recordsFiltered"] = $iTotalRecords;
			
			echo json_encode($records);
			die;
		}
	}
	
	
	
	public function action_index() {
		
	}
	
	public function action_get_utilisation_document_pdf() {

		//TODO Szablon dokumentu utylizacji / wypełnianie treścią
		
		if($this->request->method()===HTTP_Request::POST) {

			$order=Order::instance($_POST['order_id']);
			
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
			
			$document_template = View_MPDF::factory('templates/utilisation_document_template');
			$document_template->bind('order',$order);
			$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$_POST['order_id'].".pdf";
			
			$document_template->get_mpdf()->SetDisplayMode('fullpage');
			$document_template->get_mpdf()->WriteHTML($document_css,1);
			
			$document_template->write_to_disk(PDF.$document_filename);
			
			$pdf = EasyRSA::signFile(PDF.$document_filename);
				
			$pdf->Output(PDF.$document_filename,F);
				
			echo json_encode(array('status'=>'OK','url'=>URL::base().'public/pdf/'.$document_filename));
		die;
		}else  {
			echo json_encode(array('status'=>'OK','body'=>'<br><br>Dokument<br><br>'));
			die;
		}
		
	
	}
	
	public function action_get_utilisation_document() {
		
		
		if($this->request->method()===HTTP_Request::POST) {
			
			$order=Order::instance($_POST['order_id']);
			
			$document_template = View::factory('templates/utilisation_document_template');
			
			$document_template->bind('order',$order);
			
			
			$document = $document_template->render();
			
			echo json_encode(array('status'=>'OK','body'=>base64_encode($document)));
			die;
			
		}else {
			echo json_encode(array('status'=>'OK','body'=>'<br><br>Dokument<br><br>'));
			die;
		}

	}
	
	public function action_get_user_notifications() {
		$user=Auth_ORM::instance()->get_user();
		
		if($user) {
			$notification=$user->notifications->where('status','=','0')->find();
		
			if($notification->loaded()) {
				$notification->status=1;
				if($notification->update()) {
					echo json_encode(array('status'=>'OK',
							   'message'=>$notification->message));
					die;
				}
			}else {
				echo json_encode(array('status'=>'EMPTY'));
				die;
			}
		}
	}
	
	public function action_check_box() {
		if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
				$box = ORM::factory('Box')->where('barcode', '=', (int) $_POST['id'])->and_where('status','=','Na magazynie')->find();
				if($box->loaded()) {
					echo json_encode(array('status'=>'OK','id'=>$box->id));
					die;
				}else {
					echo json_encode(array('status'=>'NOTOK'));
					die;
				}	
			}else {
				echo json_encode(array('status'=>'NOTOK'));
				die;
			}
		}
	}
	
	public function action_check_box_barcode() {
		if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
					$box = ORM::factory('Box')->where('barcode', '=', $_POST['barcode'])->find();
					if($box->loaded()) {
						echo json_encode(array('status'=>'OK','id'=>$box->id));
						die;
					}else {
						echo json_encode(array('status'=>'NOTOK'));
						die;
					}	
			}else {
					echo json_encode(array('status'=>'NOTOK'));
					die;
			}
		}
	}
	
	public function action_get_box_content() {
		if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
				$box = ORM::factory('Box')->where('id', '=', $_POST['id'])->find();
				$result = array();
				if($box->warehouse->customer == $user->customer) {
					
					foreach ($box->documents->find_all() as $doc) {
						array_push($result, array("doc_id"=>$doc->id,"doc_name"=>$doc->name));
					}
				
					echo json_encode(array('status'=>'OK','id'=>$box->id,'result'=>$result));
					die;
				}else {
					echo json_encode(array('status'=>'NOTOK'));
					die;
				}
			}else {
				echo json_encode(array('status'=>'NOTOK'));
				die;
			}
		}
	}
	public function action_generate_password() {
		echo json_encode(array('status'=>'OK',
							   'password'=>Text::random()));
		die;	
	}
	
	public function action_check_user_availability() {
		
		$user=(ORM::factory('User')->where('username','=',$this->request->post('username'))->find());
				
		if($user->loaded()===TRUE) {
				echo json_encode(array('status'=>'NOTOK'));
				die;
		}else {
			echo json_encode(array('status'=>'OK'));
			die;
		}
	}
	
	public function action_check_email_availability() {
		$user=(ORM::factory('User')->where('email','=',$this->request->post('email'))->find());
		if($user->loaded()===TRUE) {
			echo json_encode(array('status'=>'NOTOK'));
			die;
		}
		else {
			echo json_encode(array('status'=>'OK'));
			die;
		}
	}
}