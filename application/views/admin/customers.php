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
								<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a>
							</div>
						</div>
						<div class="portlet-body">
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
									 <?php echo $customer['nazwa'] ;?>
								</td>
								<td>
									 <?php echo $customer['nip'] ;?>
								</td>
								<td>
									 <?php echo $customer['regon'] ;?>
								</td>
								<td class="center">
									 <?php echo count($customers) ;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-sm yellow customer-delete margin-bottom" onClick="javascript:window.location='/admin/customer_delete/<?php echo $customer['id'] ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
											<button class="btn btn-sm yellow customer-edit margin-bottom" onClick="javascript:window.location='/admin/customer_edit/<?php echo $customer['id'] ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-sm yellow customer-edit margin-bottom" onClick="javascript:window.location='/admin/customer_users/<?php echo $customer['id'] ;?>';"><i class="fa fa-group"></i> Użytkownicy</button>
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