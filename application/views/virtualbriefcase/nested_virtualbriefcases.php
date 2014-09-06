<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-briefcase"></i>Wirtualne teczki
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
									<button class="btn green" onClick="javascript:window.location='/virtualbriefcase/nested_virtualbriefcase_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="parent_virtualbriefcases_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
								<th>
									 Witualna teczka (parent)
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
							<?php foreach ($parent_virtualbriefcases as $parent_virtualbriefcase):?>
							<tr>
								<td>
									 <?php echo $parent_virtualbriefcase->id;?>
								</td>
								<td>
									 <?php echo $parent_virtualbriefcase->name;?>
								</td>
								<td>
									 <?php echo $parent_virtualbriefcase->description;?>
								</td>
								<td>
									 <?php echo $parent_virtualbriefcase->division->name;?>
								</td>
								
															
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/virtualbriefcase/nested_virtualbriefcase_edit/<?php echo $parent_virtualbriefcase->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/virtualbriefcase/nested_virtualbriefcase_remove/<?php echo $parent_virtualbriefcase->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
							</tbody>
							</table>
							<table class="table table-striped table-hover table-bordered" id="child_virtualbriefcases_list">
							<thead>
							<tr>
								<th>
									 ID
								</th>
								<th>
									 Witualna teczka (child)
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
							<?php foreach ($child_virtualbriefcases as $child_virtualbriefcase):?>
							<tr>
								<td>
									 <?php echo $child_virtualbriefcase->id;?>
								</td>
								<td>
									 <?php echo $child_virtualbriefcase->name;?>
								</td>
								<td>
									 <?php echo $child_virtualbriefcase->description;?>
								</td>
								<td>
									 <?php echo $child_virtualbriefcase->division->name;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow division-edit margin-bottom" onClick="javascript:window.location='/virtualbriefcase/nested_virtualbriefcase_edit/<?php echo $child_virtualbriefcase->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-xs red division-delete margin-bottom" onClick="javascript:window.location='/virtualbriefcase/nested_virtualbriefcase_remove/<?php echo $child_virtualbriefcase->id ;?>';"><i class="fa fa-recycle"></i> Usuń</button>
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