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

	public function action_index() {
		
	}
	
	public function action_get_utilisation_document() {
		if($this->request->method()===HTTP_Request::POST) {
			
			$document_template = View::factory('templates/document_template_full');
			$document = $document_template->render();
			
			echo json_encode(array('status'=>'OK','body'=>base64_encode($document)));
		}else echo json_encode(array('status'=>'OK','body'=>'<br><br>Dokument<br><br>'));

	}
	
	public function action_get_user_notifications() {
		$user= Auth_ORM::instance()->get_user();
		if($user->loaded()) {
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