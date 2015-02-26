<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-inbox"></i>Cenniki
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
									<button class="btn green" onClick="javascript:window.location='/finance/pricetable_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>
								
							<table class="table table-striped table-hover table-bordered" id="prices_list">
							<thead>
							<tr>
								<th>
									Numer
								</th>
								<th>
									Klient
								</th>
								<th>
									Cena jedn. netto
								</th>
								<th>
									Cena jedn. brutto
								</th>
								<th>
									Aktywny
								</th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ($pricetables as $pricetable):?>
							
							<tr>
								<td style="width:10%">
									<?php echo $pricetable->id;?>
								</td>
								<td>
									<?php echo $pricetable->customer->name;?>
								</td>
								<td>
									<p>Odbiór pudeł: <?php echo Pricetable::money($pricetable->boxes_reception);?> pudło.</p>
									<p>Wysłanie pudła: <?php echo Pricetable::money($pricetable->boxes_sending); ?> pudło.</p>
									<p>Magazynowanie: <?php echo Pricetable::money($pricetable->boxes_storage); ?> pudło/miesiąc.</p>
									<p>Skanowanie: <?php echo Pricetable::money($pricetable->document_scan); ?> dokument.</p>
									<p>Kopia: <?php echo Pricetable::money($pricetable->document_copy); ?> dokument.</p>
									<p>Kopia notar.: <?php echo Pricetable::money($pricetable->document_notarial_copy); ?> dokument.</p>
									<p>Zniszczenie pudła: <?php echo Pricetable::money($pricetable->position_disposal); ?> pudło.</p>
								</td>			
								<td>
									<p>Odbiór pudeł: <?php echo Pricetable::money($pricetable->boxes_reception * VAT);?> pudło.</p>
									<p>Wysłanie pudła: <?php echo Pricetable::money($pricetable->boxes_sending * VAT); ?> pudło/miesiąc.</p>
									<p>Magazynowanie: <?php echo Pricetable::money($pricetable->boxes_storage * VAT); ?> pudło.</p>
									<p>Skanowanie: <?php echo Pricetable::money($pricetable->document_scan * VAT); ?> dokument.</p>
									<p>Kopia: <?php echo Pricetable::money($pricetable->document_copy * VAT); ?> dokument.</p>
									<p>Kopia notar.: <?php echo Pricetable::money($pricetable->document_notarial_copy * VAT); ?> dokument.</p>
									<p>Zniszczenie pudła: <?php echo Pricetable::money($pricetable->position_disposal * VAT); ?> pudło.</p>
								</td>	
								<td>
									<?php echo ($pricetable->active == 1 ? 'Tak' : 'Nie');?>
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
		</div>
	</div>
