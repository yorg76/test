<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-shopping-cart"></i>Nowe zamówienia
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body">
												
							<table class="table table-striped table-hover table-bordered" id="orders_new_list">
							<thead>
							<tr>
								<th>
									Numer
								</th>
								<th>
									Data
								</th>
								<th>
									Typ
								</th>
								<th>
									Status
								</th>
								<th>
									Adres dostawy / odbioru
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
									 <?php echo $order->status;?>
								</td>			
								<td>
									<?php echo $order->address->address();?>
								</td>											
								<td>
								<div class="margin-bottom-5">
											<button class="btn btn-xs purple order-details margin-bottom" id="order_details_<?php echo $order->id?>" ><i class="glyphicon glyphicon-info-sign"></i> Szczegóły</button> <br />
<?php if(Auth_ORM::instance()->logged_in('admin') || Auth_ORM::instance()->logged_in('manager')): ?>											
											<?php if($order->status == 'Nowe'):?><button class="btn btn-xs green margin-bottom" id="order_accept_<?php echo $order->id?>"><i class="glyphicon glyphicon-info-sign"></i> Akceptuj</button> <br /> 
											<button class="btn btn-xs yellow order-edit margin-bottom" id="order_edit_<?php echo $order->id?>"><i class="fa fa-user"></i> Edytuj</button> <br />
											<button class="btn btn-xs red order-delete margin-bottom" id="order_delete_<?php echo $order->id?>"><i class="fa fa-recycle"></i> Usuń</button> <br />
											<?php endif;?>
<?php endif;?>
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
