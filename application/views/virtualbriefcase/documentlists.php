<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-briefcase"></i>Wirtualne teczki - Listy Dokumentów
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
					id="documentlists_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Lista dokumentów</th>
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
							<td style="width: 5%">
									 <?php echo $documentlist->box->id;?>
							</td>
							<td style="width: 10%">
									 <?php echo $documentlist->box->warehouse->name;?>
							</td>
							<td>
								<div class="margin-bottom-5">
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
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE CONTENT -->
<div></div>
<div></div>