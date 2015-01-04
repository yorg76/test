<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
class Controller_Barcode extends Controller_Welcome {



	public function action_get()
	{
		if(intval($this->request->param('id')) > 0) {
			Barcode::generate_barcode($this->request->param('id'));
		}
	}
	
	public function after()
	{
		if( intval($this->request->param('id')) > 0) {
			$this->response->headers('Content-Type','image/gif');
			parent::after();
		}
	}
}

