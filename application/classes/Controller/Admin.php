<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Admin extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		
		array_push($this->_bread, ucfirst($this->request->action ()));
		
		$this->template->message = Message::factory();
		$this->add_init("TableEditable.init();\n\t");
		
		if(strtolower ( $this->request->action()) == 'add_user') $this->add_init("Add_user.init();");
		if(strtolower ( $this->request->action()) == 'edit_user') $this->add_init("Edit_user.init();");

	}
	
	protected function load_content() {
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'select2/select2.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/css/datepicker.css');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/additional-methods.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'select2/select2.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/media/js/jquery.dataTables.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->add_fjs ( ASSETS_GLOBAL_SCRIPTS.'datatable.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.js');
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-editable.js');


		
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
		
	public function action_users() {
		
	}
	public function action_customers() {
		
	}
	
	public function action_change_user_password() {
		if($this->request->param('id') > 1 ) {
			$user = User::instance($this->request->param('id'));
			
			if($this->request->method()===HTTP_Request::POST) {
				if($user->user->loaded()) {
					$user->user->password=$this->request->post('password');
					if($user->user->save()) Message::success(ucfirst(__('Hasło zostało zapisane poprawnie')), '/'.$this->template->_controller.'/users');
					else Message::error(ucfirst(__('Podczas zapisywania hasła wystąpił błąd')), '/'.$this->template->_controller.'/'.$this->template->_action);
				}else {
					Message::error(ucfirst(__('Podczas zapisywania hasła wystąpił błąd')), '/'.$this->template->_controller.'/'.$this->template->_action);
				}
			}
		}
	}
	
	public function action_edit_user() {
				
		if($this->request->param('id') > 1 ) {
			$user = User::instance($this->request->param('id'));
			$this->content->bind('editeduser', $user);
			
			if($this->request->method()===HTTP_Request::POST) {

				$params['firstname']=$this->request->post('firstname');
				$params['lastname']=$this->request->post('lastname');
				$params['email']=$this->request->post('email');
				$params['username']=$this->request->post('username');
				$params['pass']=$this->request->post('pass');
				$params['comments']=$this->request->post('comments');
				$params['csa']=$this->request->post('csa');
					
				$params['IsIndividual']=$this->request->post('IsIndividual');
					
				if($this->request->post('tel'))	$params['tel']=$this->request->post('tel');
				if($this->request->post('pesel') AND $this->request->post('IsIndividual')) $params['pesel']=$this->request->post('pesel');
					
				if(!$this->request->post('IsIndividual')) {
					$params['name']=$this->request->post('cname');
					$params['nip']=$this->request->post('nip');
					$params['regon']=$this->request->post('regon');
					$params['cstreet']=$this->request->post('cstreet');
					$params['cpostal']=$this->request->post('cpostal');
					$params['ccity']=$this->request->post('ccity');
					$params['ccountry']=$this->request->post('ccountry');
			
				}else{
					$params['street']=$this->request->post('street');
					$params['postal']=$this->request->post('postal');
					$params['city']=$this->request->post('city');
					$params['country']=$this->request->post('country');
				}
				
				
				if($user->updateUser($params)) Message::success(ucfirst(__('Użytkownik został zapisany poprawnie')), '/'.$this->template->_controller.'/users');
				else Message::error(ucfirst(__('Podczas zapisywania użytkownika wystąpił błąd')), '/'.$this->template->_controller.'/'.$this->template->_action);
			}
		}
	}

	public function action_del_user() {
		if($this->request->param('id') > 1 ) {
			$user = User::instance($this->request->param('id'));
			if($user->deleteUser()) Message::success(ucfirst(__('Użytkownik został usunięty poprawnie')), '/'.$this->template->_controller.'/users');
			else Message::error(ucfirst(__('Podczas usuwania użytkownika wystąpił błąd')), '/'.$this->template->_controller.'/'.$this->template->_action);
		}	
	}
	
	public function action_lock_user() {
		if($this->request->param('id') > 1 ) {
			$user = User::instance($this->request->param('id'));
			if($user->lockUser()) Message::success(ucfirst(__('Użytkownik został zablokowany poprawnie')), '/'.$this->template->_controller.'/users');
			else Message::error(ucfirst(__('Podczas blokowania użytkownika wystąpił błąd')), '/'.$this->template->_controller.'/'.$this->template->_action);
		}
	}
	
	public function action_unlock_user() {
		if($this->request->param('id') > 1 ) {
			$user = User::instance($this->request->param('id'));
			if($user->unlockUser()) Message::success(ucfirst(__('Użytkownik został odblokowany poprawnie')), '/'.$this->template->_controller.'/users');
			else Message::error(ucfirst(__('Podczas odblokowania użytkownika wystąpił błąd')), '/'.$this->template->_controller.'/'.$this->template->_action);
		}
		
	}
	
	
	public function action_add_user() {
		
		$this->template->content = View::factory('admin/add_user')
			->bind('errors', $errors)
			->bind('message', $message);
			
		if (HTTP_Request::POST == $this->request->method()) 
		{			
			try {
				// Create the user using form values
				$user = ORM::factory('user')->create_user($this->request->post(), array(
					'username',
					'password',
					'email'				
				));
				
				// Grant user login role
				$user->add('roles', ORM::factory('role', array('name' => 'login')));
				
				// Reset values so form is not sticky
				$_POST = array();
				
				// Set success message
				$message = "Dodałeś użytkownika '{$user->username}' do bazy";
				
			} catch (ORM_Validation_Exception $e) {
				
				// Set failure message
				$message = 'Wystąpiły błędy. Proszę poprawić formularz';
				
				// Set errors using custom messages
				$errors = $e->errors('models');
			}
		}
	}
	
}
	
