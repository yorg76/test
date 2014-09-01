<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pencil"></i>Dokumenty
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/document_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="documents_list">
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
							<?php foreach ($documents as $document):?>
							<tr>
								<td>
									 <?php echo $document->name;?>
								</td>
															
								<td>
									 <?php echo $document->description;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/warehouse/document_edit/<?php echo $document->id ;?>';"><i class="icon-pencil"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/warehouse/document_delete/<?php echo $document->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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