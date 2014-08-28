<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-list-alt"></i>Listy dokumentów
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/warehouse_add/<?php echo $customer->id; ?>'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="customer_users_list">
							<thead>
							<tr>
								<th>
									 Nazwa
								</th>							
								<th>
									 Opis
								</th>
								<th>
									 Opcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($warehouses as $warehouse):?>
							<tr>
								<td>
									 <?php echo $warehouse->name;?>
								</td>
															
								<td>
									 <?php echo $warehouse->description;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-sm yellow division-edit margin-bottom" onClick="javascript:window.location='/warehouse/warehouse_edit/<?php echo $user->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-sm red division-delete margin-bottom" id="<?php echo $warehouse->id ;?>"><i class="fa fa-recycle"></i> Usuń</button>
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