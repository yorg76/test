<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Controller_Api extends Controller_Welcome {
	
	public $types_short = array('Zamówienie pustych pudeł i kodów kreskowych'=>'ZPPiKK',
			'Zamówienie odbioru i magazynowania pudeł'=>'ZOiMP',
			'Zamówienie zniszczenie magazynowanych pudeł'=>'ZZMP',
			'Zamówienie skanowania, kopii dokumentów'=>'ZSKD',
			'Zamówienie kopii notarialnej dokumentów'=>'ZKND',
			'Wypożyczenie pudeł'=>'WP');
	
	public function before() {
		parent::before ();
		$this->auto_render=FALSE;
	}
	
	public function action_checkLogin() {
		$log=Kohana_Log::instance();
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		
		if($this->request->method()===HTTP_Request::POST) {
			
			$result = array();
			
			if(Auth::instance()->login($_POST['user'], $_POST['password'])) {
				$result['status'] = "OK";
				$result['content'] = NULL;
			} else {
				$result['status'] = "ERROR";
				$result['content'] = "Incorrect credentials";
			} 
			echo json_encode($result);
		}else {
			$result = array();
			$result['status'] = "ERROR";
			$result['content'] = "Only POST requests allowed";
			echo json_encode($result);
		}
	}
	
	public function action_getOrders() {
		$log=Kohana_Log::instance();
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		
		
		if($this->request->method()===HTTP_Request::POST) {
			
			$result = array();
			
			$orders=ORM::factory('Order')->where('status', '=', 'Nowe')->find_all();
			//$log->add(Log::DEBUG,"Success:".serialize($orders)."\n");
						
			$result['content']=array();
			
			foreach ($orders as $order) {
				
				array_push($result['content'], array('id'=>$order->id,
													'type'=>$order->type,
													'warehouse_id'=>$order->warehouse_id,
													'quantity'=>$order->quantity,
													'pickup_date'=>$order->pickup_date,
													'create_date'=>$order->create_date,
													'display_name'=>" Typ:".$this->types_short[$order->type]." Zam.:".$order->id." Data:".$order->create_date));  	
			}
		
			//if(Auth::instance()->login($_POST['user'], $_POST['password'])) {
			if(TRUE){
				$result['status'] = "OK";
			} else {
				$result['status'] = "ERROR";
				$result['content'] = "Incorrect credentials";
			} 
			
			echo json_encode($result);
		}else {
			$result = array();
			$result['status'] = "ERROR";
			$result['content'] = "Only POST requests allowed";
			echo json_encode($result);
		}		
	}
	
	public function action_getOrderDetails() {
		$log=Kohana_Log::instance();
		$log->add(Log::DEBUG,"Success:".serialize($_POST)."\n");
		
		if($this->request->method()===HTTP_Request::POST) {
				
			$result = array();
			$order=ORM::factory('Order')->where('id', '=', $_POST['order_id'])->find();
			
			if ($order->type=='Zamówienie pustych pudeł i kodów kreskowych' || $order->type=='Zamówienie odbioru i magazynowania pudeł') {
				$result['scan'] = TRUE;
			}else {
				$result['scan'] = FALSE;
			}
				
			$order_boxes=$order->boxes->find_all();
			
			$content = array();
			$result['content'] = array();
			
			foreach ($order_boxes as $ob) {
				$content['id'] = $ob->id;
				$content['date_from'] = $ob->date_from;
				$content['status'] = $ob->lock;
				$content['warehouse_id'] = $ob->warehouse_id;
				$content['display_name'] = "Pudło:".$ob->id ." Mag.:". $ob->warehouse_id." Data:".$ob->date_from;
				array_push($result['content'],$content);
			}
			
			$result['status'] = "OK";
			echo json_encode($result);
		}else {
			$result = array();
			$result['status'] = "ERROR";
			$result['content'] = "Only POST requests allowed";
			echo json_encode($result);
		}	
	}
	
	public function action_searchCode() {
		$result = array();
		$result['status'] = "OK";
		$result['content'] = NULL;
		echo json_encode($result);
		
	}
	
	public function action_confirmOrder() {
		$result = array();
		$order = Order::instance($_POST['order_id']);
		
		if($order->acceptOrder()) {
			$result['status'] = "OK";
			$result['content'] = NULL;
			echo json_encode($result);
		}else {
			$result['status'] = "ERROR";
			$result['content'] = "Update of the order went badly, im afraid, sir!";
			echo json_encode($result);
				
		}
	}
	
	public function action_completeOrder() {
		$result = array();
		$order = Order::instance($_POST['order_id']);
	
		if($order->completeOrder()) {
			$result['status'] = "OK";
			$result['content'] = NULL;
			echo json_encode($result);
		}else {
			$result['status'] = "ERROR";
			$result['content'] = "Update of the order went badly, im afraid, sir!";
			echo json_encode($result);
	
		}
	}	
	
	public function action_addOrderBox() {
		$result = array();
		
		$order = Order::instance($_POST['order_id']);
		
		$box = ORM::factory('Box');
		
		$box->id=$_POST['box_id'];
		$box->date_from=date('Y-m-d');
		$box->date_reception=date('Y-m-d');
		$box->status='W trakcie transportu';
		
		if($box->save()) {
			
			$order->order->add('boxes',$box->id);
			
			$result['status'] = "OK";
			
			$content['id'] = $box->id;
			$content['date_from'] = $box->date_from;
			$content['status'] = $box->status;
			$content['warehouse_id'] = -1;
			$content['display_name'] = "Pudło:".$box->id ." Mag.: 0 Data:".$box->date_from;
			
			$result['content']=$content;
				
			echo json_encode($result);
		}else {
			$result['status'] = "ERROR";
			$result['content'] = "Update of the order went badly, im afraid, sir!";
			echo json_encode($result);	
		}
		
	}
	
	public function action_index() {
		$result = array();
		$result['status'] = "ERROR";
		$result['content'] = "Ten serwis nie powinien być wywołany";
		echo json_encode($result);
		
	}
}