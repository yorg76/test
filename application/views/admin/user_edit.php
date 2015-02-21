<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i> Dane podstawowe </a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/admin/user_edit/<?php echo $user->id ?>" method="POST" id="add_user_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Login
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="username_ok"  data-original-title="Firma nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="username_error" data-original-title="Ta firma już istnieje" data-container="body"></i>
							<input type="text" placeholder="Login" class="form-control" name="username" value="<?php echo $user->username ?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Imie
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="Imię" class="form-control" name="firstname"  value="<?php echo $user->firstname ?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Nazwisko
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="Nazwisko" class="form-control" name="lastname"  value="<?php echo $user->lastname ?>"/>
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Email
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="email_ok"  data-original-title="Użytkownik nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="email_error" data-original-title="Ten użytkownik już istnieje" data-container="body"></i>
							<input type="text" placeholder="user@example.com" class="form-control" name="email" value="<?php echo $user->email ?>" />
							<span class="help-block"></span>
						</div>
					</div>				
					<div class="form-group">
						<label class="control-label">Klient
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="customer_id">
								<option>-- Wybierz --</option>
								<?php foreach ($customers as $customer):?>
								<?php 
										if ($user->customer->id == $customer->id) $checked=" selected=\"true\"";
										else $checked="";
										
										echo "<option value=\"".$customer->id."\"".$checked." >".$customer->name."</option>";

								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>		
					<div class="form-group">
						<label class="control-label">Dział
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select multiple class="form-control" name="divisions[]">
								<?php foreach ($divisions as $division):?>
								<?php 
										if ($user->has('divisions', $division->id)) $checked=" selected=\"true\"";
										else $checked="";
										
										echo "<option value=\"".$division->id."\"".$checked." >".$division->name."</option>";

								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>						
					<div class="form-group">
						<label class="control-label">Rola
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" multiple name="roles[]">
								<?php foreach ($roles as $role):?>
								<?php 
										if ($user->has('roles',$role)) $checked=" selected=\"true\"";
										else $checked="";
										
										echo "<option value=\"".$role->id."\"".$checked." >".$role->name." (".$role->description.")</option>";

								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>						
					<div class="form-group">
						<label class="control-label">Hasło
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="password" class="form-control" type="password" name="password" placeholder="hasło">
						</div>
					</div>
		
					<div class="form-group">
						<label class="control-label">Powtórz hasło
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon">
							<i class="fa fa-lock fa-fw"></i>
							<input id="password_repeat" class="form-control" type="password" name="password_repeat" placeholder="powtórzenie hasła">
						</div>
					</div>		
					<br />
					<span class="input-group-btn">
						<button id="genpassword" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"></i> Losowe</button>
					</span>			
					<br/>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="#" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>