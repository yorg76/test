<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-briefcase"></i>Wirtualne teczki
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"> </a> <a
						href="javascript:;" class="reload"> </a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">
					
						<?php foreach ($acls as $acl):?>
							<?php if($acl->id==95 && $acl->checkRights()):?>
								<button class="btn green"
									onClick="javascript:window.location='<?php echo $acl->controller?>/<?php echo $acl->action?>'">
									Dodaj <i class="fa fa-plus"></i>
								</button>
							<?php endif;?>
						<?php endforeach;?>
						
					</div>
				</div>
				<table class="table table-striped table-hover table-bordered"
					id="virtualbriefcases_list">
					<thead>
						<tr>
							<th>Numer</th>
							<th>Nazwa</th>
							<th>Opis</th>
							<th>Dział</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
							<tr>
							<td>
									 <?php echo $virtualbriefcase->id;?>
								</td>
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
								<?php foreach ($acls as $acl):?>
									<?php if($acl->id==99 && $acl->checkRights()):?>
									<button class="btn btn-xs green margin-bottom"
										onClick="javascript:window.location='<?php echo $acl->controller?>/<?php echo $acl->action?>/<?php echo $virtualbriefcase->id ;?>';">
										<i class="glyphicon glyphicon-info-sign"></i> Przegląd
									</button>
									<?php endif;?>
									<?php if($acl->id==97 && $acl->checkRights()):?>
									<button class="btn btn-xs yellow margin-bottom"
										onClick="javascript:window.location='<?php echo $acl->controller?>/<?php echo $acl->action?>/<?php echo $virtualbriefcase->id ;?>';">
										<i class="icon-layers"></i> Edytuj
									</button>
									<?php endif;?>
									<?php if($acl->id==96 && $acl->checkRights()):?>
									<button
										class="btn btn-xs virtualbriefcase-delete red margin-bottom"
										id="<?php echo $virtualbriefcase->id; ?>">
										<i class="fa fa-recycle"></i> Usuń
									</button>
									<?php endif;?>
								<?php endforeach;?>
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
