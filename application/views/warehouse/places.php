<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-layers"></i>Regały
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
							onClick="javascript:window.location='/warehouse/place_add'">
							Dodaj <i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<table class="table table-striped table-hover table-bordered"
					id="places_list">
					<thead>
						<tr>
							<th>Numer</th>					
							<th>Opis</th>
							<th>Status</th>
							<th>Zajętość</th>
							<th>Pojemność</th>
							<th>Opcje</th>
						</tr>
						<tr role="row" class="filter">
							<td>
								<input type="text" class="form-control form-filter input-sm" name="id">
							</td>
							
							<td>
								<input type="text" class="form-control form-filter input-sm" name="description">
							</td>
							
							<td>
								<select name="status" class="form-control form-filter input-sm">
									<option value="">Wybierz...</option>
									<option value="Puste">Puste</option>
									<option value="Używane">Używane</option>
									<option value="Pełne">Pełne</option>
									<option value="Usunięte">Usunięte</option>
								</select>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Szukaj</button>
								</div>
									<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Wyczyść</button>
							</td>
						</tr>
					</thead>
					<tbody>
							<?php 
							$places_off=array();
							foreach ($places_off as $place):?>
							<tr>
								<td>
									 <?php echo $place->id;?>
								</td>

								<td>
									 <?php echo $place->description;?>
								</td>
								<td>
									 <?php echo $place->status;?>
								</td>
								<td>
									 <?php echo $place->boxes->count_all();?>
								</td>					
								<td>
									 <?php echo $place->capacity;?>
								</td>	
							<td>
								<div class="margin-bottom-5">
									<button class="btn btn-xs green margin-bottom"
										onClick="javascript:window.location='/warehouse/place_view/<?php echo $place->id ;?>';">
										<i class="glyphicon glyphicon-info-sign"></i> Info
									</button>
									<button class="btn btn-xs yellow margin-bottom"
										onClick="javascript:window.location='/warehouse/place_edit/<?php echo $place->id ;?>';">
										<i class="icon-layers"></i> Edytuj
									</button>
									<button class="btn btn-xs red warehouse-delete margin-bottom"
										id="<?php echo $place->id ;?>">
										<i class="fa fa-recycle"></i> Usuń
									</button>
								</div>
							</td>
						</tr>
							<?php endforeach; ?>
							</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
<!-- END PAGE CONTENT -->