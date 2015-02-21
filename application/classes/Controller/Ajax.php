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
	
	}
	
	public function action_boxes_list() {
		
		$customer=Auth::instance()->get_user()->customer;
		$storagecategory = ORM::factory('StorageCategory');
		$storagecategories = $storagecategory->find_all();

		$boxes = NULL;
		$boxes_count = 0;
		
		if(Auth::instance()->logged_in('admin') || Auth::instance()->logged_in('operator')) {
			$boxes = ORM::factory('Box');
			$boxes_count = ORM::factory('Box')->count_all();
		}
		elseif(Auth::instance()->logged_in('manager')){
			$warehouses = $customer->warehouses->find_all();
			$warehouses_ids= array();
			$boxes = array();
			foreach ($warehouses as $warehouse) {
				array_push($warehouses_ids, $warehouse->id);
			}
			$boxes = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids);
			$boxes_count = ORM::factory('Box')->where('warehouse_id','IN', $warehouses_ids)->count_all();
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
			$boxes_count = ORM::factory('Box')->where('division_id','IN', $divisions_ids)->count_all();
		}	
		/*
		 * Paging
		*/
		
		$iTotalRecords = $boxes_count;
		$iDisplayLength = intval($_REQUEST['length']);
		$iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart = intval($_REQUEST['start']);
		$sEcho = intval($_REQUEST['draw']);
		
		$records = array();
		$records["data"] = array();
		
		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;	
	
		$boxes = $boxes->limit($iDisplayLength)->offset($iDisplayStart)->find_all();
		
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
						"<img alt=\"barcode\" src=\"/barcode/get/".$box->barcode."\"/>",
						($box->place_id != '' ? "<img alt=\"barcode\" src=\"/barcode/get/".$box->place->barcode."\"/>":''),
						$box->warehouse->name,
						$box->storagecategory->name,
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
		}else echo json_encode(array('status'=>'OK','body'=>'<br><br>Dokument<br><br>'));
	
	}
	
	public function action_get_utilisation_document() {
		
		//TODO Szablon dokumentu utylizacji / wypełnianie treścią
		
		if($this->request->method()===HTTP_Request::POST) {
			
			$order=Order::instance();
			
			$document_template = View::factory('templates/document_template_full');
			$document = $document_template->render();
			
			echo json_encode(array('status'=>'OK','body'=>base64_encode($document)));
		}else echo json_encode(array('status'=>'OK','body'=>'<br><br>Dokument<br><br>'));

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
				}
			}else {
				echo json_encode(array('status'=>'EMPTY'));
			}
		}
	}
	
	public function action_check_box() {
		if($this->request->method()===HTTP_Request::POST) {
			$user=Auth::instance()->get_user();
			if($user->id > 0) {
				$box = ORM::factory('Box')->where('barcode', '=', $_POST['barcode'])->find();
				if($box->division->customer == $user->customer) {
					echo json_encode(array('status'=>'OK','id'=>$box->id));
				}else {
					echo json_encode(array('status'=>'NOTOK'));
				}
			}else {
				echo json_encode(array('status'=>'NOTOK'));
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
					}else {
						echo json_encode(array('status'=>'NOTOK'));
					}	
			}else {
					echo json_encode(array('status'=>'NOTOK'));
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
				}else {
					echo json_encode(array('status'=>'NOTOK'));
				}
			}else {
				echo json_encode(array('status'=>'NOTOK'));
			}
		}
	}
	public function action_generate_password() {
		echo json_encode(array('status'=>'OK',
							   'password'=>Text::random()));	
	}
	
	public function action_check_user_availability() {
		
		$user=(ORM::factory('User')->where('username','=',$this->request->post('username'))->find());
				
		if($user->loaded()===TRUE) echo json_encode(array('status'=>'NOTOK'));
		else echo json_encode(array('status'=>'OK'));
	}
	
	public function action_check_email_availability() {
		$user=(ORM::factory('User')->where('email','=',$this->request->post('email'))->find());
		if($user->loaded()===TRUE) echo json_encode(array('status'=>'NOTOK'));
		else echo json_encode(array('status'=>'OK'));
	}
}