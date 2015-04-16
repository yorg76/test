<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-th"></i>Teczka: <?php echo $bulkpackaging->name ?> - Dokumenty
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
					<input type="hidden" value="<?php echo $bulkpackaging->id ?>" name="bulkpackaging_id" />
						<button class="btn green"
							onClick="javascript:window.location='/warehouse/add_item_bp/<?php echo $bulkpackaging->id ?>'">
							Dodaj do teczki <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<table class="table table-striped table-hover table-bordered"
					id="documents_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pudło</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($documents as $document):?>
							<tr>
							<td>
										 <?php echo $document->id;?>
							</td>
							<td>
										 <?php echo $document->name;?>
							</td>
							<td>
										 <?php echo $document->description;?>
							</td>
							<td>
										 <?php echo $document->box->id;?>
							</td>
							<td>
										 <?php echo $document->box->warehouse->name;?>
							</td>
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs red division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/document_edit/<?php echo $document->id ;?>';">
										<i class="fa fa-recycle"></i> Edytuj/Usuń z teczki
									</button>
									
								</div>
							</td>
						</tr>
							<?php endforeach;?>
							</tbody>
				</table>
			</div>
		</div>
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-th"></i>Teczka: <?php echo $bulkpackaging->name ?> - Listy Dokumentów
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-hover table-bordered"
					id="documentlists_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pudło</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($documentlists as $documentlist):?>
							<tr>
							<td>
									 <?php echo $documentlist->id;?>
							</td>
							<td>
									 <?php echo $documentlist->name;?>
							</td>
							<td>
									 <?php echo $documentlist->description;?>
							</td>
							<td>
									 <?php echo $documentlist->box->id;?>
							</td>
							<td>
									 <?php echo $documentlist->box->warehouse->name;?>
							</td>
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs red division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/documentlist_edit/<?php echo $documentlist->id ;?>';">
										<i class="fa fa-recycle"></i> Edytuj/Usuń z teczki
									</button>
									
								</div>
							</td>
						</tr>
							<?php endforeach;?>
							</tbody>
				</table>
			</div>
		</div>
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-th"></i>Teczka: <?php echo $bulkpackaging->name ?> - Teczka
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-hover table-bordered"
					id="documentlists_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pudło</th>
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
							<td>
									 <?php echo $bulkpackaging->box->id;?>
							</td>
							<td>
									 <?php echo $bulkpackaging->box->warehouse->name;?>
							</td>
							<td>
								<div class="margin-bottom-5">
								<input type="hidden" value="<?php echo $bulkpackaging->id ?>" name="bulkpackaging2_id" />
									
									<button class="btn btn-xs red division-remove margin-bottom"
										onClick="javascript:window.location='/warehouse/childbulkpackaging_remove/<?php echo $bulkpackaging->id ;?>';">
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

