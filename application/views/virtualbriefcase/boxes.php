<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-briefcase"></i>Wirtualne teczki - Pozycje
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
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE CONTENT -->
<div></div>
<div></div>