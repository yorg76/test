<div class="invoice">
				<div class="row invoice-logo">
					<div class="invoice-logo-space">
						<img src="<?php echo DOCROOT.ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" >
					</div>

					<div class="col-xs-8">
						<p>Dokumenty do zlecenia numer: <span class="muted"> <?php echo $order->id; ?> / <?php echo date('d-m-Y',strtotime($order->order->create_date)); ?></span>
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
								 <strong>Ilość pudeł: </strong><?php echo $order->order->quantity;?>
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
				
				<hr>
				<div class="row">
					<p>Klauzula: 
					<i>
						Tutaj powinna znajdować się klauzula informująca o przeznaczeniu dokumentu, albo i nie powinna tutaj się znadować taka kluzula, tego nie wiem ale 
						pewnie się kiedyś dowiem.
					</i> 
					</p>
				</div>
				<pagebreak />
					<?php foreach ($documents as $document):?>
						<hr>
							Dokument: <?php echo $document->id; ?> - <?php echo $document->name; ?>
						<hr>
						<div style="text-align:center;">
				
							<?php if ($document->files->count_all() >  0):?>
								<?php foreach($document->files->find_all() as $fl):?>
									<div id="tab_2-<?php echo $fl->id;?>" class="tab-pane">
									<?php if($fl->type = 'scan'):?>
										<img src="/<?php echo str_replace(array(DOCROOT,"\\"),array("","/"),$fl->file);?>" style="width:800px;"/>
									<?php endif;?>
									</div>
									<pagebreak />
								<?php endforeach;?>
							<?php endif;?>
						</div>
					<pagebreak />
					<?php endforeach;?>
				
			</div>
