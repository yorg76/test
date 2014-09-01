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
			<li id="address_tab">
				<a data-toggle="tab" href="#tab_4-5">
				<i class="fa fa-bank"></i> Adresy dostawy </a>
			</li>
			
			<li id="address_tab">
				<a data-toggle="tab" href="#tab_4-6">
				<i class="fa fa-bank"></i> Adresy odbioru </a>
			</li>
			
		</ul>
	</div>
	<div class="col-md-9">		
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">
			
				<div id="tab_1-1" class="tab-pane active">
					<form role="form" action="/customer/edit/<?php echo $customer->id ?>" method="POST" id="customer_edit_form">
					<div class="form-group">
						<label class="control-label">Nazwa
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<i class="fa fa-check-circle tooltips hidden" id="username_ok"  data-original-title="Firma nie istnieje" data-container="body"></i>
							<i class="fa fa-exclamation tooltips hidden" id="username_error" data-original-title="Ta firma już istnieje" data-container="body"></i>
							<input form="customer_edit_form" type="text" placeholder="nazwa" class="form-control" name="name" value="<?php echo $customer->name?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">NIP
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="customer_edit_form" type="text" placeholder="123456" class="form-control" name="nip"  value="<?php echo $customer->nip?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">REGON</label>
						<input form="customer_edit_form" type="text" placeholder="0987654" class="form-control" name="regon"  value="<?php echo $customer->regon?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">KOD</label>
						<input form="customer_edit_form" type="text" placeholder="0987654" class="form-control" name="code"  value="<?php echo $customer->code?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Komentarz</label>
						<textarea form="customer_edit_form" class="form-control" rows="3" placeholder="Nowy klient yuuuupi!" name='comments'><?php echo $customer->comments?></textarea>
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="#" class="btn default" id="cancel">
						Anuluj</a>
					</div>
					</form>
				</div>
				<div id="tab_4-4" class="tab-pane">
				<form role="form" action="/customer/edit/<?php echo $customer->id ?>" method="POST" id="customer_edit_form">
					<div class="form-group">
						<label class="control-label">Ulica
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="customer_edit_form" type="text" placeholder="ul. Pana Jana " class="form-control" name="street"  value="<?php echo $customer->street?>"/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Numer
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="customer_edit_form" type="text" placeholder="1" class="form-control" name="number"  value="<?php echo $customer->number?>"/>
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Lokal							
						</label>
						<input form="customer_edit_form" type="text" placeholder="1" class="form-control" name="flat"  value="<?php echo $customer->flat?>"/>
						<span class="help-block"></span>
					</div>					
															
					<div class="form-group">
						<label class="control-label">Miasto
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="customer_edit_form" type="text" placeholder="Warszawa" class="form-control" name="city"  value="<?php echo $customer->city?>" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Kod pocztowy
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="customer_edit_form" type="text" placeholder="00-001" class="form-control" name='postal' value="<?php echo $customer->postal?>" />
						<span class="help-block"></span>
					</div>															
					<div class="form-group">
						<label class="control-label">Kraj							
						</label>
						<input form="customer_edit_form" type="text" placeholder="+48666999000" class="form-control" name="country"  value="<?php echo $customer->country?>"/>
						<span class="help-block"></span>
					</div>					
					
					<div class="form-group">
						<label class="control-label">Telefon							
						</label>
						<input form="customer_edit_form" type="text" placeholder="+48666999000" class="form-control" name="telephone"  value="<?php echo $customer->telephone?>"/>
						<span class="help-block"></span>
					</div>					
					
					<div class="form-group">
						<label class="control-label">Strona
						</label>
						<input form="customer_edit_form" type="text" placeholder="http://www.mywebsite.com" class="form-control" name='www' value="<?php echo $customer->www?>" />
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit">
						Zapisz zmiany </a>
						<a href="#" class="btn default" id="cancel">
						Anuluj </a>
					</div>
					</form>
				</div>
					
				<div id="tab_4-5" class="tab-pane">
				<form role="form" action="/customer/add_address/<?php echo $customer->id ?>" method="POST" id="add_delivery_address_form">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-picture"></i>Adresy dostawy
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th>
										 Ulica
									</th>
									<th>
										 Kod pocztowy
									</th>
									<th>
										 Miasto
									</th>
									<th>
										 Telefon
									</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($delivery_addresses as $da):?>
								<tr>
									<td>
										 <?php echo $da->street." ".$da->number."/".$da->flat;?>
									</td>
									<td>
										 <?php echo $da->postal;?>
									</td>
									<td>
										 <?php echo $da->city;?>
									</td>
									<td>
										 <?php echo $da->telephone;?>
									</td>
									
								</tr>
								<?php endforeach;?>
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
				
					<div class="form-group">
						<label class="control-label">Ulica
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="ul. Pana Jana " class="form-control" name="street"  value=""/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Numer
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="1" class="form-control" name="number"  value=""/>
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Lokal							
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="1" class="form-control" name="flat"  value=""/>
						<span class="help-block"></span>
					</div>					
															
					<div class="form-group">
						<label class="control-label">Miasto
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="Warszawa" class="form-control" name="city"  value="" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Kod pocztowy
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="00-001" class="form-control" name='postal' value="" />
						<span class="help-block"></span>
					</div>															
					<div class="form-group">
						<label class="control-label">Kraj							
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="+48666999000" class="form-control" name="country"  value=""/>
						<span class="help-block"></span>
					</div>					
					
					<div class="form-group">
						<label class="control-label">Telefon							
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="+48666999000" class="form-control" name="telephone"  value=""/>
						<span class="help-block"></span>
					</div>					
					
					<div class="form-group">
						<label class="control-label">Strona
						</label>
						<input form="add_delivery_address_form" type="text" placeholder="http://www.mywebsite.com" class="form-control" name='www' value="" />
						<input form="add_delivery_address_form" type="hidden" class="form-control" name="address_type" value="wysyłki" />
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit_delivery">
						Dodaj </a>
						<a href="#" class="btn default" id="cancel">
						Anuluj </a>
					</div>
					</form>
				</div>
				
				<div id="tab_4-6" class="tab-pane">
				<form role="form" action="/customer/add_address/<?php echo $customer->id ?>" method="POST" id="add_pickup_address_form">
				<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-picture"></i>Adresy odbioru
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-scrollable">
								<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th>
										 Ulica
									</th>
									<th>
										 Kod pocztowy
									</th>
									<th>
										 Miasto
									</th>
									<th>
										 Telefon
									</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($pickup_addresses as $pa):?>
								<tr>
									<td>
										 <?php echo $pa->street." ".$pa->number."/".$pa->flat;?>
									</td>
									<td>
										 <?php echo $pa->postal;?>
									</td>
									<td>
										 <?php echo $pa->city;?>
									</td>
									<td>
										 <?php echo $pa->telephone;?>
									</td>
									
								</tr>
								<?php endforeach;?>
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Ulica
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="ul. Pana Jana " class="form-control" name="street"  value=""/>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Numer
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="1" class="form-control" name="number"  value=""/>
						<span class="help-block"></span>
					</div>					
					<div class="form-group">
						<label class="control-label">Lokal							
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="1" class="form-control" name="flat"  value=""/>
						<span class="help-block"></span>
					</div>					
															
					<div class="form-group">
						<label class="control-label">Miasto
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="Warszawa" class="form-control" name="city"  value="" />
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Kod pocztowy
							<span class="required" aria-required="true"> * </span>
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="00-001" class="form-control" name='postal' value="" />
						<span class="help-block"></span>
					</div>															
					<div class="form-group">
						<label class="control-label">Kraj							
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="+48666999000" class="form-control" name="country"  value=""/>
						<span class="help-block"></span>
					</div>					
					
					<div class="form-group">
						<label class="control-label">Telefon							
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="+48666999000" class="form-control" name="telephone"  value=""/>
						<span class="help-block"></span>
					</div>					
					
					<div class="form-group">
						<label class="control-label">Strona
						</label>
						<input form="add_pickup_address_form" type="text" placeholder="http://www.mywebsite.com" class="form-control" name='www' value="" />
						<input form="add_pickup_address_form" type="hidden" class="form-control" name="address_type" value="odbioru" />
						<span class="help-block"></span>
					</div>
					<div class="margiv-top-10">
						<a href="#" class="btn green" id="submit_pickup">
						Dodaj </a>
						<a href="#" class="btn default" id="cancel">
						Anuluj </a>
					</div>
					</form>
				</div>
			</div>
	</div>
	<!--end col-md-9-->
</div>
