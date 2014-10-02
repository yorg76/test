<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Profile extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
	}
	
	protected function load_content() {
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.min.js');
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ecommerce-index.js');
		
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
	
	public function action_profile(){
	
		$user = Auth::instance()->get_user();
		$roles = ORM::factory('Role')->where('name','!=','admin')->find_all();
		$divisions = $user->customer->divisions->find_all();
			
		$user_divisions = $user->divisions->find_all();
			
		$this->content->bind('user', $user);
			
		$this->content->bind('divisions', $divisions);
		$this->content->bind('user_divisions', $user_divisions);
		$this->content->bind('roles', $roles);
	
		if($this->request->method()===HTTP_Request::POST) {
	
			if(is_array($_POST['divisions'])) {
				foreach($_POST['divisions'] as $div) {
					if(!$user->has('divisions',$div))	{
						$user->add('divisions',$div);
					}
				}
					
				foreach ($user->divisions->find_all() as $div) {
					if(!in_array($div->id, $_POST['divisions'])) {
						$user->remove('divisions',$div->id);
					}
				}
			}
	
	
			$user->values($_POST);
	
			foreach ($_POST['roles'] as $role) {
				if(!$user->has('roles',$role)) {
					$user->add('roles',$role);
				}
			}
	
			foreach($user->roles->find_all() as $role) {
				if(!in_array($role->id, $_POST['roles'])) {
					$user->remove('roles',$role);
				}
			}
	
			$validate = new Validation($_POST);
			$validate->rule('firstname', 'not_empty')
			->rule('lastname', 'not_empty')
			->rule('username', 'not_empty');
	
			if($validate->check() && $user->update($validate)){
				Message::success(ucfirst(__('Dane użykownika zostały zaktualizowane')),'/customer/users');
			}else{
				Message::error(ucfirst(__('Wystąpił błąd')." ".$validate->errors('msg')),'/customer/users');
			}
	
		}
	
	}
}