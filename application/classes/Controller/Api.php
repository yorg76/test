<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Controller_Api extends Controller_Welcome {
	
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
													'display_name'=> "Zam.:".$order->id." Data:".$order->create_date." Typ:".$order->type));  	
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
				
			$order_boxes=ORM::factory('Order')->where('id', '=', $_POST['order_id'])->find()->boxes->find_all();
			
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
		$result['status'] = "OK";
		$result['content'] = NULL;
		echo json_encode($result);
	
	}
	
	public function action_index() {
		$result = array();
		$result['status'] = "ERROR";
		$result['content'] = "Ten serwis nie powinien być wywołany";
		echo json_encode($result);
		
	}
}