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
		<form role="form" action="/finance/pricetable_add" method="POST" id="add_pricetable_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
				
					<div class="form-group">
						<label class="control-label">Klient
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="customer_id">
								<option value="">-- Wybierz --</option>
								<?php foreach ($customers as $customer):?>
								<?php 
											echo "<option value=\"".$customer->id."\">".$customer->name."</option>";
								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
									
					<div class="form-group">
						<label class="control-label">Odbiór pudeł
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Cena netto" class="form-control" name="boxes_reception" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Wysłanie pudła
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Cena netto" class="form-control" name="boxes_sending" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Magazynowanie
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Cena netto" class="form-control" name="boxes_storage" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Skanowanie
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Cena netto" class="form-control" name="document_scan" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Kopia
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Cena netto" class="form-control" name="document_copy" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Kopia notarialna
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Cena netto" class="form-control" name="document_notarial_copy" value="" />
							<span class="help-block"></span>
						</div>
					</div>										
					
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