<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i> Dane podstawowe </a>
				<span class="after">
				</span>
			</li>
			<li id="firma_tab" <?php if ($editeduser->pesel !='') echo "hidden"; ?>>
				<a data-toggle="tab" href="#tab_4-4">
				<i class="fa fa-bank"></i> Firma </a>
			</li>
			
			<li>
				<a data-toggle="tab" href="#tab_3-3">
				<i class="fa fa-lock"></i> Zmień hasło </a>
			</li>
		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/admin/edit_user/<?php echo $editeduser->id ?>" method="POST" id="add_user_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					<div class="form-group">
						<label class="control-label">Imię
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="John" class="form-control" name="firstname" value="<?php echo $editeduser->firstname?>" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Nazwisko
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="Doe" class="form-control" name="lastname" value="<?php echo $editeduser->lastname?>" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Login
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="username_ok"  data-original-title="Użytkownik nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="username_error" data-original-title="Ten użytkownik już istnieje" data-container="body"></i>
							<input type="text" placeholder="username" class="form-control" name="username" value="<?php echo $editeduser->username?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Email
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="email_ok"  data-original-title="Użytkownik nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="email_error" data-original-title="Ten użytkownik już istnieje" data-container="body"></i>
							<input type="text" placeholder="user@example.com" class="form-control" name="email" value="<?php echo $editeduser->email?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Numer CSA
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="csa123446" class="form-control" name="csa" value="<?php echo $editeduser->getCSA();?>" />
						<span class="help-block"></span>
					</div>						
					<div class="form-group">
						<label class="control-label">Numer telefonu
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="+48 646 580 DEMO (6284)" class="form-control" name="tel" value="<?php echo $editeduser->phone?>" />
						<span class="help-block"></span>
					</div>			
					<div class="form-group">
						<label class="control-label">PESEL (tylko dla osób fizycznych)
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="82030900567" class="form-control" name="pesel" value="<?php echo $editeduser->pesel?>" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Ulica / Lokal
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="ul. Pana Jana 31" class="form-control" name="street" value="<?php echo $editeduser->street?>" />
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Miasto
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="Warszawa" class="form-control" name="city"  value="<?php echo $editeduser->city?>" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Kod pocztowy
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="00-001" class="form-control" name='postal' value="<?php echo $editeduser->postal?>" />
						<span class="help-block"></span>
					</div>															
					<div class="form-group">
						<label class="control-label">Komentarz</label>
						<textarea class="form-control" rows="3" placeholder="Nowy klient yuuuupi!" name='comments'><?php echo $editeduser->comments?></textarea>
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="#" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>
				<?php 
				if ($editeduser->pesel !=''):
				?>
					<div id="tab_4-4" class="tab-pane">
						<div class="form-group">
							<label class="control-label">Nazwa
								<span class="required" aria-required="true"> * </span>
							</label>
							<input type="text" placeholder="Blade Runner" class="form-control" name="cname"  value="<?php echo $editeduser->cname?>"/>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">NIP
								<span class="required" aria-required="true"> * </span>
							</label>
							<input type="text" placeholder="123456" class="form-control" name="nip"  value="<?php echo $editeduser->nip?>"/>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">REGON</label>
							<input type="text" placeholder="0987654" class="form-control" name="regon"  value="<?php echo $editeduser->regon?>"/>
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">Ulica
								<span class="required" aria-required="true"> * </span>
							</label>
							<input type="text" placeholder="ul. Pana Jana 31" class="form-control" name="cstreet"  value="<?php echo $editeduser->street?>"/>
							<span class="help-block"></span>
						</div>					
						<div class="form-group">
							<label class="control-label">Miasto
								<span class="required" aria-required="true"> * </span>
							</label>
							<input type="text" placeholder="Warszawa" class="form-control" name="ccity"  value="<?php echo $editeduser->city?>" />
							<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="control-label">Kod pocztowy
								<span class="required" aria-required="true"> * </span>
							</label>
							<input type="text" placeholder="00-001" class="form-control" name='cpostal' value="<?php echo $editeduser->postal?>" />
							<span class="help-block"></span>
						</div>															
						<div class="form-group">
							<label class="control-label">Strona
								<span class="required" aria-required="true"> * </span>
							</label>
							<input type="text" placeholder="http://www.mywebsite.com" class="form-control" name='www' value="<?php echo $editeduser->www?>" />
							<span class="help-block"></span>
						</div>
						<div class="margiv-top-10">
							<a href="#" class="btn green" id="submit">
							Zapisz zmiany </a>
							<a href="#" class="btn default" id="cancel">
							Anuluj </a>
						</div>
					</div>		
				<?php 
				endif;
				?>		
				<div id="tab_3-3" class="tab-pane">
					<div class="form-group">
						<label class="control-label">Current Password</label>
						<input type="password" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label">New Password</label>
						<input type="password" class="form-control"/>
					</div>
					<div class="form-group">
						<label class="control-label">Re-type New Password</label>
						<input type="password" class="form-control"/>
					</div>
					<div class="margin-top-10">
						<a href="#" class="btn green" id="submit_pass">
						Zmień hasło </a>
						<a href="#" class="btn default" id="cancel_pass">
						Anuluj </a>
					</div>
				</div>
			</div>
			<?php 
				if ($editeduser->pesel !='') {
					?>
					<input type="hidden" name="IsIndividual" value="1" />
					<?php 
				}else {
					?>
					<input type="hidden" name="IsIndividual" value="0" />
					<?php
				} 
			?>			
		</form>
	</div>
	<!--end col-md-9-->
</div>
