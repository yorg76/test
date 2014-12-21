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
		<form role="form" action="/customer/division_add/<?php echo $customer->id ?>" method="POST" id="add_division_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					<?php if(Auth::instance()->logged_in('admin')):?>
					<div class="form-group">
						<label class="control-label">Klient
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="customer_id">
								<option>-- Wybierz --</option>
								<?php foreach ($customers as $customer):?>
								<?php 
											echo "<option value=\"".$customer->id."\">".$customer->name."</option>";
								?>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<?php endif;?>
					<div class="form-group">
						<label class="control-label">Nazwa
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" placeholder="Opis działu" name="description"></textarea>
						<span class="help-block"></span>
					</div>
					<br/>
					<input type="hidden" value="<?php echo $customer->id ?>" name="customer_id" />
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