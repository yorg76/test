<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-layers"></i>Kategorie magazynowania
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
									<button class="btn green" onClick="javascript:window.location='/admin/storagecategory_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="storagecategories_list">
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
							<?php foreach ($storagecategories as $storagecategory):?>
							<tr>
								<td>
									 <?php echo $storagecategory->name;?>
								</td>
															
								<td>
									 <?php echo $storagecategory->description;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow margin-bottom" onClick="javascript:window.location='/admin/storagecategory_edit/<?php echo $storagecategory->id ;?>';"><i class="icon-layers"></i> Edytuj</button>
											<button class="btn btn-xs red margin-bottom" onClick="javascript:window.location='/admin/storagecategory_delete/<?php echo $storagecategory->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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