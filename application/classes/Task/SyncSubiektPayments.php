<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Task_SyncSubiektPayments extends Minion_Task {
	
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
			
			if($customer->nip != "" && $subiekt->Kontrahenci->Istnieje($customer->nip)) {
				$invoices = $customer->invoices->where('payed','=',0)->find_all();	
				
				$kontrahent = $subiekt->Kontrahenci->Wczytaj($customer->nip);
				
				
				echo "Customer ".$customer->name." found in Subiekt - processing invoice payments \n\n";
				
				foreach($invoices as $invoice) {
					
					echo "Processing payments for ".$invoice->number."\n\n";
					
					$payment = $subiekt->Dokumenty->Wczytaj($invoice->number);
					
					try {
						
						$payments = $payment->PodajRozrachunek()->Rozliczenia();
						$payments_sum = 0;
						foreach($payments as $pay) {
							$payments_sum += (float) $pay->Kwota;
						}

						if($payments_sum == $payment->KwotaDoZaplaty) {
							echo "Invoice ".$invoice->number." has been paid \n\n";
							$invoice->payed=1;
							$invoice->update();
						}
						
					}catch(Exception $e) {
						echo "Payment not found\n\n";
					}
					
				}
			}
		}
	}
}
