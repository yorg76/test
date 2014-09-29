<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-layers"></i>Magazyny
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
						<button class="btn green"
							onClick="javascript:window.location='/warehouse/warehouse_add/<?php echo $customer->id; ?>'">
							Dodaj <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<table class="table table-striped table-hover table-bordered"
					id="warehouses_list">
					<thead>
						<tr>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Liczba pozycji</th>
							<th>Kod QR</th>
							<th>Opcje</th>
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
									 <?php echo $warehouse->boxes->count_all();?>
								</td>
							<td style="text-align: center;">
									<?php echo QRBarcode::encode($warehouse->id);?>
								</td>
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs green margin-bottom"
										onClick="javascript:window.location='/warehouse/warehouse_view/<?php echo $warehouse->id ;?>';">
										<i class="glyphicon glyphicon-info-sign"></i> Info
									</button>
									<button class="btn btn-xs yellow margin-bottom"
										onClick="javascript:window.location='/warehouse/warehouse_edit/<?php echo $warehouse->id ;?>';">
										<i class="icon-layers"></i> Edytuj
									</button>
									<button class="btn btn-xs red warehouse-delete margin-bottom"
										id="<?php echo $warehouse->id ;?>">
										<i class="fa fa-recycle"></i> Usuń
									</button>
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