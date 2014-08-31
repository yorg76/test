<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Użytkownicy
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
									<button class="btn green" onClick="javascript:window.location='/customer/user_add'">
									Dodaj <i class="fa fa-plus"></i>
									</button>
								</div>
							</div>						
							<table class="table table-striped table-hover table-bordered" id="users_list">
							<thead>
							<tr>
								<th>
									 Login
								</th>							
								<th>
									 Imię
								</th>
								<th>
									 Nazwisko
								</th>

								<th>
									 Email
								</th>
								<th>
									Status
								</th>
								<th>
									 Opcje
								</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($users as $user):?>
							<tr>
								<td>
									 <?php echo $user->username;?>
								</td>
															
								<td>
									 <?php echo $user->firstname ;?>
								</td>
								<td>
									 <?php echo $user->lastname ;?>
								</td>
								<td class="center">
									 <?php echo $user->email;?>
								</td>
								<td class="center">
									 <?php echo $user->status;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-xs yellow user-edit margin-bottom" onClick="javascript:window.location='/customer/user_edit/<?php echo $user->id ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<?php if($user->status == 'Aktywny'):?>
											<button class="btn btn-xs blue user-lock margin-bottom" onClick="javascript:window.location='/customer/user_lock/<?php echo $user->id ;?>';"><i class="fa fa-lock"></i> Zablokuj</button>
											<?php else:?>
											<button class="btn btn-xs green user-unlock margin-bottom" onClick="javascript:window.location='/customer/user_unlock/<?php echo $user->id ;?>';"><i class="fa fa-unlock"></i> Odblokuj</button>
											<?php endif;?>
											<button class="btn btn-xs red user-delete margin-bottom" id="<?php echo $user->id ;?>"><i class="fa fa-recycle"></i> Usuń</button>
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