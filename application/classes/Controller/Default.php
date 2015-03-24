<?php
defined ( 'SYSPATH' ) or die ( 'No direct script access.' );

class Controller_Default extends Controller_Welcome {
	protected $user;
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		$this->template->message = Message::factory();
		
	
	}
	
/* 
 * TODO
 * Dopisać komenatrze i kod resetu hasła
*/
	protected function load_content() {
	

		$this->add_css ( ASSETS_ADMIN_PAGES_CSS.'login-soft.css');
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.min.js');
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'backstretch/jquery.backstretch.min.js');
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'select2/select2.min.js');
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'login-soft.js');
		
		$this->class='login';
				
		if (Kohana::find_file ( 'views', $this->_req."_admin" )) {
			$this->content = View::factory ( $this->_req."_admin" );
				
			if (file_exists ( CSS . $this->_req . '.css' )) {
				$this->add_css ( CSS . $this->_req . '.css' );
			}
				
			if (file_exists ( JS . $this->_req . '.js' )) {
				$this->add_js ( JS . $this->_req . '.js' );
			}
		}elseif (Kohana::find_file ( 'views', $this->_req )) {
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
		if(Auth::instance()->logged_in('login')) {
			$this->redirect('/user/dashboard');
		}
	}
	
	
	public function action_login() {
		
		if($this->request->method()===HTTP_Request::POST) {
//			var_dump($this->request->post('username'),$this->request->post('password'),Auth_ORM::instance()->login($this->request->post('username'), $this->request->post('password')));
	//		die;
			if(Auth::instance()->login($this->request->post('username'), $this->request->post('password'),$this->request->post('remember'))) {
				Message::success(ucfirst(__('Witaj, udało Ci się prawidłowo zalogować do systemu')), '/user/dashboard');
			}else {
				Message::error(ucfirst(__('Podaj prawidłową nazwę użytkownika i hasło')), '/default/login');
			}
		}
	}
	
	public function action_logout() {
		Session::instance()->destroy();
		Auth::instance()->logout(TRUE);
		if(!Auth::instance()->logged_in('login')) {
			Message::success(ucfirst(__('Witaj, udało Ci się prawidłowo wylogować.')), '/default/login');
		}
	}
	
	public function action_reset() {
		if($this->request->method()===HTTP_Request::POST) {
			if($user=ORM::factory('User')->where('email','=',$this->request->post('email'))->find()) {
				Message::success(ucfirst(__('Na podany adres zostały wysłany email z nowym hasłem')), '/default/login');
			}else Message::error(ucfirst(__('Podaj prawidłowy adres email')), '/default/login');
				
		}
	}
}
                                        
