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
			$boxes = ORM::factory('Box')->where('lock', '=', 0)->find_all();
		}else {
			$boxes = ORM::factory('Box')->where('division_id','IN',$divisions_ids)->and_where('lock', '=', 0)->find_all();
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
	
	public function action_places_list() {
	
		$places = NULL;
		$places_count = 0;
	
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$places = ORM::factory('Place');
			$places_count = ORM::factory('Place')->count_all();
		}
		/*
		 * Paging
		*/
	
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
					$place->id,
					"<img alt=\"barcode\" src=\"/barcode/get/".$place->barcode."\"/>",
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
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$boxes = ORM::factory('Box');
			$boxes_count = ORM::factory('Box');
		}
		elseif(Auth::instance()->logged_in('manager')){
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
			'status',
			'seal');
		
			
		
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
				$boxes = $boxes->and_where('place_id','=',$_POST['place_id']);
				$boxes_count = $boxes_count->and_where('place_id','=',$_POST['place_id']);
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
						$box->id,
						'<img alt="barcode" src="/barcode/get/'.$box->barcode.'"/>',
						($box->place_id != '' ? '<img alt="barcode" src="/barcode/get/'.$box->place->barcode.'"/>':''),
						$box->warehouse->name,
						$box->division->customer->name,
						$box->date_from,
						$box->date_to,
						$box->status,
						$box->seal,
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
	
	public function action_index() {
		
	}
	
	public function action_get_utilisation_document_pdf() {

		//TODO Szablon dokumentu utylizacji / wypełnianie treścią
		
		if($this->request->method()===HTTP_Request::POST) {
				
			$document_template = View_MPDF::factory('templates/document_template_full');
			$document_filename=time()."-".Auth_ORM::instance()->get_user()->id."-".$_POST['warehouse']."-".$_POST['division'].".pdf";
			$document_template->write_to_disk(PDF.$document_filename);
							
			echo json_encode(array('status'=>'OK','body'=>URL::base().'public/pdf/'.$document_filename));
			die;
		}else  {
			echo json_encode(array('status'=>'OK','body'=>'<br><br>Dokument<br><br>'));
			die;
		}
		
	
	}
	
	public function action_get_utilisation_document() {
		
		//TODO Szablon dokumentu utylizacji / wypełnianie treścią
		
		if($this->request->method()===HTTP_Request::POST) {
			
			$order=Order::instance();
			
			$document_template = View::factory('templates/document_template_full');
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
		//if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
				$box = ORM::factory('Box')->where('barcode', '=', (int) $_POST['id'])->find();
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
		//}
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
					if($box->seal > 1) {
						array_push($result, array("doc_id"=>-1,"doc_name"=>"Całe pudło ".$box->id." - plomba"));
					}else {
						foreach ($box->documents->find_all() as $doc) {
							array_push($result, array("doc_id"=>$doc->id,"doc_name"=>$doc->name));
						}
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