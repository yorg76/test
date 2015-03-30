<?php defined('SYSPATH') OR die('No direct script access.');?>
<?php

setlocale(LC_MONETARY, 'pl_PL');
setlocale(LC_ALL, 'pl_PL');

?>

<?php if($html==TRUE): ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta charset="UTF-8">
	<link type="text/css" href="/public/css/invoices/invoice.css" rel="stylesheet" />
</head>
<body style="padding:10px;">

<div class="invoice-logo-space" style="width:780px;">
	<img src="<?php echo ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" style="width:780px;">
</div>

<div class="invoice_outline" style="width:780px; padding-top:80px;">

  <table style="width:780px;">

		<tr>
			<th class="vert_align_top  text_left" style="width:70%;">

				<strong class="big_text">Faktura VAT</strong> 
				<br />
				<strong class="medium_text"><?php echo $invoice->number?></strong>

			</th>

			<th class="vert_align_top text_right" style="width:30%;">

				<strong class="medium_text"></strong>
				<br />	<br />

				Wystawiono dnia: <?php echo date("d/m/Y", strtotime($invoice->invoice_date)); ?>, Warszawa	<br />			
				Data sprzedaży: <?php echo date("d/m/Y", strtotime($invoice->sale_date)); ?>, Warszawa <br />


			</th>
		</tr>
	</table>


	<table   class="seller_buyer" style="width:780px;">
		<tr>
			<th style="width:70%"  class="vert_align_top">

				<strong>Sprzedający:</strong><br />

				Archiwumdepozytowe sp. z.o.o<br>
				20-207 Lublin, ul. Turystyczna 9<br>
				NIP: <?php echo NIP;?><br>

			</th>

			<th  style="width:30%"  class="vert_align_top">


				<strong>Nabywca:</strong><br />
				<?php echo $customer->name ?><br />
				<?php echo $customer->address() ?><br />
				NIP: <?php echo $customer->nip ?><br />
				<br>

			</th>
		</tr>
	</table>


	<table   class="main_inv_table" style="width:780px;">

		<thead>
			<tr style="border-bottom: 1px solid grey;">
				<th class="width1">
					Lp.
				</th>
				<th class="width4 text_left">
					Produkt
				</th>
				<th class="width2 text_center">
					Ilość
				</th>
				<th class="width3 text_right">
					Cena netto
				</th>
				<th class="width3 text_right">
					Cena brutto
				</th>
				<th class="width2 text_right">
					VAT %
				</th>
				<th class="width3 text_right">
					Wartość
				</th>
				<th class="width3 text_right">
					Suma brutto
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$lp=1;
			$sum_netto=0;
			$sum_brutto=0;
			$sum_tax=0;
			$elements = array();
			
			?>
			<tr>
				<td style="text-align:center;">
				    <?php echo $lp; ?>		
				</td>
				<td class="text_right">
				    <?php echo "Magazynowanie pudeł miesiąc - ". __(date('F')); ?>
				</td>
				<td class="text_center">
					<?php echo $box_quantity;?>
				</td>
				<td class="text_right">
				    <?php 
				    echo Pricetable::money($invoice->amount);
				     ?>
				</td>
				<td class="text_right">
				    <?php 
				    echo Pricetable::money($invoice->amount*VAT);
				    ?>
				</td>
				<td class="text_right">
				    <?php echo  (VAT-1)	 * 100; ?>%
				</td>
				<td class="text_right">
				    <?php
					echo Pricetable::money($invoice->amount*VAT - $invoice->amount); 
					$sum_tax += $invoice->amount*VAT - $invoice->amount; 
				    ?>

				</td>
				<td class="text_right">
				    <?php 
					echo Pricetable::money($invoice->amount*VAT - $invoice->amount); 
					$sum_netto += $invoice->amount;
					$sum_brutto +=$invoice->amount*VAT;					
				    ?>
					
				    
				</td>
			</tr>
			

			<tr class="no_border">
				<td> </td>
				<td> </td>
				<td> Razem:</td>
				<td  class="text_right">
					<?php echo Pricetable::money($sum_netto); ?>				
				</td>
				<td class="text_right">
					<?php echo Pricetable::money($sum_brutto); ?>
				</td>
				<td>

				</td>
				<td class="text_right">
					<?php echo Pricetable::money($sum_tax); ?>					
				</td>
				<td class="width3 text_right">
					<?php echo Pricetable::money($sum_brutto); ?>
				</td>						
			</tr>

		</tbody>
	</table>





	<table  class="" style="margin-top:20px">
		<tr>
			<td>

				<strong class="medium_text">Do zapłacenia: <?php echo Pricetable::money($sum_brutto); ?>  </strong> <br />
				<br />
				<br />
				Forma płatności: Przelew (14 dni)  <br />
				Termin płatności: <?php echo date("d/m/Y", strtotime($invoice->payment_date)); ?> 	<br />
				<br />

				<p style="width:300px;"> Nazwa banku: <?php echo BANK;?></p><br />

			</td>

		</tr>
	</table>

	<br /><br /><br /><br />

	<table  class="seller_buyer" style="width:780px; text-align:center;">
		<tr>
			<td class="text_center half_width">
				<i>.............................</i><br />
				Osoba uprawniona do <br />
				wystawienia faktury VAT<br />
			</td>

			<td   class="text_center small_text half_width">
				<i>.............................</i><br />
				Podpis osoby upoważnionej<br />
				do odbioru faktury VAT
			</td>

		</tr>
	</table>

						<br>
						<hr>
						<br>
	<table  style="width:780px; height:50px;">
	
		<tr>
			<td style="width:50%;" class="text_center">
				Archiwumdepozytowe sp. z o.o.
						</td>

		</tr>

	</table>			


