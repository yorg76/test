<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Task_SyncSubiekt extends Minion_Task {
	
	protected $_options = array(
			'id' => '0',
	);
		
	public function _execute(array $params) {
		
		 
		$customers=ORM::factory('Customer')->find_all();
		
		$gt = new COM("Insert.gt") or die("Cannot create an InsERT GT object");
		$gt->Produkt = 1;
		$gt->Serwer = "SQL-SERWER\INSERTGT";
		$gt->Baza = "ARCHIWUM";
		$gt->Autentykacja = 1;
		$gt->Uzytkownik = "sa";
		$gt->UzytkownikHaslo = "gt";
		$gt->Operator = "Szabelska Halina";
		$gt->OperatorHaslo = "gt";
		
		$subiekt = $gt->Uruchom(2,4);
		
		foreach($customers as $customer) {
			
			$boxes_storage_price = (float) $customer->pricetables->where('active','=',1)->find()->boxes_storage;			
			
			$monthly_invoice = $customer->invoices->where(DB::expr('MONTH(invoice_date)'), '=', date('m'))->and_where('order_id', '=', NULL)->find();
			
			if(!$monthly_invoice->loaded() && $customer->nip != "" && $subiekt->Kontrahenci->Istnieje($customer->nip)) {
				
				$kontrahent = $subiekt->Kontrahenci->Wczytaj($customer->nip);
				
				echo "Customer ".$customer->name." found in Subiekt - processing monthly invoice \n\n";
				
				$product_name = "ARCHIDOX".($customer->id+10000);
				
				$customer_divisions= $customer->divisions->find_all();
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
					
				try {
					$usluga=$subiekt->TowaryManager->WczytajTowar($product_name);
				
					$invoice = $subiekt->SuDokumentyManager->DodajFS();
				
					$invoice->KontrahentID = $kontrahent->Identyfikator;

					$oPoz = $invoice->Pozycje->Dodaj($usluga->Identyfikator);
					$oPoz->IloscJm = $boxes_in_wh;
					$invoice->Rozliczony = FALSE;
					$invoice->Zapisz();
					
					$invoice_file =str_replace(array("/","\\\\"),array("\\","\\"),PDF.DIRECTORY_SEPARATOR).md5($invoice->Identyfikator).".pdf";
					
					echo "Invoice saved to ".$invoice_file."\n";
					
					$invoice->DrukujDoPliku($invoice_file,0);
					
					$upload_response = Request::factory('http://b2b.archiwumdepozytowe.pl:8080/api/uploadInvoice',array('follow' => TRUE))
								->method(Request::POST)
								->body(array("invoice"=>"@".$invoice_file))
								->execute();
					
					$sum = $boxes_in_wh * $boxes_storage_price;
					
					if($upload_response->status() == '200' ) {
						$sign_response = Request::factory('http://b2b.archiwumdepozytowe.pl:8080/api/signInvoice',array('follow' => TRUE))
						->method(Request::POST)
						->post('invoice_file',md5($invoice->Identyfikator).".pdf")
						->execute();
						
						if($sign_response->status() == '200' ) {
							
					
							$invoice_ax = Invoice::instance();
							$invoice_ax->invoice->customer_id=$customer->id;
							$invoice_ax->invoice->number=$invoice->NumerPelny;
							$invoice_ax->invoice->pricetable_id = $customer->pricetables->where('active','=',1)->find()->id;
							$invoice_ax->invoice->amount = $sum;
							$invoice_ax->invoice->invoice_file=str_replace(array(DOCROOT,"/"),array("","\\"),str_replace(array("/","\\\\"),array("\\","\\"),PDF.DIRECTORY_SEPARATOR).md5($invoice->Identyfikator).".pdf");
							$invoice_ax->invoice->invoice_date = date('Y-m-d');
							$invoice_ax->invoice->sale_date = date('Y-m-d');
							$invoice_ax->invoice->payment_date =date('Y-m-d', strtotime("+14 days"));
							
							$invoice_ax->invoice->save();
						}
					}else {
						echo "File not uploaded to server so it will not be processed";
					}
				}catch(Exception $e) {
					$usluga = $subiekt->TowaryManager->DodajUsluge();	
					$usluga->Symbol  = $product_name;
					$usluga->Nazwa  = iconv("utf-8","windows-1250","Magazynowanie pudeł");
					$usluga->Opis  = iconv("utf-8","windows-1250","Magazynowanie pudeł Archidox - ".$customer->name);
					$usluga->Aktywny = 1;
					$usluga->CenaKartotekowa = $boxes_storage_price;
					$usluga->PrzeliczCenyWgCenyKartotekowej();
					
					if($usluga->Zapisz()) {
				
						$this->_execute();
					}
				}
			}elseif($monthly_invoice->loaded()){
				echo "Invoice processes so it will not be processed again \n\n";
			}
		}
	}
}
