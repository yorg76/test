<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */

class Customer  {

	public $customer;
	public $id;
	public $name;
	public $nip;
	public $regon;
	public $code;
	public $address;
	public $www;
	public $pricetable;
	public $warehouses;
	public $users;
	public $divisions;
	public $invoices;
	public $street;
	public $flat;
	public $number;
	public $telephone;
	public $city;
	public $postal;
	public $country;
	public $comments;
	public $delivery_addresses;
	public $pickup_addresses;
	
	public static function instance($id=NULL) {
		if($id !== NULL) {
			return new Customer($id);
		}else{
			return new Customer(NULL);
		}
	}
	
	public function __construct($id) {
		
		if($id !== NULL) {
			
			$this->customer = ORM::factory('Customer')->where('id','=',$id)->find();
			$this->address = $this->customer->addresses->where('address_type','=','firmowy')->find();
			
			if($this->address->loaded()==FALSE) {
				$this->address = ORM::factory('Address');
				$this->address->address_type='firmowy';
			}
			
			$this->street = $this->address->street; 
			$this->number = $this->address->number;
			$this->flat = $this->address->flat;
			$this->country=$this->address->country;
			$this->city=$this->address->city;
			$this->postal=$this->address->postal;
			$this->www=$this->customer->www;
			$this->telephone=$this->address->telephone;
			$this->users = $this->customer->users->find();
			$this->divisions = $this->customer->divisions->find();
			$this->warehouses = $this->customer->warehouses->find();
			$this->invoices = $this->customer->invoices->find();
			$this->pricetable = $this->customer->pricetables->where('active','=',1)->find();
			$this->id = $this->customer->id;
			$this->name = $this->customer->name;
			$this->nip = $this->customer->nip;
			$this->regon = $this->customer->regon;
			$this->code = $this->customer->code;
			$this->comments = $this->customer->comments;
			$this->delivery_addresses = $this->customer->addresses->where('address_type','=','wysyłki')->find_all();
			$this->pickup_addresses=$this->customer->addresses->where('address_type','=','odbioru')->find_all();
			
		}else {
			$this->customer = ORM::factory('Customer');
			$this->address = ORM::factory('Address');
			$this->pricetable = ORM::factory('Pricetable');
			
		}
	}
	
	
	public function address() {
			
		return $this->address->street." ".$this->address->number." ".$this->address->flat."\n".$this->address->city.", ".$this->address->postal;
	}
	
	
	public function generateMonthlyInvoice() {
		
		$invoice = Invoice::instance();
		
		$invoice->invoice->customer_id=$this->id;
		
		if($this->customer->pricetables->where('active','=',1)->find()->id == NULL) {
			return false;
		}
			
		$customer_divisions= $this->customer->divisions->find_all();
		$divisions_ids = array();
		$sum = 0;
			
		foreach ($customer_divisions as $div ) {
			array_push($divisions_ids, $div->id);
		}
			
			
			
		if(count($divisions_ids) > 0) {
			$boxes_in_wh=ORM::factory('Box')->where('division_id','IN',$divisions_ids)->and_where('status','=','Na magazynie')->and_where('utilisation_status', '=', 0)->count_all();
		
		}else {
			$boxes_in_wh=0;
		}
			
		$sum = $boxes_in_wh * $this->customer->pricetables->where('active','=',1)->find()->boxes_storage;
		
		$invoice->invoice->pricetable_id = $this->customer->pricetables->where('active','=',1)->find()->id;
		$invoice->invoice->amount = $sum;
		
		$invoice->invoice->invoice_date = date('Y-m-d');
		$invoice->invoice->sale_date = date('Y-m-d');
		$invoice->invoice->payment_date =date('Y-m-d', strtotime("+14 days"));
		
		
		$monthly_invoice = $this->customer->invoices->where(DB::expr('MONTH(invoice_date)'), '=', date('m'))->and_where('order_id', '=', NULL)->find();
		
		if($monthly_invoice->loaded()) {
			
			return $monthly_invoice;
			
		}elseif($invoice->invoice->save()) {
			$invoice->id = $invoice->invoice->id;
			
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap/css/bootstrap.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS."bootstrap-switch/css/bootstrap-switch.min.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."components.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_CSS."plugins.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_LAYOUT_CSS."layout.css");
			$document_css .= file_get_contents(DOCROOT.ASSETS_GLOBAL_PLUGINS.'datatables/plugins/bootstrap/dataTables.bootstrap.css');
			$document_css .= file_get_contents(DOCROOT.ASSETS_ADMIN_PAGES_CSS.'order_document.css');
			$template = View_MPDF::factory('templates/monthly_invoice_template');
			$template->get_mpdf()->SetDisplayMode('fullpage');
			$template->get_mpdf()->WriteHTML($document_css,1);
				
			$html = FALSE;
				
			$document_filename=time()."-".$this->customer->id."-".$invoice->invoice->id.".pdf";
				
			$template->bind_global('html', $html);
			$template->bind_global('invoice', $invoice->invoice);
			$template->bind_global('box_quantity', $boxes_in_wh);
			$template->bind_global('customer', $this);
				
			$pdf_file = $template->write_to_disk(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename);
			$pdf = EasyRSA::signFile(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename);

			
			copy(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename, PDF.DIRECTORY_SEPARATOR.$document_filename);
			
			$invoice->invoice->invoice_file =  str_replace(DOCROOT,"",PDF.DIRECTORY_SEPARATOR.$document_filename);
						
			$invoice->invoice->number = "ARCH/".date('Y-m-d')."/".$invoice->invoice->id;
			
			$invoice->invoice->update();
			return $invoice;
		}else {
			return false;
		}
	}
	
