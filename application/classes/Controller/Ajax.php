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
	
	public function action_check_user_availability() {
		
		$user=(ORM::factory('User')->where('username','=',$this->request->post('username'))->find());
		
		$da_check = User::instance()->getDAUsername(substr($this->request->post('username'),0,7));
		
		if($user->loaded()===TRUE || $da_check['account']!='') echo json_encode(array('status'=>'NOTOK'));
		else echo json_encode(array('status'=>'OK'));
	}
	
	public function action_check_email_availability() {
		$user=(ORM::factory('User')->where('email','=',$this->request->post('email'))->find());
		if($user->loaded()===TRUE) echo json_encode(array('status'=>'NOTOK'));
		else echo json_encode(array('status'=>'OK'));
	}
	
	public function action_get_users() {
	
		$users = ORM::factory('User');
		$columns = $this->request->post('columns');
		
		//if($this->request->post('length')!='-1')
		
		if($this->request->post('id')!='') $users->where('id','=',$this->request->post('length'));
		if($this->request->post('creation_date_from')!='') $users->and_where('creation_date','>',$this->request->post('creation_date_from'));
		if($this->request->post('creation_date_to')!='') $users->and_where('creation_date','<',$this->request->post('creation_date_from'));
		if($this->request->post('login_date_from')!='') $users->and_where('last_login','>',$this->request->post('creation_date_from'));
		if($this->request->post('login_date_to')!='') $users->and_where('last_login','<',$this->request->post('creation_date_from'));
		if($this->request->post('logins')!='') $users->and_where('logins','>',$this->request->post('logins'));
		
		if($this->request->post('name')!='') {
			$users->and_where('firstname','LIKE',"%".$this->request->post('name')."%");
		}
		
		if($this->request->post('username')!='') $users->and_where('username','LIKE','%'.$this->request->post('username').'%');
		if($this->request->post('csa')!='') $users->and_where('csa','=',$this->request->post('csa'));
		if($this->request->post('package')!='') $users->and_where('package','=',$this->request->post('package'));
		if($this->request->post('status')!='') $users->and_where('status','=',$this->request->post('status'));
		
		if($this->request->post('length')!='-1') $users->limit($this->request->post('length'));
		if($this->request->post('start')!='0') $users->offset($this->request->post('start'));
		
	
		
		if($this->request->post('columns')[(int) $this->request->post('order')[0]['column']]['name']=='name'){
			$users->order_by('firstname',$this->request->post('order')[0]['dir']);
			$users->order_by('lastname',$this->request->post('order')[0]['dir']);
		}else{
			if(isset($this->request->post('order')[0]['column'])) $users->order_by($this->request->post('columns')[(int) $this->request->post('order')[0]['column']]['name'] ,$this->request->post('order')[0]['dir']);
		}
		
		$users=$users->find_all();
		
		$draw = $this->request->post('draw');
		$records = array();
		$records["data"] = array();
										
		foreach ($users as $user) {
			$actions = '<div class="margin-bottom-5">'.
					'<a href="/admin/lock_user/'.$user->id.'" class="btn btn-xs default"><i class="fa fa-lock"></i> Zablokuj</a>'.
					'</div>'.
					'<div class="margin-bottom-5">'.
					'<a href="/admin/unlock_user/'.$user->id.'" class="btn btn-xs default"><i class="fa fa-unlock"></i> Odblokuj</a>'.
					'</div>'.
					'<div class="margin-bottom-5">'.
					'<a href="/admin/del_user/'.$user->id.'" class="btn btn-xs default"><i class="fa fa-recycle"></i> Usuń</a>'.
					'</div>'.
					'<div class="margin-bottom-5">'.
					'<a href="/admin/edit_user/'.$user->id.'" class="btn btn-xs default"><i class="fa fa-search"></i> Edytuj</a>'.
					'</div>';
				
			$records["data"][]=array(
				'<input type="checkbox" name="id[]" value="'.$user->id.'">',
				$user->id,
				date('Y/m/d',strtotime($user->creation_date)),
				date('Y/m/d',$user->last_login),
				$user->logins,
				$user->firstname." ".$user->lastname,
				$user->username,
				$user->csa,
				"Package",//$user-
				$user->status,
				$actions,
			);
		}
		$records["draw"] = $draw;
		$records["recordsTotal"] = count($users);
		$records["recordsFiltered"] = count($users);
		echo json_encode($records);
	}
}