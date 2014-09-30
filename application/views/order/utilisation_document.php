<div class="invoice">
				<div class="row invoice-logo">
					<div class="invoice-logo-space">
						<img src="<?php echo DOCROOT.ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" >
					</div>

					<div class="col-xs-8">
						<p>Dokument zlecenia utlizacji pozycji: <span class="muted"> <?php echo $order->id; ?> / <?php echo date('d-m-Y',strtotime($order->order->create_date)); ?></span>
						</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-2">
						<h3>Klient:</h3>
						<ul class="list-unstyled">
							<li>
								<strong>Nazwa: </strong> <?php echo $customer->name; ?>
							</li>
							<li>
								<strong>NIP: </strong><?php echo $customer->nip; ?>
							</li>
							<li>
								<strong>REGON: </strong><?php echo $customer->regon; ?>
							</li>
							<li>
								<strong>Adres: </strong><br /><?php echo $address->street ." ".$address->number. "/".$address->flat ; ?>
							</li>
							<li>
								 <?php echo $address->postal.", ".$address->city; ?>
							</li>														
						</ul>
					</div>
					<div class="col-xs-4" style="width:200px;">
						<h3>Zlecenie:</h3>
						<ul class="list-unstyled">
							<li>
								 <strong>Typ: </strong><?php echo $order->order->type;?>
							</li>
							<li>
								 <strong>Magazyn: </strong><?php echo $order->order->warehouse->name;?>
							</li>
							<li>
								 <strong>Dział: </strong><?php echo $order->order->division->name;?>
							</li>
							<li>
								 <strong>Ilość pozycji: </strong><?php echo $order->order->boxes->count_all();?>
							</li>
							<li>
								 <strong>Data odbioru: </strong><?php echo $order->order->pickup_date;?>
							</li>
						</ul>
					</div>
					<div class="col-xs-4 invoice-payment">
						<h3>Adres odbioru:</h3>
						<ul class="list-unstyled">
							<li>
								<strong>Adres: </strong><br /><?php echo $order->order->address->street ." ".$order->order->address->number. "/".$order->order->address->flat ; ?>
							</li>
							<li>
								 <?php echo $order->order->address->postal.", ".$order->order->address->city; ?>
							</li>													
							<li>
								 <?php echo $order->order->address->country?>
							</li>													
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-hover" style="border:1px solid lightgrey; padding:5px;">
						<thead>
						<tr>
							<th style="border:1px solid lightgrey; padding:5px;">
								 #
							</th>
							<th class="hidden-480"  style="border:1px solid lightgrey; padding:5px;">
								 Opis
							</th>
							<th class="hidden-480"  style="border:1px solid lightgrey; padding:5px;">
								 Kategoria
							</th>
							<th class="hidden-480" style="border:1px solid lightgrey; padding:5px;">
								 Data przechowywania
							</th>
							<th class="hidden-480" style="border:1px solid lightgrey; padding:5px;">
								 Data utylizacji
							</th>
							
						</tr>
						</thead>
						<tbody>
						
						<?php foreach ($order->order->boxes->find_all() as $ord):?>
						
						<tr>
							<td  style="border:1px solid lightgrey; padding:5px;">
								 <?php echo $ord->id; ?>
							</td>
							<td  style="border:1px solid lightgrey; padding:5px;">
								 <?php //echo $ord->box_description; ?>
							</td>
							<td class="hidden-480"  style="border:1px solid lightgrey; padding:5px;">
								 <?php echo $ord->storagecategory->name; ?>
							</td>
							<td class="hidden-480"  style="border:1px solid lightgrey; padding:5px;">
								 <?php echo date('d-m-Y',strtotime($ord->date_to)); ?>
							</td>
							<td class="hidden-480"  style="border:1px solid lightgrey; padding:5px;">
								 <?php echo date('d-m-Y'); ?>
							</td>
						</tr>
						<?php endforeach;?>
						</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<div class="well">
							<center>
								<?php echo QRBarcode::encode($order->id);?>
							</center>
						</div>
					</div>
					<div class="col-xs-6 invoice-block">
						<ul class="list-unstyled amounts">
							<li>
								<strong>Suma zamówienia:</strong> $9265
							</li>
							<li>
								<strong>VAT:</strong> -----
							</li>
							<li>
								<strong>Suma brutto:</strong> $12489
							</li>
						</ul>
					</div>
				</div>
				<hr>
				<div class="row">
					<p>Informacja: 
					<i>
						Niniejszy dokument po otrzymaniu należy podpisać a jego elektorniczną wersję przesłać na adres ............... lub zamieścić w systemie przy zamówieniu którego dotyczy. Nie zamieszczenie
						dokumentu będzie skutkować brakiem finalizacji zamówienia utlizacji.
					</i> 
					</p>
				</div>
				<pagebreak />
					<?php foreach ($order->order->boxes->find_all() as $ord):?>
						<hr>
							Pozycja: <?php echo $ord->id; ?> - <?php echo "Dodać opis pudła"; ?>
						<hr>
						<div style="text-align:center;">
							<?php echo QRBarcode::factory($ord->id."/".$ord->storagecategory->id."/".$ord->date_to,500)->render();?>
						</div>
					<pagebreak />
					<?php endforeach;?>
				
			</div>