</div>
</div>
<!-- invoice_outline -->
</body>
</html>
<?php else:?>
<html>
<head>
	
	<link type="text/css" href="/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />	
	<link type="text/css" href="/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" />
	<link type="text/css" href="/public/assets/global/css/components.css" rel="stylesheet" />
	<link type="text/css" href="/public/assets/global/css/plugins.css" rel="stylesheet" />
	<link type="text/css" href="/public/assets/admin/layout/css/layout.css" rel="stylesheet" />
</head>

<body>

<div class="invoice">
				<div class="row invoice-logo">
					<div class="invoice-logo-space">
						<img src="<?php echo DOCROOT.ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" >
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-8" style="width:40%;">
							<strong class="big_text">Faktura VAT <?php echo $invoice->number; ?></strong>
					</div>
							
					<div class="col-xs-4" style="width:50%; text-align:right;">
							Wystawiono dnia: <?php echo date("d/m/Y", strtotime($invoice->invoice_date)); ?>, Warszawa	<br />			
							Data sprzedaży: <?php echo date("d/m/Y", strtotime($invoice->sale_date)); ?>, Warszawa <br />
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-6" style="width:45%;">
						<h3>Sprzedający:</h3>
						<ul class="list-unstyled">
							<li>
								<strong>Nazwa: </strong> Archiwumdepozytowe Sp. z.o.o
							</li>
							<li>
								<strong>NIP: </strong><?php echo NIP; ?>
							</li>
							<li>
								<strong>Adres: </strong>20-207 Lublin, ul. Turystyczna 9
							</li>
						</ul>
					</div>
					<div class="col-xs-6" style="width:45%;">
						<h3>Zamawiający:</h3>
						<ul class="list-unstyled">
							<li>
								<strong>Nazwa: </strong> <?php echo $customer->name; ?>
							</li>
							<li>
								<strong>NIP: </strong><?php echo $customer->nip; ?>
							</li>
							<li>
								<strong>Adres: </strong><?php echo str_replace("<br />", "", $customer->address());?>
							</li>
						</ul>
					</div>
				</div>
				<div class="row" style="height: 400px;">
					<div class="col-xs-12">
						<table class="main_inv_table">
					
							<thead>
								<tr>
									<th class="width1" style="width:10%; border-bottom:1px solid grey;">
										Lp.
									</th>
									<th class="width4 text-left" style="width:30%; border-bottom:1px solid grey;">
										Produkt
									</th>
									<th class="width2 text-center" style="width:10%; border-bottom:1px solid grey;">
										Ilość
									</th>
									<th class="width3 text-right" style="width:10%; border-bottom:1px solid grey;">
										Cena netto
									</th>
									<th class="width3 text-right" style="width:10%; border-bottom:1px solid grey;">
										Cena brutto
									</th>
									<th class="width2 text-right" style="width:10%; border-bottom:1px solid grey;">
										VAT %
									</th>
									<th class="width3 text-right" style="width:10%; border-bottom:1px solid grey;">
										Wartość
									</th>
									<th class="width3 text-right" style="width:10%; border-bottom:1px solid grey;">
										Suma brutto
									</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$lp=1;
								$sum_netto=0;
								$sum_brutto=0;
								$sum_tax=0;
								$elements = array();
								
								?>
								<tr>
									<td style="text-align:center;">
									    <?php echo $lp; ?>		
									</td>
									<td class="text-right" style="text-align:right;">
									    <?php echo "Magazynowanie pudeł miesiąc - ". __(date('F')); ?>
									</td>
									<td class="text_center" style="text-align:center;">
										<?php echo $box_quantity;?>
									</td>
									<td class="text-right" style="text-align:right;">
									    <?php 
									    echo Pricetable::money($invoice->amount);
									     ?>
									</td>
									<td class="text-right" style="text-align:right;">
									    <?php 
									    echo Pricetable::money($invoice->amount*VAT);
									    ?>
									</td>
									<td class="text-right" style="text-align:right;">
									    <?php echo  (VAT-1)	 * 100; ?>%
									</td>
									<td class="text-right" style="text-align:right;">
									    <?php
										echo Pricetable::money($invoice->amount*VAT - $invoice->amount); 
										$sum_tax += $invoice->amount*VAT - $invoice->amount; 
									    ?>
					
									</td>
									<td class="text-right" style="text-align:right;">
									    <?php 
										echo Pricetable::money($invoice->amount*VAT - $invoice->amount); 
										$sum_netto += $invoice->amount;
										$sum_brutto +=$invoice->amount*VAT;					
									    ?>
										
									    
									</td>
								</tr>
								
					
								<tr class="no_border">
									<td class="text-right" style="text-align:right;" colspan="3"><strong> Razem:</strong></td>
									<td class="text-right" style="text-align:right;">
										<strong>
										<?php echo Pricetable::money($sum_netto); ?>
										</strong>				
									</td>
									<td class="text-right" style="text-align:right;">
										<strong>
										<?php echo Pricetable::money($sum_brutto); ?>
										</strong>
									</td>
									<td>
					
									</td>
									<td class="text-right" style="text-align:right;">
										<strong>
										<?php echo Pricetable::money($sum_tax); ?>
										</strong>					
									</td>
									<td class="width3 text-right" style="text-align:right;">
										<strong>
										<?php echo Pricetable::money($sum_brutto); ?>
										</strong>
									</td>						
								</tr>

							</tbody>
						</table>					
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-4" style="width:45%; text-align:center;">
						<ul class="list-unstyled">
						
									<li><strong>Do zapłacenia: <?php echo Pricetable::money($sum_brutto); ?>  </strong></li>
									<li><br/></li>
									
									<li>Forma płatności: Przelew (14 dni) </li>
									<li>Termin płatności: <?php echo date("d/m/Y", strtotime($invoice->payment_date)); ?> </li>
									<li>Nazwa banku: <?php echo BANK;?></li>
						</ul>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-6" style="width:45%; text-align:center;">		
						<p class="text-center" style="text-align:center;">
							<br />
							<br />
							<br />
							<br />
							<i>.............................</i><br />
								Osoba uprawniona do <br />
								wystawienia faktury VAT<br />
						</p>
					</div>
					<div class="col-xs-6" style="width:45%; text-align:center;">		
						<p class="text-center" style="text-align:center;">
							<br />
							<br />
							<br />
							<br />
							<i>.............................</i><br />
							Podpis osoby upoważnionej<br />
							do odbioru faktury VAT
						</p>
					</div>
				</div>
				<hr />				
				<div class="row">
					<div class="col-xs-12">		
						<p class="text-center"> Archiwumdepozytowe sp. z o.o.</p>
					</div>		
				</div>
			</div>
</body>
</html>			
<?php endif; ?>