<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Firmy kurierskie
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<button class="btn green" onClick="javascript:window.location='/admin/shipmentcompany_add/<?php echo $customer->id; ?>'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="customer_shipmentcompanies_list">
							<thead>
							<tr>
								<th>
									Nazwa
								</th>							
								<th>
									Adres
								</th>
								<th>
									Telefon
								</th>
								<th>
									Komentarze
								</th>
								<th>
									Cena
								</th>
								<th>
									Akcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($shipmentcompanies as $shipmentcompany):?>
							<tr>
								<td>
									 <?php echo $shipmentcompany->name;?>
								</td>						
								<td>
									 <?php echo $shipmentcompany->address;?>
								</td>
								<td>
									 <?php echo $shipmentcompany->telephone;?>
								</td>
								<td>
									 <?php echo trim($shipmentcompany->comments);?>
								</td>
								<td>
									 <?php echo Pricetable::money($shipmentcompany->shipping_price);?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow shipmentcompany-edit margin-bottom" onClick="javascript:window.location='/admin/shipmentcompany_edit/<?php echo $shipmentcompany->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
