﻿<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pencil"></i>Opakowania zbiorcze
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/bulkpackaging_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="bulkpackagings_list">
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
											<button class="btn btn-xs green margin-bottom" onClick="javascript:window.location='/warehouse/bulkpackaging_view/<?php echo $bulkpackaging->id ;?>';"><i class="glyphicon glyphicon-info-sign"></i> Przegląd</button>
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
		</div>
	</div>