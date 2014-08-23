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