<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i> Przyjęcie na magazyn </a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/order/recept/<?php echo $order->id ?>" method="POST" id="recept_order_form">
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					
					<div class="form-group">
						<label class="control-label">Numer pudła
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-group">
							<input type="text" placeholder="Kod kreskowy" class="form-control" name="package_barcode" value="" />
							<span class="input-group-btn">
								<button class="btn blue" type="button" id="receipt_package">Przyjmij do magazynu</button>
							</span>
							<span class="help-block"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label">Pudła</label>
						<div class="input-group">
							<select class="form-control" multiple name="boxes[]" size="5" style="width:550px;" readonly>
							</select>
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