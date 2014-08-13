<?php
defined ( 'SYSPATH' ) or die ( 'No direct script access.' );

class Controller_Welcome extends Controller_Template {
	
	public $template;
	protected $content;
	protected $_req;
	protected $_css = array ();
	protected $_fcss = array ();
	protected $_js = array ();
	protected $_fjs = array ();
	protected $_lib = array ();
	protected $base;
	protected $title;
	protected $description;
	protected $keywords;
	protected $author;
	protected $class;
	protected $_init=array ();
	protected $_session;
	protected $_user;
	protected $_bread = array();
	
	protected function load_template() {
		
		if(Auth::instance()->logged_in('login')) {
			$this->_user=Auth::instance()->get_user();
			$this->_session=Session::instance();
			$this->template = View::factory ( 'templates/main' );
		}
		else $this->template = View::factory ( 'templates/login' );
	}
	
	public function before() {
				
		parent::before ();
		$this->load_template ();
	
		$this->add_css ("http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all");
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'font-awesome/css/font-awesome.min.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'simple-line-icons/simple-line-icons.min.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap/css/bootstrap.min.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'uniform/css/uniform.default.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'bootstrap-switch/css/bootstrap-switch.min.css');


		$this->add_css ( ASSETS_GLOBAL_CSS.'components.css');
		$this->add_css ( ASSETS_GLOBAL_CSS.'plugins.css');
		$this->add_css ( ASSETS_ADMIN_LAYOUT_CSS.'layout.css');
		$this->add_css ( ASSETS_ADMIN_LAYOUT_CSS.'themes/darkblue.css');
		$this->add_css ( ASSETS_ADMIN_LAYOUT_CSS.'custom.css');
				
		//Footer scripts
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-1.11.1.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-migrate-1.2.1.min.js');
		
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-ui/jquery-ui-1.10.3.custom.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap/js/bootstrap.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-slimscroll/jquery.slimscroll.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery.blockui.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery.cokie.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'uniform/jquery.uniform.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'bootstrap-switch/js/bootstrap-switch.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_SCRIPTS.'metronic.js');
		$this->add_fjs ( ASSETS_ADMIN_LAYOUT_SCRIPTS.'layout.js');
		$this->add_fjs ( ASSETS_ADMIN_LAYOUT_SCRIPTS.'quick-sidebar.js');

		
		$this->_req = strtolower ( $this->request->controller () . '/' . $this->request->action () );
		
		
		if (method_exists ( $this, 'load_content' )) {

			$this->load_content();
		}
		
		
		$this->template->bind ('user', $this->_user );
		$this->template->bind ('session', $this->_session );
		$this->template->bind ('bread', $this->_bread );
		$this->template->bind ('body_class',$this->class);
		$this->template->bind ('content', $this->content );
	}
	
	public function after() {
		$this->template->header = $this->header ();
		$this->template->footer = $this->footer ();
		$this->template->init = $this->init();
		parent::after ();
	}
	
	public function init() {
		$_init[] = "Metronic.init(); // init metronic core components";
		$_init[] = "Layout.init(); // init current layout";
		$_init[] = "QuickSidebar.init() // init quick sidebar";
		$_init[] = join ( $this->_init  );
		
		return join ( "\n\t", $_init);
	}
	
	public function header() {
		$this->base = URL::base ( 'http' );
		
		$_header [] = '<title>' . $this->title . '</title>';
		$_header [] = '<meta name="description" content="' . $this->description . '">';
		$_header [] = '<meta name="keywords" content="' . $this->keywords . '">';
		$_header [] = '<meta name="author" content="' . $this->author . '">';
		$_header [] = '<meta charset="UTF-8">';
		$_header [] = '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
		$_header [] = '<meta content="width=device-width, initial-scale=1" name="viewport"/>';
		$_header [] = '<base href="' . $this->base . '">';
		
		$_header [] = join ( $this->_lib );
		$_header [] = join ( "\n\t", array_map ( 'HTML::style', $this->_css ) );
		$_header [] = join ( "\n\t", array_map ( 'HTML::script', $this->_js ) );
		return join ( "\n\t", $_header );
	}
	
	public function footer() {
		
		$this->base = URL::base ( 'http' );
		
		$_footer [] = join ( $this->_lib );
		$_footer [] = join ( "\n\t", array_map ( 'HTML::style', $this->_fcss ) );
		$_footer [] = join ( "\n\t", array_map ( 'HTML::script', $this->_fjs ) );
		
		
		return join ( "\n\t", $_footer );
		
	}
	
	protected function add_init($line = null) {
			
		$this->_init [] = $line;
	}
	
	protected function add_css($file = null) {
		if (is_null ( $file )) {
			$file = CSS . $this->_req . '.css';
		}
		
		$this->_css [] = $file;
	}
	
	protected function add_js($file) {
		$this->_js [] = $file;
	}
	
	protected function add_fcss($file = null) {
		if (is_null ( $file )) {
			$file = CSS . $this->_req . '.css';
		}
	
		$this->_fcss [] = $file;
	}
	
	protected function add_fjs($file) {
		$this->_fjs [] = $file;
	}
	
	protected function load_lib(array $files) {
		array_merge ( $this->_lib, $files );
	}
} // End Welcome
