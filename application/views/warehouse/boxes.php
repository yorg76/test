<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-inbox"></i>Pudła
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
							onClick="javascript:window.location='/warehouse/box_add'">
							Dodaj <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<table class="table table-striped table-hover table-bordered"
					id="boxes_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Kod pudła</th>
							<th>Regał</th>
							<th>Magazyn</th>
							<th>Kategoria przechowywania</th>
							<th>Data początku magazynowania</th>
							<th>Data końca magazynowania</th>
							<th>Status</th>
							<th>Plomba</th>
							
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php /*foreach ($boxes as $box):?>
							<tr>
							<td>
									 <?php echo $box->id;?>
							</td>
							<td>
									 <img alt="barcode" src="/barcode/get/<?php echo $box->barcode; ?>" />
							</td>
							<td>
									 <?php if($box->place != ''): ?>
									 <img alt="barcode" src="/barcode/get/<?php echo $box->place; ?>" />
									 <?php endif;?>
							</td>
							<td>
									 <?php echo $box->warehouse->name;?>
							</td>
							<td>
									 <?php echo $box->storagecategory->name;?>
							</td>
							<td>
									 <?php echo $box->date_from ;?>
							</td>
							<td>
									 <?php echo $box->date_to ;?>
							</td>
							<td>
									 <?php echo $box->status;?>
							</td>
							<td>
									 <?php echo $box->seal;?>
							</td>

							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs green margin-bottom"
										onClick="javascript:window.location='/warehouse/box_view/<?php echo $box->id ;?>';">
										<i class="glyphicon glyphicon-info-sign"></i> Przegląd
									</button>
									<br />
									<button class="btn btn-xs yellow margin-bottom"
										onClick="javascript:window.location='/warehouse/box_edit/<?php echo $box->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<br />
									<!--
									<button class="btn btn-xs red box-delete margin-bottom"
										id="<?php echo $box->id ;?>">
										<i class="fa fa-recycle"></i> Usuń
									</button>
									-->
								</div>
							</td>
						</tr>
							<?php endforeach; */?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE CONTENT -->
