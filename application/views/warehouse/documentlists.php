<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-list-alt"></i>Listy Dokumentów
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
							onClick="javascript:window.location='/warehouse/documentlist_add'">
							Dodaj <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
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
									<button class="btn btn-xs green margin-bottom"
										onClick="javascript:window.location='/warehouse/documentlist_view/<?php echo $documentlist->id ;?>';">
										<i class="glyphicon glyphicon-info-sign"></i> Przegląd
									</button>
									<button class="btn btn-xs yellow margin-bottom"
										onClick="javascript:window.location='/warehouse/documentlist_edit/<?php echo $documentlist->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button
										class="btn btn-xs red documentlist-delete margin-bottom"
										id="<?php echo $documentlist->id ;?>">
										<i class="fa fa-recycle"></i> Usuń
									</button>
									<?php if($documentlist->attachment->loaded()):?>
									<a	href="/<?php echo str_replace(array(DOCROOT,"\\"),array("","/"),$documentlist->attachment->file);?>"
										class="btn btn-xs blue file-download margin-bottom"
										id="<?php echo $documentlist->attachment->id ;?>">
										<i class="fa fa-file"></i> Załącznik
									</a>
									<?php endif;?>
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
