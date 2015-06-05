<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Działy
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
									<button class="btn green" onClick="javascript:window.location='/customer/division_add/<?php echo $customer->id; ?>'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="customer_divisions_list">
							<thead>
							<tr>
								<th>
									 Nazwa
								</th>							
								<th>
									 Opis
								</th>
								<th>
									 Pudła
								</th>
								<?php if(Auth_ORM::instance()->logged_in('admin')):?>
								<th>
									Klient
								</th>
								<?php endif;?>
								<th>
									 Opcje
								</th>
							</tr>
							<tr role="row" class="filter">
								<td>
									<input type="text" class="form-control form-filter input-sm" name="name">
								</td>
								
								<td>
									<input type="text" class="form-control form-filter input-sm" name="description">
								</td>
								
								<td>

								</td>
								<?php if(Auth_ORM::instance()->logged_in('admin')):?>
								<td>
									<input type="text" class="form-control form-filter input-sm" name="customer">
								</td>
								<?php endif;?>
								<td>
									<div class="margin-bottom-5">
										<button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Szukaj</button>
									</div>
										<button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Wyczyść</button>
								</td>
							</tr>							
							</thead>
							<tbody>
							<?php foreach ($divisions as $division):?>
							<tr>
								<td>
									 <?php echo $division->name;?>
								</td>						
								<td>
									 <?php echo $division->description;?>
								</td>
								<td>
									 <?php echo $division->boxes->count_all();?>
								</td>
								<?php if(Auth_ORM::instance()->logged_in('admin')):?>
								<td>
									 <?php echo $division->customer->name;?>
								</td>
								<?php endif;?>
								
								<td>

								<div class="margin-bottom-5">
											<button class="btn btn-xs green margin-bottom" onClick="javascript:window.location='/customer/division_view/<?php echo $division->id ;?>';"><i class="glyphicon glyphicon-info-sign"></i> Przegląd</button>
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/customer/division_edit/<?php echo $division->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>

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
