<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Nowy regał</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/place_add/<?php echo $customer->id ?>" method="POST" id="add_place_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Numer
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Numer" class="form-control" name="id" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Kod kreskowy
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Kod kreskowy" class="form-control" name="barcode" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description" placeholder="Opis regału"></textarea>
						<span class="help-block"></span>
					</div>
					
					<div class="form-group">
						<label class="control-label">Status
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="status">
								<option>-- Wybierz --</option>
								<option value="Puste">Puste</option>
								<option value="Używane">Używane</option>
								<option value="Pełne">Pełne</option>
								<option value="Usunięte">Usunięte</option>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label">Pojemność
							<span class="required" aria-required="true"> * </span>
						</label>
						<input type="text" placeholder="Pojemość" class="form-control" name="capacity" value="" />
							<span class="help-block"></span>
					</div>
										
					<br />
					<div class="margiv-top-10">
						<a href="/warehouse/places" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/warehouse/places" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>