<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Controller_Customer extends Controller_Welcome {
	
	public function before() {
		parent::before ();
		
		$this->template->_controller = strtolower ( $this->request->controller () );
		$this->template->_action = strtolower ( $this->request->action () );
		array_push($this->_bread, ucfirst($this->request->action ()));
		$this->template->message = Message::factory();
		$this->add_init("TableEditable.init();");
		if(strtolower ( $this->request->action()) == 'add') $this->add_init("FormWizard.init();");
	}
	
	protected function load_content() {
		
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'select2/select2.css');
		$this->add_css ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'jquery-validation/js/jquery.validate.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'select2/select2.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/media/js/jquery.dataTables.min.js');
		$this->add_fjs ( ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.js');
		
		//$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'ecommerce-index.js');
		
		$this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'table-editable.js');
		//if($this->template->_action='add') $this->add_fjs ( ASSETS_ADMIN_PAGES_SCRIPTS.'form-wizard.js');
		
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
	   
    public function action_index(){    
        $modelCustomer = new Model_Customer();
        
        $pagination = Pagination::factory(array(
  		'total_items'    => $modelCustomer->count(),
  		'items_per_page' => 1,
        ));
        $customer = $modelCustomer->getList($pagination);
        $page_links = $pagination->render();
        
        $this->template->content= View::factory('customer/index')
                                    ->set('customer',$customer)
                                    ->bind('page_links',$page_links);
    }    
    public function action_add(){
        $Model = new Model_Customer();
                
        if($this->request->post()){
            $validate = new Validation($_POST);
            $validate->rule('nazwa', 'not_empty')
                     ->rule('nip', 'not_empty')
					 ->rule('regon', 'not_empty');
            
            if($validate->check()){
                $Model->add($_POST);
                $success = "Nowy klient zosta� utworzony";
            }else{
                $error = $validate->errors('msg');
            }
        }
        $this->template->content = View::factory('Customer/add')
                                        ->bind('success',$success)
                                        ->bind('error',$error);;       
    } 
    public function action_delete(){        
        $id = $this->request->param('id');
        $modelCustomer = new Model_Customer();
        $modelCustomer->delete($id);
        $this->request->redirect('Customer/index');
    } 
    
    public function action_edit(){   
        $id = $this->request->param('id');
        $modelCustomer = new Model_Customer();
        $Customer = $modelCustomer->get($id);
        
        if($this->request->post()){
            
            $validate = new Validation($_POST);
            $validate->rule('nazwa', 'not_empty')
                     ->rule('nip', 'not_empty')
					 ->rule('regon', 'not_empty');
            
            if($validate->check()){
                $modelCustomer->update($id,$_POST);
                $success = "Dane klienta zosta�y poprawnie zmienione";
            }else{
                $error = $validate->errors('msg');
            }
            $Customer=$_POST;
        }
   
        $this->template->content = View::factory('Customer/edit')
                                   ->set('Customer',$Customer)
                                   ->bind('success',$success)
                                   ->bind('error',$error);           
        
    }    
    public function after(){     
        parent::after();
    }	
	
	public function action_add_user() {
		
		
	}
	
	public function action_users() {
		
		
	}
	
	public function action_search() {
		
		
	}
	
	public function action_divisions() {
		
		
	}
}
