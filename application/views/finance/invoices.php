<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-inbox"></i>Faktury
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
												
							<table class="table table-striped table-hover table-bordered" id="invoices_list">
							<thead>
							<tr>
								<th>
									 Numer
								</th>
								<th>
									 Data wystawienia
								</th>
								<th>
									 Data sprzedaży
								</th>
								<th>
									 Dział
								</th>
								<th>
									 Kwota netto
								</th>
								<th>
									 Kwota brutto
								</th>
								<th>
									 PDF
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($invoices as $invoice):?>
							<tr>
								<td>
									 <?php echo $invoice->number; ?>
								</td>
								<td>
									 <?php echo $invoice->invoice_date; ?>
								</td>
								<td>
									 <?php echo $invoice->sale_date; ?>
								</td>			
								<td>
									 <?php echo $invoice->division->name; ?>
								</td>			
								<td>
									 <?php echo $invoice->amount; ?>
								</td>			
								<td>
									 <?php echo $invoice->amount * VAT; ?>
								</td>
								<td>
									<a href="<?php echo $invoice->invoice_file; ?>" class="btn btn-xs red margin-bottom" ><i class="fa fa-file-pdf-o"></i> Pobierz plik</a> <br />
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
