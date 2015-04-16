<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					

					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Klienci
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
									<button class="btn green" onClick="javascript:window.location='/admin/customer_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="customers_list">
							<thead>
							<tr>
								<th>
									 Nazwa
								</th>
								<th>
									 NIP
								</th>
								<th>
									 REGON
								</th>
								<th>
									KOD
								</th>
								<th>
									 Liczba użytkowników
								</th>
								<th>
									 Opcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($customers as $customer):?>
							<tr>
								<td>
									 <?php echo $customer->name;?>
								</td>
								<td>
									 <?php echo $customer->nip;?>
								</td>
								<td>
									 <?php echo $customer->regon;?>
								</td>
								<td>
									 <?php echo $customer->code;?>
								</td>
								<td class="center">
									 <?php echo $customer->users->count_all();?>
								</td>
								<td>
									<?php if($customer->code != 'DEFAULT'):?>
									<div class="margin-bottom-5">
											
											<button class="btn btn-xs yellow customer-edit margin-bottom" onClick="javascript:window.location='/admin/customer_edit/<?php echo $customer->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs blue customer-edit margin-bottom" onClick="javascript:window.location='/admin/customer_users/<?php echo $customer->id ;?>';"><i class="fa fa-group"></i> Użytkownicy</button>
											<button class="btn btn-xs red customer-delete margin-bottom" id="<?php echo $customer->id ;?>" ><i class="fa fa-recycle"></i> Usuń</button>
									</div>
									<?php endif;?>
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