	public function addCompany($params) {
		$log=Kohana_Log::instance();
		
		$this->address->street = $params['street']; 
		$this->address->number = $params['number'];
		$this->address->flat = $params['flat'];
		$this->address->country=$params['country'];
		$this->address->city=$params['city'];
		$this->address->postal=$params['postal'];
		$this->address->telephone=$params['telephone'];
		$this->address->address_type='firmowy';
		
		$this->www=$params['www'];
		$this->name = $params['name'];
		$this->nip = $params['nip'];
		$this->regon = $params['regon'];		
		$this->comments = $params['comments'];
		
		$this->customer->www=$params['www'];
		$this->customer->name = $params['name'];
		$this->customer->nip = $params['nip'];
		$this->customer->regon = $params['regon'];
		$this->customer->comments = $params['comments'];
		
		try {
			Database::instance()->begin();
			if($this->customer->save()) {
				$this->id=$this->customer->id;
				$this->address->customer_id=$this->customer->id;
				
				if($this->address->save() ) {
						$log->add(Log::DEBUG,"Success: Updated company with params:".serialize($params)."\n");
						$division = Division::instance();
						$params = array();
						
						$params['name'] = "Dział ogólny";
						$params['description'] = "Dział ogólny";
						$params['customer_id'] = $this->customer->id;
						$division->addDivision($params);
						
						Database::instance()->commit();				
						return true;
				} else {
					$log->add(Log::ERROR,"Error: Company update failed params:".serialize($params)."\n");
					Database::instance()->rollback();
					return false;
				}
			}else {
				$log->add(Log::ERROR,"Error: Company update failed params:".serialize($params)."\n");
				Database::instance()->rollback();
				return false;
			}
		}catch (Exception $e) {
				Database::instance()->rollback();
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
		
	}


	public function updateCompany($params) {
		
		$log=Kohana_Log::instance();

		$this->address->street = $params['street']; 
		$this->address->number = $params['number'];
		$this->address->flat = $params['flat'];
		$this->address->country=$params['country'];
		$this->address->city=$params['city'];
		$this->address->postal=$params['postal'];
		$this->address->telephone=$params['telephone'];
		$this->address->customer_id=$this->customer->id;
		if(!$this->address->loaded()) $this->address->save(); 
		else $this->address->update();
		$this->www=$params['www'];
		$this->name = $params['name'];
		$this->nip = $params['nip'];
		$this->code = $params['code'];
		$this->regon = $params['regon'];
		$this->comments = $params['comments'];
		$this->customer->www=$params['www'];
		$this->customer->code=$params['code'];
		$this->customer->name = $params['name'];
		$this->customer->nip = $params['nip'];
		$this->customer->regon = $params['regon'];
		$this->customer->comments = $params['comments'];
		
		try {
			if($this->customer->update() && $this->address->update()) {
				$log->add(Log::DEBUG,"Success: Updated company with params:".serialize($params)."\n");
				
				return true;
			} else {
				$log->add(Log::ERROR,"Error: Company update failed params:".serialize($params)."\n");
				
				return false;
			}
		}catch (Exception $e) {
				$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
		
	}


	public function deleteCompany() {
		$log=Kohana_Log::instance();
		$db = Database::instance();
		$db->begin();
		
		try {
			
			foreach($this->customer->addresses->find_all() as $addr) {
				$addr->delete();
			}
			
			foreach($this->customer->pricetables->find_all() as $pricetable) {
				$pricetable->delete();
			}
						
			if($this->customer->delete()) {
				$this->customer=NULL;
				$log->add(Log::DEBUG,"Company has been removed\n");
				$db->commit();
				return true;
			} else {
				$db->commit();
				return false;
			}
			$db->commit();
		}catch (Exception $e) {
			$db->rollback();
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	public function addDeliveryAddress($params) {
		
		$log=Kohana_Log::instance();
		
		$address=ORM::factory('Address');
		
		$params['address_type'] = 'wysyłki';
		$params['customer_id'] = $this->id;
		
		$address->values($params);
		
		try {
			if($address->save()) {
				$log->add(Log::DEBUG,"Success: Added delivery address ".serialize($params)."\n");
				return true;
			} else {
				return false;
			}
		}catch (Exception $e) {
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}

	public function addPickupAddress($params) {
	
		$log=Kohana_Log::instance();
		
		$address=ORM::factory('Address');
		
		$params['address_type'] = 'odbioru';
		$params['customer_id'] = $this->id;
		
		$address->values($params);
		
		try {
			if($address->save()) {
				$log->add(Log::DEBUG,"Success: Added pickup address ".serialize($params)."\n");
				return true;
			} else {
				return false;
			}
		}catch (Exception $e) {
			$log->add(Log::ERROR,'Exception:'.$e->getMessage()."\n");
		}
		return;
	}
	
	
	public function addAddress() {
		
		try {
			if($this->customer->add('addresses',$this->address)) {
				return true;
			} else {
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
		}
		return;
	}
	
	public function deleteAddress() {
	
		return;
	}
	
	public function addDivision($division) {
	
		try {
			if($this->customer->add($division)) {
				return true;
			} else {
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
		}
		return;
		
	}
	
	public function deleteDivision() {
	
		return;
	}
	
	public function addWarehouse($warehouse) {
		try {
			if($this->customer->add($warehouse)) {
				return true;
			} else {
				return false;
			}
		}catch (Exception $e) {
			return $e->getMessage();
		}
		return;
	}
	
	public function deleteWarehose() {
	
		return;
	}


}


?>
