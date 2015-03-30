<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @author     Maciej Kowalczyk - Tepfer <maciekk@bsdterminal.pl>
 * @copyright  BSDterminal 2014
 * @version    1.0
 */
 
class Task_ProcessMonthlyInvoices extends Minion_Task {
	
	protected $_options = array(
			'id' => '0',
	);
	
	public function sendEmail($params) {
	
		$log=Kohana_Log::instance();
	
		$email = Email::factory($params['subject']);
	
		$message_template = View::factory('templates/email_template');
		$title = $params['subject'];
	
		$message_template->bind('title', $title);
		$message_template->bind('email_title', $params['email_title']);
		$message_template->bind('email_info', $params['email_info']);
		$message_template->bind('email_content', $params['email_content']);
	
		$logo = $email->embed(DOCROOT.ASSETS_ADMIN_LAYOUT_IMG."logo-big.png");
		$social_facebook= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_facebook.png");
		$social_twitter= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_twitter.png");
		$social_googleplus= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_googleplus.png");
		$social_linkedin= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_linkedin.png");
		$social_rss= $email->embed(DOCROOT.ASSETS_ADMIN_PAGES_MEDIA . "email/social_rss.png");
	
		$message = $message_template->render();
		$message = str_replace("logo.png", $logo, $message);
		$message = str_replace("social_facebook.png", $social_facebook, $message);
		$message = str_replace("social_twitter.png", $social_twitter, $message);
		$message = str_replace("social_googleplus.png", $social_googleplus, $message);
		$message = str_replace("social_linkedin.png", $social_linkedin, $message);
		$message = str_replace("social_rss.png", $social_rss, $message);
	
		if(isset($params['attachments']) && is_array($params['attachments'])) {
			foreach ($params['attachments'] as $attachment) {
				$email->attach_file($attachment);
			}
		}
	
		$email->message($message, 'text/html');
		
		$email->to($params['email'],$params['firstname']." ".$params['lastname']);
		
		$conf = Kohana::$config->load('email')->as_array();
		
		$email->from($conf['options']['fromemail'],"System magazynowy");
			
		try {
			if($email->sign()->send()) $log->add(Log::DEBUG,"Success: User email sent\n");
			else $log->add(Log::ERROR,"Error: User email not sent\n");
		}catch (Exception $e) {
			$log->add(Log::ERROR,"Error: User email not sent".$e->getMessage()."\n");
		}
	}
	
	public function _execute(array $params) {
		$customers=ORM::factory('Customer')->find_all();
		
		foreach($customers as $customer) {
			
			echo "Invoice for ".$customer->name." processed \n\n";
			
			$this->generateInvoice(array('id'=>$customer->id));
		}
	}
	
	public function generateInvoice(array $params) {
		
		$log=Kohana_Log::instance();
		
		$id =  $params['id'];
		
		if($id > 0) {
			$customer = Customer::instance($id);
			$invoice = $customer->generateMonthlyInvoice();
			
			$customer_divisions= $customer->customer->divisions->find_all();
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
			
			if($customer->customer->loaded()) {
				
				$user = ORM::factory('User')->where('username','=','admin')->find();
				
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
				
				$document_filename=time()."-".$user->id."-".$customer->customer->id."-".$invoice->id.".pdf";
				
				$template->bind_global('html', $html);
				$template->bind_global('invoice', $invoice);
				$template->bind_global('box_quantity', $boxes_in_wh);
				$template->bind_global('customer', $customer);
				
				$pdf_file = $template->write_to_disk(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename);
				$pdf = EasyRSA::signFile(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename);
				
				$pdf->Output(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename,'F');
				
				$who_get_notified = $customer->customer->users->where('id','IN',DB::expr('(SELECT user_id FROM user_rights WHERE get_monthly_email=1)'))->find_all();

				foreach ($who_get_notified as $email_user) {
					$paramse['subject']="Nowa Faktura VAT w systemie Archiwum depozytowe";
					$paramse['email_title'] = "Nowa Faktura VAT w systemie Archiwum depozytowe";
					$paramse['email_info'] = "W załączniku znajdziesz dokument PDF z fakturą VAT.";
					$paramse['email_content'] = "<p> Kwota netto: ".Pricetable::money($invoice->amount)."</p>";
					$paramse['email_content'] .= "<p> Kwota brutto: ".Pricetable::money($invoice->amount*VAT)."</p>";
					$paramse['email_content'] .= "<p> Termin płatności: ".$invoice->payment_date."</p>";
					$paramse['attachments'] = array(APPPATH.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR.$document_filename);
								
					$paramse['email'] = $email_user->email;
					$paramse['firstname'] = $email_user->firstname;
					$paramse['lastname']= $email_user->lastname;
					
					$this->sendEmail($paramse);
				}			
				
				$log->add(Log::INFO, 'Faktura wygenerowana.');
				
			}else {
				$log->add(Log::ERROR, 'Faktura nie wygenerowana, klient nie znaleziony.');
			}
		}else {
			$log->add(Log::ERROR, 'Faktura nie wygenerowana, klient nie znaleziony.');
		}
	}	
}
