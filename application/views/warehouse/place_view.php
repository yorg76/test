<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="glyphicon glyphicon-inbox"></i>Regał <?php echo $place->barcode ?> - Pudła
							</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">

				<table class="table table-striped table-hover table-bordered"
					id="boxes_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Kategoria przechowywania</th>
							<th>Data początku magazynowania</th>
							<th>Data końca magazynowania</th>
							<th>Data odbioru</th>
							<th>Blokady</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($boxes as $box):?>
							<tr>
							<td>
								<?php echo $box->id;?>
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
								<?php echo $box->date_reception;?>
							</td>
							<td>
								<?php echo $box->lock;?>
							</td>

							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs green margin-bottom"
										onClick="javascript:window.location='/warehouse/box_view/<?php echo $box->id ;?>';">
										<i class="glyphicon glyphicon-info-sign"></i> Przegląd
									</button>
									<button class="btn btn-xs yellow user-edit margin-bottom"
										onClick="javascript:window.location='/warehouse/box_edit/<?php echo $box->id ;?>';">
										<i class="fa fa-user"></i> Edytuj
									</button>
									<button class="btn btn-xs red user-delete margin-bottom"
										onClick="javascript:window.location='/warehouse/box_delete/<?php echo $box->id ;?>';">
										<i class="fa fa-recycle"></i> Usuń
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
