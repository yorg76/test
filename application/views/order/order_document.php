<div class="invoice">
				<div class="row invoice-logo">
					<div class="invoice-logo-space">
						<img src="<?php echo DOCROOT.ASSETS_ADMIN_LAYOUT_IMG ?>document_logo.jpg" class="img-responsive" alt="" >
					</div>

					<div class="col-xs-5">
						<p>Potwierdzenie zlecenia numer: <span class="muted"> <?php echo $order->id; ?></span>
						</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-2">
						<h3>Klient:</h3>
						<ul class="list-unstyled">
							<li>
								 <?php echo $customer->name; ?>
							</li>
							<li>
								 <?php echo $customer->nip; ?>
							</li>
							<li>
								 <?php echo $customer->regon; ?>
							</li>
						</ul>
					</div>
					<div class="col-xs-4">
						<h3>Zlecenie:</h3>
						<ul class="list-unstyled">
							<li>
								 Drem psum dolor sit amet
							</li>
							<li>
								 Laoreet dolore magna
							</li>
							<li>
								 Consectetuer adipiscing elit
							</li>
							<li>
								 Magna aliquam tincidunt erat volutpat
							</li>
							<li>
								 Olor sit amet adipiscing eli
							</li>
							<li>
								 Laoreet dolore magna
							</li>
						</ul>
					</div>
					<div class="col-xs-4 invoice-payment">
						<h3>Adres odbioru:</h3>
						<ul class="list-unstyled">
							<li>
								<strong>V.A.T Reg #:</strong> 542554(DEMO)78
							</li>
							<li>
								<strong>Account Name:</strong> FoodMaster Ltd
							</li>
							<li>
								<strong>SWIFT code:</strong> 45454DEMO545DEMO
							</li>
							<li>
								<strong>V.A.T Reg #:</strong> 542554(DEMO)78
							</li>
							<li>
								<strong>Account Name:</strong> FoodMaster Ltd
							</li>
							<li>
								<strong>SWIFT code:</strong> 45454DEMO545DEMO
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>
								 #
							</th>
							<th>
								 Item
							</th>
							<th class="hidden-480">
								 Description
							</th>
							<th class="hidden-480">
								 Quantity
							</th>
							<th class="hidden-480">
								 Unit Cost
							</th>
							<th>
								 Total
							</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								 1
							</td>
							<td>
								 Hardware
							</td>
							<td class="hidden-480">
								 Server hardware purchase
							</td>
							<td class="hidden-480">
								 32
							</td>
							<td class="hidden-480">
								 $75
							</td>
							<td>
								 $2152
							</td>
						</tr>
						<tr>
							<td>
								 2
							</td>
							<td>
								 Furniture
							</td>
							<td class="hidden-480">
								 Office furniture purchase
							</td>
							<td class="hidden-480">
								 15
							</td>
							<td class="hidden-480">
								 $169
							</td>
							<td>
								 $4169
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Foods
							</td>
							<td class="hidden-480">
								 Company Anual Dinner Catering
							</td>
							<td class="hidden-480">
								 69
							</td>
							<td class="hidden-480">
								 $49
							</td>
							<td>
								 $1260
							</td>
						</tr>
						<tr>
							<td>
								 3
							</td>
							<td>
								 Software
							</td>
							<td class="hidden-480">
								 Payment for Jan 2013
							</td>
							<td class="hidden-480">
								 149
							</td>
							<td class="hidden-480">
								 $12
							</td>
							<td>
								 $866
							</td>
						</tr>
						</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<div class="well">
							<address>
							<strong>Loop, Inc.</strong><br>
							795 Park Ave, Suite 120<br>
							San Francisco, CA 94107<br>
							<abbr title="Phone">P:</abbr> (234) 145-1810 </address>
							<address>
							<strong>Full Name</strong><br>
							<a href="mailto:#">
							first.last@email.com </a>
							</address>
						</div>
					</div>
					<div class="col-xs-8 invoice-block">
						<ul class="list-unstyled amounts">
							<li>
								<strong>Sub - Total amount:</strong> $9265
							</li>
							<li>
								<strong>Discount:</strong> 12.9%
							</li>
							<li>
								<strong>VAT:</strong> -----
							</li>
							<li>
								<strong>Grand Total:</strong> $12489
							</li>
						</ul>
					</div>
				</div>
			</div>