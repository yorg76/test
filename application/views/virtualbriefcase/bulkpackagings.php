<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-briefcase"></i>Wirtualne teczki - Opakowania
					zbiorcze
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
							onClick="javascript:window.location='/virtualbriefcase/add_item_vb'">
							Dodaj do teczki <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<table class="table table-striped table-hover table-bordered"
					id="bulkpackagings_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Opakowanie zbiorcze</th>
							<th>Opis</th>
							<th>Pozycja</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($bulkpackagings as $bulkpackaging):?>
							<tr>
							<td>
									 <?php echo $bulkpackaging->id;?>
								</td>
							<td>
									 <?php echo $bulkpackaging->name;?>
								</td>

							<td>
									 <?php echo $bulkpackaging->description;?>
							</td>
							<td style="width: 5%">
									 <?php echo $bulkpackaging->box->id;?>
							</td>
							<td style="width: 10%">
									 <?php echo $bulkpackaging->box->warehouse->name;?>
							</td>
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs red division-delete margin-bottom"
										onClick="javascript:window.location='/virtualbriefcase/bulkpackaging_remove/<?php echo $bulkpackaging->id ;?>';">
										<i class="fa fa-recycle"></i> Usuń z teczki
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
<div></div>
<div></div>