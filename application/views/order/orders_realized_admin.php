<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-shopping-cart"></i>Zamówienia zrealizowane
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
												
							<table class="table table-striped table-hover table-bordered" id="orders_realized_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
								<th>
									Data
								</th>
								<th>
									 Typ
								</th>
								<th>
									Klient
								</th>
								<th>
									Data odbioru / dostarczenia
								</th>
								<th>
									Status
								</th>
								<th>
									Adres
								</th>								
								<th>
									 Opcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($orders as $order):?>
							<tr>
								<td>
									 <?php echo $order->id;?>
								</td>
								<td>
									 <?php echo $order->create_date;?>
								</td>								
								<td>
									 <?php echo $order->type;?>
								</td>
								<td>
									<?php echo $order->user->customer->name;?>
								</td>
								<td>
									<?php echo $order->pickup_date;?>
								</td>
								<td>
									 <?php echo $order->status;?>
								</td>			
								<td>
									 <?php echo $order->address->street;?> <?php echo $order->address->number;?> / <?php echo $order->address->flat;?> <?php echo $order->address->city;?>, <?php echo $order->address->postal;?>
								</td>											
								<td>
								<div class="margin-bottom-5">

											<button class="btn btn-xs purple order-details margin-bottom" id="order_details_<?php echo $order->id?>" ><i class="glyphicon glyphicon-info-sign"></i> Szczegóły</button> <br />
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
		</div>
	</div>
