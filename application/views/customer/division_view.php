<input name="division_id" type="hidden" value="<?php echo $division->id; ?>" /> 
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-layers"></i>Dział <?php echo $division->name;?> - pudła
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
									<button class="btn green" onClick="javascript:window.location='/warehouse/box_add'">
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
							<th>Data początku magazynowania</th>
							<th>Data końca magazynowania</th>
							<th>Status</th>
							<th>Plomba</th>
							<th>Opcje</th>
						</tr>
						
						<tr role="row" class="filter">
							<td>
								<input type="text" class="form-control form-filter input-sm" name="id">
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="barcode">
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="place_id">
							</td>							
							<td>
								<div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
									<input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="Od">
									<span class="input-group-btn">
									<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</td>
							<td>
								<div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
									<input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="Do">
									<span class="input-group-btn">
									<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</td>
							<td>
								<select name="status" class="form-control form-filter input-sm">
									<option value="">Select...</option>
									<option value="Puste">Puste</option>
									<option value="Na magazynie">Na magazynie</option>
									<option value="W trakcie transportu">W trakcie transportu</option>
									<option value="Wypożyczone">Wypożyczone</option>
									<option value="Przyjęcie na magazyn" >Przyjęcie na magazyn</option>
									<option value="Usunięte">Usunięte</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="storage_catgory">
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
							
					</tbody>
				</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-layers"></i>Dział <?php echo $division->name;?> - wirtualne teczki
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
									<button class="btn green" onClick="javascript:window.location='/virtualbriefcase/virtualbriefcase_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="virtualbriefcases_list"">
							<thead>
							<tr>
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
								<td>
									 <?php echo $virtualbriefcase->name;?>
								</td>
															
								<td>
									 <?php echo $virtualbriefcase->description;?>
								</td>
								<td>
									 <?php echo $virtualbriefcase->division->name;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs green margin-bottom" onClick="javascript:window.location='/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id ;?>';"><i class="glyphicon glyphicon-info-sign"></i> Przegląd</button>
											<button class="btn btn-xs yellow margin-bottom" onClick="javascript:window.location='/virtualbriefcase/virtualbriefcase_edit/<?php echo $virtualbriefcase->id ;?>';"><i class="icon-layers"></i> Edytuj</button>
											<button class="btn btn-xs red margin-bottom" onClick="javascript:window.location='/virtualbriefcase/virtualbriefcase_delete/<?php echo $virtualbriefcase->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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