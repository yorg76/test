<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
class Controller_Search extends Controller_Welcome {


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
	
	public function action_index()
	{
		
		$results=array();
		$results['data']=array();
		$per_page=10;
		$start_page=1;
		
		if($this->request->method()===HTTP_Request::POST) {
			$query = $_POST['query'];
			
			$results['query']=$query;
			$results['count']=0;
			
			$results['count'] +=  ORM::factory('Box')->where('id', '=', $query)->count_all();
			
			$boxes = ORM::factory('Box')->where('id', '=', $query)->limit($per_page)->find_all();
			
			$results['count'] +=  ORM::factory('Order')->where('id', '=', $query)->count_all();
			
			$orders = ORM::factory('Order')->where('id', '=', $query)->limit($per_page)->find_all();
			
			$results['count'] +=  ORM::factory('Warehouse')->where('id', '=', $query)->count_all();
				
			$warehouses = ORM::factory('Warehouse')->where('id', '=', $query)->limit($per_page)->find_all();
			
			foreach ($boxes as $box) {
				array_push($results['data'], array('type'=>'Pudło','url'=>'/warehouse/box_view/'.$box->id,'id'=>$box->id));
			}	

			foreach ($orders as $order) {
				array_push($results['data'], array('type'=>'Zamówienie','url'=>'/order/view_order/'.$order->id,'id'=>$order->id));
			}
			
			if(Auth::instance()->logged_in('admin')) {
				foreach ($warehouses as $warehouse) {
					array_push($results['data'], array('type'=>'Magazyn','url'=>'/warehouse/warehouse_view/'.$warehouse->id,'id'=>$warehouse->id));
				}
			}
			
			$this->content->bind('results', $results);
			$this->content->bind('query', $query);
			
			
		}
	}

}

