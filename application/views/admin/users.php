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
									 Firma
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
									 <?php echo $user['login'] ;?>
								</td>
															
								<td>
									 <?php echo $user['imie'] ;?>
								</td>
								<td>
									 <?php echo $user['nazwisko'] ;?>
								</td>
								<td>
									 <?php echo $user['email'] ;?>
								</td>
								<td class="center">
									 <?php echo $user['firma'] ;?>
								</td>
								<td>
									<div class="margin-bottom-5">
											<button class="btn btn-sm yellow user-edit margin-bottom" onClick="javascript:window.location='/admin/user_edit/<?php echo $user['id'] ;?>';"><i class="fa fa-user"></i> Edytuj</button>
											<button class="btn btn-sm blue user-lock margin-bottom" onClick="javascript:window.location='/admin/user_lock/<?php echo $user['id'] ;?>';"><i class="fa fa-lock"></i> Zablokuj</button>
											<button class="btn btn-sm red user-delete margin-bottom" id="<?php echo $user['id'] ;?>"><i class="fa fa-recycle"></i> Usuń</button>
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