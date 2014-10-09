<?php defined('SYSPATH') OR die('No direct script access.');?>
<?php

setlocale(LC_MONETARY, 'pl_PL');
$stand_area_id = 11;

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

<body style="padding:10px;">
<div class="invoice-logo-space" style="width:780px;">
	<img src="<?php echo ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" style="width:780px;">
</div>
<div class="invoice_outline" style="width:780px; padding-top:80px;">
<?php else: ?>
<div class="invoice-logo-space">
	<img src="<?php echo DOCROOT.ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" >
</div>
<div class="invoice_outline" style="width:780px; padding-top:80px;">
<?php endif;?>
  <table style="width:780px;">

		<tr>
			<th class="vert_align_top  text_left" style="width:70%;">

				<strong class="big_text">Faktura VAT</strong> 
				<br />
				<strong class="medium_text"><?php echo $invoice->nr?></strong>

			</th>

			<td class="vert_align_top text_right" style="width:30%;">

				<strong class="medium_text"></strong>
				<br />	<br />

				Wystawiono dnia: <?php echo date("d/m/Y"); ?>, Warszawa	<br />			
				Data sprzedaży: <?php echo date("d/m/Y", strtotime($invoice->create_date)); ?>, Warszawa <br />


			</td>
		</tr>
	</table>


	<table   class="seller_buyer" style="width:780px;">
		<tr>
			<td style="width:70%"  class="vert_align_top">

				<strong>Sprzedający:</strong><br />

				Medical Advisors sp. z.o.o<br>
				05-532 Baniocha, ul. Łubińska 14<br>
				NIP: 123-121-08-67<br>

			</td>

			<td  style="width:30%"  class="vert_align_top">


				<strong>Nabywca:</strong><br />
				<?php echo $invoice->customer->name ?><br />
				<?php echo $invoice->customer->address ?><br />
				NIP: <?php echo $invoice->customer->nip ?><br />
				<br>

			</td>
		</tr>
	</table>


	<table   class="main_inv_table" style="width:780px;">

		<thead>
			<tr>
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
			
			foreach($elements as $element): 

			?>
			<tr>
				<td style="text-align:center;">
				    <?php echo $lp; ?>		
				</td>
				<td>
				    <?php echo $element->name ?>
				</td>
				<td class="text_center">
				    <?php if($element->stand_id != NULL) echo 1;
				    elseif($element->catering_id != NULL ) echo $catering_count = $element->catering->stand_area_catering->where('stand_area_id','=',$stand_area_id)->find()->count;
				    else echo $promo_count = $element->warehouse->where('customer_id','=',$element->invoices->customer_id)->stand_area_products->where('stand_area_id','=',$stand_area_id)->find()->count; ?>
				</td>
				<td class="text_right">
				    <?php 
				    echo Pricetable::money($element->netto);
				     ?>
				</td>
				<td class="text_right">
				    <?php 
				    echo Pricetable::money($element->brutto);
				    ?>
				</td>
				<td class="text_right">
				    <?php echo $element->vat ?>%
				</td>
				<td class="text_right">
				    <?php
					echo Pricetable::money($element->brutto - $element->netto); 
					$sum_tax += $element->brutto - $element->netto; 
				    ?>

				</td>
				<td class="text_right">
				    <?php if($element->stand_id != NULL) {
					echo Pricetable::money($element->brutto);
					$sum_netto += $element->netto;
					$sum_brutto += $element->brutto;					
				    } elseif($element->catering_id != NULL ) {
					echo money_format('%!n PLN',$element->brutto);
					$sum_netto += $element->netto;
					$sum_brutto += $element->brutto;					

				    } else {
					echo Pricetable::money($element->brutto); 
					$sum_netto += $element->netto;
					$sum_brutto +=$element->brutto;					

				    }
				    ?>
					
				    
				</td>
			</tr>
			<?php $lp++; ?>
			<?php endforeach ?>

			<tr class="no_border">
				<td></td>
				<td></td>
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
				Forma płatności: Przelew (<?php echo $invoice->payment_day ?> dni)  <br />
				Termin płatności: <?php echo date("d/m/Y", strtotime($invoice->deadline)); ?> 	<br />
				<br />

				<p style="width:300px;"> Nazwa banku: <?php echo $invoice->customer->bank ?> </p><br />

			</td>

		</tr>
	</table>

	<br /><br /><br /><br />

	<table  class="seller_buyer" style="width:780px; text-align:center;">
		<tr>
			<td class="text_center half_width">
				<i>.............................</i><br />
				Osoba uprawniona do <br />
				wystawienia faktury VAT:<br />
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
<?php if($html==TRUE): ?>
	<table  style="width:780px; height:50px;">
<?php else: ?>
	<table  style="width:780px; height:50px;">
<?php endif; ?>
	
		<tr>
			<td style="width:50%;" class="text_center">
				Medical Advisors sp. z o.o.
						</td>

		</tr>

	</table>			


</div>

<?php if($html==TRUE): ?>
<!-- invoice_outline -->
</body>
</html>
<?php endif; ?>