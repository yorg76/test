<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pencil"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Dokumenty
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
									<button class="btn green" onClick="javascript:window.location='/virtualbriefcase/document_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="documents_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
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
							<?php foreach ($documents as $document):?>
							<tr>
								<td style="width:10%">
									 <?php echo $document->id;?>
								</td>
								
								<td style="width:20%">
									 <?php echo $document->name;?>
								</td>
															
								<td style="width:50%">
									 <?php echo $document->description;?>
								</td>
								<td style="width:20%">
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/virtualbriefcase/document_edit/<?php echo $document->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/virtualbriefcase/document_remove/<?php echo $document->id ;?>';"><i class="fa fa-recycle"></i> Usuń z teczki</button>
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
								<i class="icon-pencil"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Listy Dokumentów
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
									<button class="btn green" onClick="javascript:window.location='/virtualbriefcase/documentlist_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="documentlists_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
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
							<?php foreach ($documentlists as $documentlist):?>
							<tr>
								<td style="width:10%">
									 <?php echo $documentlist->id;?>
								</td>
								<td style="width:20%">
									 <?php echo $documentlist->name;?>
								</td>
															
								<td style="width:50%">
									 <?php echo $documentlist->description;?>
								</td>
								<td style="width:20%">
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/virtualbriefcase/documentlist_edit/<?php echo $documentlist->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/virtualbriefcase/documentlist_remove/<?php echo $documentlist->id ;?>';"><i class="fa fa-recycle"></i> Usuń z teczki</button>
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
								<i class="icon-pencil"></i>Wirtualna teczka <?php echo $virtualbriefcase->name ?> - Opakowania zbiorcze
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
									<button class="btn green" onClick="javascript:window.location='/virtualbriefcase/documentlist_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="documentlists_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
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
							<?php foreach ($bulkpackagings as $bulkpackaging):?>
							<tr>
								<td style="width:10%">
									 <?php echo $bulkpackaging->id;?>
								</td>
								<td style="width:20%">
									 <?php echo $bulkpackaging->name;?>
								</td>
															
								<td style="width:50%">
									 <?php echo $bulkpackaging->description;?>
								</td>
								<td style="width:20%">
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/virtualbriefcase/bulkpackaging_edit/<?php echo $bulkpackaging->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-remove margin-bottom" onClick="javascript:window.location='/virtualbriefcase/bulkpackaging_remove/<?php echo $bulkpackaging->id ;?>';"><i class="fa fa-recycle"></i> Usuń z teczki</button>
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
								<i class="icon-pencil"></i>Wirtualna teczka: <?php echo $virtualbriefcase->name ?> - Wirtualne teczki
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
									<button class="btn green" onClick="javascript:window.location='/virtualbriefcase/documentlist_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="documentlists_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
								<th>
									 Nazwa
								</th>							
								<th>
									 Opis
								</th>
								<th>
									 Dział
								</th>
								<th>
									 Opcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
							<tr>
								<td style="width:10%">
									 <?php echo $virtualbriefcase->id;?>
								</td>
								<td style="width:20%">
									 <?php echo $virtualbriefcase->name;?>
								</td>
															
								<td style="width:50%">
									 <?php echo $virtualbriefcase->description;?>
								</td>
								<td style="width:50%">
									 <?php echo $virtualbriefcase->division->name;?>
								</td>
								<td style="width:20%">
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/virtualbriefcase/virtualbriefcase_edit/<?php echo $virtualbriefcase->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/virtualbriefcase/virtualbriefcase_remove/<?php echo $virtualbriefcase->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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

