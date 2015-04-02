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
							<th>Klient</th>
							<th>Data początku magazynowania</th>
							<th>Data końca magazynowania</th>
							<th>Status</th>
							
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
								<input type="text" class="form-control form-filter input-sm" name="warehouse_name">
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="customer">
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
								<div class="margin-bottom-5">
									<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Szukaj</button>
								</div>
									<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Wyczyść</button>
							</td>
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
