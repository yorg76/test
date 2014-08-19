<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i> Dane podstawowe </a>
				<span class="after">
				</span>
			</li>
			<li id="address_tab">
				<a data-toggle="tab" href="#tab_4-4">
				<i class="fa fa-bank"></i> Adres </a>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/admin/customer_edit/<?php echo $customer->id ?>" method="POST" id="add_user_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Nazwa
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="username_ok"  data-original-title="Firma nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="username_error" data-original-title="Ta firma już istnieje" data-container="body"></i>
							<input type="text" placeholder="nazwa" class="form-control" name="nazwa" value="<?php echo $customer->nazwa?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">NIP
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="123456" class="form-control" name="nip"  value="<?php echo $customer->nip?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">REGON</label>
						<input type="text" placeholder="0987654" class="form-control" name="regon"  value="<?php echo $customer->regon?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Email
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="email_ok"  data-original-title="Użytkownik nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="email_error" data-original-title="Ten użytkownik już istnieje" data-container="body"></i>
							<input type="text" placeholder="user@example.com" class="form-control" name="email" value="<?php echo $customer->email?>" />
							<span class="help-block"></span>
						</div>
					</div>					
					<div class="form-group">
						<label class="control-label">Komentarz</label>
						<textarea class="form-control" rows="3" placeholder="Nowy klient yuuuupi!" name='comments'><?php echo $customer->comments?></textarea>
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="#" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>
				<div id="tab_4-4" class="tab-pane">
					<div class="form-group">
						<label class="control-label">Ulica
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="ul. Pana Jana 31" class="form-control" name="street"  value="<?php echo $customer->street?>"/>
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Miasto
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="Warszawa" class="form-control" name="city"  value="<?php echo $customer->city?>" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Kod pocztowy
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="00-001" class="form-control" name='postal' value="<?php echo $customer->postal?>" />
						<span class="help-block"></span>
					</div>															
					<div class="form-group">
						<label class="control-label">Strona
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="http://www.mywebsite.com" class="form-control" name='www' value="<?php echo $customer->www?>" />
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit">
						Zapisz zmiany </a>
						<a href="#" class="btn default" id="cancel">
						Anuluj </a>
					</div>
				</div>		
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>
