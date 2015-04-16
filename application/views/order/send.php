<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i> Firma kurierska </a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/order/send/<?php echo $order->id ?>" method="POST" id="send_order_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Firmy kurierskie
							<span class="required" aria-required="true"> * </span>
						</label>
						<select class="form-control" name="shipmentcompany_id">
								<option value="">-- Wybierz --</option>
							<?php foreach($shipmentcompanies as $shipmentcompany):?>
								<option value="<?php echo $shipmentcompany->id ?>"><?php echo $shipmentcompany->name?></option>
							<?php endforeach;?>
						</select>
					</div>	
					<div class="form-group">
						<label class="control-label">Numer paczki
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<input type="text" placeholder="Numer paczki" class="form-control" name="shipping_number" value="<?php echo $division->name ?>" />
							<span class="help-block"></span>
						</div>
					</div>				
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