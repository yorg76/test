<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey">
						<div class="portlet-title">
							<div class="caption">
								<i class="glyphicon glyphicon-inbox"></i>Pudło <?php echo $box->id ?> - Historia
							</div>
							<div class="tools">
								<a href="javascript:;" class="expand">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body" style="display: none;">
							<table class="table table-striped table-hover table-bordered" id="documents_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
								<th>
									 Typ operacji
								</th>							
								<th>
									 Opis
								</th>
								<th>
									 Magazyn
								</th>
								<th>
									 Użytkownik
								</th>
								<th>
									 Data
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($wh as $bh):?>
							<tr>
								<td style="width:10%">
									 <?php echo $bh->id;?>
								</td>
								
								<td style="width:20%">
									 <?php echo $bh->operation_type;?>
								</td>
															
								<td>
									 <?php echo $bh->operation_description;?>
								</td>
								<td>
									 <?php echo $bh->warehouse->name;?>
								</td>
								<td>
									 <?php echo $bh->user->username;?>
								</td>
								<td>
									 <?php echo $bh->change_date;?>
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
								<i class="glyphicon glyphicon-inbox"></i>Pudło <?php echo $box->id ?> - Dokumenty
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/document_add/<?php echo $box->id; ?>'">
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
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/warehouse/document_edit/<?php echo $document->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/warehouse/document_delete/<?php echo $document->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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
								<i class="glyphicon glyphicon-inbox"></i>Pudło <?php echo $box->id ?> - Listy Dokumentów
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/documentlist_add/<?php echo $box->id; ?>'">
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
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/warehouse/documentlist_edit/<?php echo $documentlist->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/warehouse/documentlist_delete/<?php echo $documentlist->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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
								<i class="glyphicon glyphicon-inbox"></i>Pudło <?php echo $box->id ?> - Teczki
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/bulkpackaging_add/<?php echo $box->id; ?>'">
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
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/warehouse/bulkpackaging_edit/<?php echo $bulkpackaging->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/warehouse/bulkpackaging_delete/<?php echo $bulkpackaging->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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

