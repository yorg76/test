<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-inbox"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Pozycje
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
					id="boxes_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Kategoria przechowywania</th>
							<th>Opis</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($boxes as $box):?>
							<tr>
							<td style="width: 5%">
									 <?php echo $box->id;?>
								</td>
							<td style="width: 20%">
									 <?php echo $box->storagecategory->name;?>
							</td>
							<td style="width: 30%">
									 <?php echo $box->description ;?>
								</td>
								<td>
									 <?php echo $box->warehouse->name ;?>
								</td>
							<td style="width:10%">
								<div class="margin-bottom-5">
									<button class="btn btn-xs yellow division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/box_edit/<?php echo $box->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button class="btn btn-xs red division-delete margin-bottom"
										onClick="javascript:window.location='/virtualbriefcase/box_remove/<?php echo $box->id ;?>';">
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
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-pencil"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Dokumenty
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-hover table-bordered"
					id="documents_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pozycja</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($documents as $document):?>
							<tr>
							<td style="width: 5%">
									 <?php echo $document->id;?>
								</td>

							<td style="width: 20%">
									 <?php echo $document->name;?>
								</td>

							<td style="width: 30%">
									 <?php echo $document->description;?>
							</td>
							<td style="width: 5%">
									 <?php echo $document->box->id;?>
							</td>
							<td style="width: 10%">
									 <?php echo $document->box->warehouse->name;?>
							</td>
							<td style="width:10%">
								<div class="margin-bottom-5">
									<button class="btn btn-xs yellow division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/document_edit/<?php echo $document->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button class="btn btn-xs red division-delete margin-bottom"
										onClick="javascript:window.location='/virtualbriefcase/document_remove/<?php echo $document->id ;?>';">
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
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-list-alt"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Listy Dokumentów
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
							<th>Pozycja</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($documentlists as $documentlist):?>
							<tr>
							<td style="width: 5%">
									 <?php echo $documentlist->id;?>
								</td>
							<td style="width: 20%">
									 <?php echo $documentlist->name;?>
								</td>

							<td style="width: 30%">
									 <?php echo $documentlist->description;?>
							</td>
							<td style="width: 5%">
									 <?php echo $document->box->id;?>
							</td>
							<td style="width: 10%">
									 <?php echo $document->box->warehouse->name;?>
							</td>
							<td style="width:10%">
								<div class="margin-bottom-5">
									<button class="btn btn-xs yellow division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/documentlist_edit/<?php echo $documentlist->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button class="btn btn-xs red division-delete margin-bottom"
										onClick="javascript:window.location='/virtualbriefcase/documentlist_remove/<?php echo $documentlist->id ;?>';">
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
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-th"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Opakowania zbiorcze
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">

				<table class="table table-striped table-hover table-bordered"
					id="bulkpackagings_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Pozycja</th>
							<th>Magazyn</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($bulkpackagings as $bulkpackaging):?>
							<tr>
							<td style="width: 5%">
									 <?php echo $bulkpackaging->id;?>
								</td>
							<td style="width: 20%">
									 <?php echo $bulkpackaging->name;?>
								</td>

							<td style="width: 30%">
									 <?php echo $bulkpackaging->description;?>
							</td>
							<td style="width: 5%">
									 <?php echo $document->box->id;?>
							</td>
							<td style="width: 10%">
									 <?php echo $document->box->warehouse->name;?>
							</td>
							<td style="width:10%">
								<div class="margin-bottom-5">
									<button class="btn btn-xs yellow division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/bulkpackaging_edit/<?php echo $bulkpackaging->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button class="btn btn-xs red division-remove margin-bottom"
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
		<div class="portlet box grey">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-briefcase"></i>Wirtualna teczka: <?php echo $virtualbriefcase->name ?> - Wirtualne teczki
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">

				<table class="table table-striped table-hover table-bordered"
					id="virtualbriefcases_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Dział</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
							<tr>
							<td style="width: 5%">
									 <?php echo $virtualbriefcase->id;?>
								</td>
							<td style="width: 20%">
									 <?php echo $virtualbriefcase->name;?>
								</td>

							<td style="width: 30%">
									 <?php echo $virtualbriefcase->description;?>
								</td>
							<td >
									 <?php echo $virtualbriefcase->division->name;?>
								</td>
							<td style="width:10%">
								<div class="margin-bottom-5">
								<input type="hidden" value="<?php echo $virtualbriefcase->id ?>" name="virtualbriefcase2_id" />
									<button class="btn btn-xs yellow division-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/virtualbriefcase_edit/<?php echo $virtualbriefcase->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button class="btn btn-xs red division-delete margin-bottom"
										onClick="javascript:window.location='/virtualbriefcase/childvirtualbriefcase_remove/<?php echo $virtualbriefcase->id ;?>';">
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

