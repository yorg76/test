<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Działy
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
									<button class="btn green" onClick="javascript:window.location='/customer/division_add/<?php echo $customer->id; ?>'">
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
									 Wirtualne teczki
								</th>
								<th>
									 Opcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($divisions as $division):?>
							<tr>
								<td>
									 <?php echo $division->name;?>
								</td>						
								<td>
									 <?php echo $division->description;?>
								</td>
								<td>
									 <?php echo $division->virtualbriefcases->count_all();?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs green margin-bottom" onClick="javascript:window.location='/customer/division_view/<?php echo $division->id ;?>';"><i class="glyphicon glyphicon-info-sign"></i> Przegląd</button>
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/customer/division_edit/<?php echo $division->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" id="<?php echo $user->id ;?>"><i class="fa fa-recycle"></i> Usuń</button>
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