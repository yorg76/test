<div class="row profile-ac	count">
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active"><a data-toggle="tab" href="#tab_1-1"> <i
					class="fa fa-cog"></i> Dane podstawowe
			</a> <span class="after"></span></li>
		</ul>
	</div>
	<div class="col-md-9">
		<form action="/order/edit_order/<?php echo $order->id; ?>" class="form-horizontal" id="edit_order_form"
			method="POST">
			
			<input type="hidden" class="form-control" name="order_id" value="<?php echo $order->id;?>">
			<input type="hidden" class="form-control" name="customer_id" value="<?php echo $customer->id;?>">
		
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Popraw błędy w formularzu</span>
			</div>
			<div class="tab-content">

				<div id="tab_1-1" class="tab-pane active">
					<h3 class="block">Zamówienie <?php echo $order->id ?> - <?php echo $order->type ?> - <?php echo $order->order->create_date ?></h3>
						
					<div class="portlet-body form">
						<h3 class="block">Klient</h3>
						<div class="form-group">
							<label class="control-label col-md-3">Nazwa</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="customer_name" value="<?php echo $customer->name;?>" disabled="true" >
							</div>
						</div>
						
							<div class="form-group">
							<label class="control-label col-md-3">Termin dostawy / odbioru</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="customer_name" value="<?php echo $order->order->pickup_date;?>" disabled="true" >
							</div>
						</div>
					</div>
					

					
					<div class="portlet-body form">
								
						
													
						<?php if($order->type == 'Zamówienie pustych pudeł i kodów kreskowych') :?>

						<div class="form-group">
							<label class="control-label col-md-3">Dział</label>
							<div class="col-md-4">
								<select class="form-control" name="division" disabled="true" >
										<?php foreach($divisions as $division):?>
											<?php $dselected = ($order->order->division->id == $division->id ? "selected" : "");?>
											<option value="<?php echo $division->id ?>"
										<?php echo $dselected;?>><?php echo $division->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Ilość pudeł</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="quantity" value="<?php echo $order->order->quantity;?>" disabled="true" >
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Data dostarczenia</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="pickup_date" value="<?php echo $order->order->pickup_date;?>" disabled="true" >
							</div>
						</div>
												
						<input type="hidden" name="address_id"
							value="<?php echo $order->order->address->id ?>">
							
						<h3 class="block">Adres</h3>
						
						<div class="form-group">
							<label class="control-label  col-md-3">Ulica <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="ul. Pana Jana " disabled="true" 
									class="form-control" name="street"
									value="<?php echo $order->order->address->street ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Numer <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="1" class="form-control" disabled="true" 
									name="number"
									value="<?php echo $order->order->address->number ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Lokal </label>
							<div class="col-md-4">
								<input type="text" placeholder="1" class="form-control" disabled="true" 
									name="flat" value="<?php echo $order->order->address->flat ?>" />
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Miasto <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="Warszawa" class="form-control" disabled="true" 
									name="city" value="<?php echo $order->order->address->city ?>" />
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kod pocztowy <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="00-001" class="form-control" disabled="true" 
									name='postal'
									value="<?php echo $order->order->address->postal ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kraj </label>
							<div class="col-md-4">
								<input type="text" placeholder="" class="form-control" disabled="true" 
									name="country"
									value="<?php echo $order->order->address->country ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Telefon </label>
							<div class="col-md-4">
								<input type="text" placeholder="+48666999000" disabled="true" 
									class="form-control" name="telephone"
									value="<?php echo $order->order->address->telephone ?>" /> <span
									class="help-block"></span>
							</div>
						</div>					
							
						<?php elseif ($order->type == 'Zamówienie odbioru i magazynowania pudeł'):?>
							<div class="form-group">
							<label class="control-label col-md-3">Magazyn</label>
							<div class="col-md-4">
								<select class="form-control" name="warehouse" disabled="true" >
										
										<?php foreach($warehouses as $warehouse):?>
											<?php $wselected = ($order->order->warehouse->id == $warehouse->id ? "selected" : "");?>
											<option value="<?php echo $warehouse->id ?>"
										<?php echo $wselected;?>><?php echo $warehouse->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Dział</label>
							<div class="col-md-4">
								<select class="form-control" name="division" disabled="true" >
										<?php foreach($divisions as $division):?>
											<?php $dselected = ($order->order->division->id == $division->id ? "selected" : "");?>
											<option value="<?php echo $division->id ?>"
										<?php echo $dselected;?>><?php echo $division->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<input type="hidden" name="address_id"
							value="<?php echo $order->order->address->id ?>">
							
						<h3 class="block">Adres</h3>
						
						<div class="form-group">
							<label class="control-label  col-md-3">Ulica <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="ul. Pana Jana " disabled="true" 
									class="form-control" name="street"
									value="<?php echo $order->order->address->street ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Numer <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="1" class="form-control" disabled="true" 
									name="number"
									value="<?php echo $order->order->address->number ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Lokal </label>
							<div class="col-md-4">
								<input type="text" placeholder="1" class="form-control" disabled="true" 
									name="flat" value="<?php echo $order->order->address->flat ?>" />
								<span class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Miasto <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="Warszawa" class="form-control" disabled="true" 
									name="city" value="<?php echo $order->order->address->city ?>" />
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kod pocztowy <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input type="text" placeholder="00-001" class="form-control" disabled="true" 
									name='postal'
									value="<?php echo $order->order->address->postal ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kraj </label>
							<div class="col-md-4">
								<input type="text" placeholder="" class="form-control" disabled="true" 
									name="country"
									value="<?php echo $order->order->address->country ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Telefon </label>
							<div class="col-md-4">
								<input type="text" placeholder="+48666999000" disabled="true" 
									class="form-control" name="telephone"
									value="<?php echo $order->order->address->telephone ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<h4 class="form-section">Opis pudła</h4>
						<div class="margiv-top-10" id="description-container">
								<?php foreach($order->order->orderdetails->find_all() as $ordd):?>
								<h5 class="form-section">Opis pudła <?php echo $ordd->box_number;?></h5>
							<div class="form-group">
								<label class="control-label col-md-3">Numer paczki<span
									class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="box_ids[]" disabled="true" 
										value="<?php echo $ordd->box_number ?>" /> <span
										class="help-block"> Musisz podać numer pudła</span>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3">Kategoria magazynowania</label>
								<div class="col-md-4">
									<select class="form-control" name="box_storagecategories[]" disabled="true" >
										<option>-- Wybierz --</option>
											<?php foreach($storagecategories as $storagecategory):?>
												<?php $scselected = ($ordd->storagecategory == $storagecategory->id ? "selected" : "");?>
												<option value="<?php echo $storagecategory->id ?>"
											<?php echo $scselected; ?>><?php echo $storagecategory->name?></option>
											<?php endforeach;?>
										</select> <span class="help-block"> Wybierz kategorię
										magazynowania</span>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3">Opis zawartości pudła<span
									class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" disabled="true" 
										name="box_descriptions[]"
										value="<?php echo $ordd->box_description ?>" /> <span
										class="help-block"> Musisz opisać pudło</span>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3">Data do kiedy pudło ma
									być magazynowane<span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="text" class="form-control" name="box_dates[]" disabled="true" 
										value="<?php echo $ordd->box_date ?>" /> <span
										class="help-block"> Musisz podać jaki okres pudło ma być
										składowane</span>
								</div>
							</div>
								<?php endforeach;?>
							</div>

						
						</div>
							
						<?php elseif ($order->type == 'Zamówienie zniszczenie magazynowanych pudeł'):?>
						<div class="form-group">
							<label class="control-label col-md-3">Magazyn</label>
							<div class="col-md-4">
								<select class="form-control" name="warehouse" disabled="true" >
										
										<?php foreach($warehouses as $warehouse):?>
											<?php $wselected = ($order->order->warehouse->id == $warehouse->id ? "selected" : "");?>
											<option value="<?php echo $warehouse->id ?>"
										<?php echo $wselected;?>><?php echo $warehouse->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Dział</label>
							<div class="col-md-4">
								<select class="form-control" name="division" disabled="true" >
										<?php foreach($divisions as $division):?>
											<?php $dselected = ($order->order->division->id == $division->id ? "selected" : "");?>
											<option value="<?php echo $division->id ?>"
										<?php echo $dselected;?>><?php echo $division->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Pudła</label>
							<div class="col-md-6">
								<select multiple class="form-control" name="boxes[]" disabled="true" >
										<?php foreach($boxes as $box):?>
											<?php $bselected = ($order->order->has('boxes',ORM::factory('Box',$box->id)) ? "selected" : "");?>
											<option value="<?php echo $box->id ?>" <?php echo $bselected?> ><?php echo sprintf('%012d',$box->barcode);?> - 								
										<span style="margin-left: 120px;"> <?php echo $box->place->barcode."-".$box->place->description."-".$box->warehouse->name; ?> </span>
										
										</option>
										<?php endforeach;?>
									</select>
							</div>
						</div>
						
						<h3 class="block">Adres</h3>
						
						<div class="form-group">
							<label class="control-label  col-md-3">Ulica <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="ul. Pana Jana " disabled="true" 
									class="form-control" name="street"
									value="<?php echo $order->order->address->street ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Numer <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="1" disabled="true" 
									class="form-control" name="number"
									value="<?php echo $order->order->address->number ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Lokal </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="1" disabled="true" 
									class="form-control" name="flat"
									value="<?php echo $order->order->address->flat ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Miasto <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="Warszawa" disabled="true" 
									class="form-control" name="city"
									value="<?php echo $order->order->address->city ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kod pocztowy <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="00-001" disabled="true" 
									class="form-control" name='postal'
									value="<?php echo $order->order->address->postal ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kraj </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="" disabled="true" 
									class="form-control" name="country"
									value="<?php echo $order->order->address->country ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Telefon </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="+48666999000" disabled="true" 
									class="form-control" name="telephone"
									value="<?php echo $order->order->address->telephone ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						
						<h4 class="form-section">Dokumenty</h4>
									
						
						<div class="margiv-top-10">
							<a href="#" class="btn green" id="show_utilisation_document"
								data-toggle="modal" data-target="#doc"> Pokaż dokument
								utylizacji</a> <a href="#" class="btn default"
								id="print_utilisation_document"> Drukuj do PDF</a>
						</div>

						<div id="doc" class="modal fade modal-scroll" tabindex="-1"
							data-replace="true" aria-hidden="true"
							style="display: none; background-color:white; width:800px; padding: 1em; left:10px;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"
									aria-hidden="true"></button>
								<h4 class="modal-title">Dokument utylizacji</h4>
							</div>
							<div class="modal-body">
								
							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal"
									class="btn btn-default">Zamknij</button>
							</div>
						</div>

						<?php elseif ($order->type == 'Zamówienie skanowania, kopii dokumentów' || $order->type == 'Zamówienie kopii notarialnej dokumentów'):?>
						<div class="form-group">
							<label class="control-label col-md-3">Magazyn</label>
							<div class="col-md-4">
								<select class="form-control" name="warehouse" disabled="true" >
										
										<?php foreach($warehouses as $warehouse):?>
											<?php $wselected = ($order->order->warehouse->id == $warehouse->id ? "selected" : "");?>
											<option value="<?php echo $warehouse->id ?>"
										<?php echo $wselected;?>><?php echo $warehouse->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Dział</label>
							<div class="col-md-4">
								<select class="form-control" name="division" disabled="true" >
										<?php foreach($divisions as $division):?>
											<?php $dselected = ($order->order->division->id == $division->id ? "selected" : "");?>
											<option value="<?php echo $division->id ?>"
										<?php echo $dselected;?>><?php echo $division->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Pudła</label>
							<div class="col-md-6">
								<select multiple class="form-control" name="boxes[]" disabled="true" >
										<?php foreach($boxes as $box):?>
											<?php $bselected = ($order->order->has('boxes',ORM::factory('Box',$box->id)) ? "selected" : "");?>
											<option value="<?php echo $box->id ?>"<?php echo $bselected?>
											 ><?php echo sprintf('%012d',$box->barcode);?> - 
										<span style="margin-left: 120px;"> <?php echo $box->place->barcode."-".$box->place->description."-".$box->warehouse->name; ?> </span>
										</option>
										<?php endforeach;?>
									</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3">Dokumenty</label>
							<div class="col-md-6">
								<select multiple class="form-control" name="contents[]" disabled="true" >
										<?php foreach($documents as $doc):?>
											<?php $bselected = ($order->order->has('documents',ORM::factory('Document',$doc->id)) ? "selected" : "");?>
											<option value="<?php echo $doc->id ?>"<?php echo $bselected?>
											 >Dokument <?php echo $doc->name;?>
										</option>
										<?php endforeach;?>
									</select>
							</div>
						</div>
						
						<h3 class="block">Adres</h3>
						
						<div class="form-group">
							<label class="control-label  col-md-3">Ulica <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="ul. Pana Jana " disabled="true" 
									class="form-control" name="street"
									value="<?php echo $order->order->address->street ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Numer <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="1" disabled="true" 
									class="form-control" name="number"
									value="<?php echo $order->order->address->number ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Lokal </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="1" disabled="true" 
									class="form-control" name="flat"
									value="<?php echo $order->order->address->flat ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Miasto <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="Warszawa" disabled="true" 
									class="form-control" name="city"
									value="<?php echo $order->order->address->city ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kod pocztowy <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="00-001" disabled="true" 
									class="form-control" name='postal'
									value="<?php echo $order->order->address->postal ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kraj </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="" disabled="true" 
									class="form-control" name="country"
									value="<?php echo $order->order->address->country ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Telefon </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="+48666999000" disabled="true" 
									class="form-control" name="telephone"
									value="<?php echo $order->order->address->telephone ?>" /> <span
									class="help-block"></span>
							</div>
						</div>			
						
						<?php elseif ($order->type == 'Wypożyczenie pudeł'):?>
						<div class="form-group">
							<label class="control-label col-md-3">Magazyn</label>
							<div class="col-md-4">
								<select class="form-control" name="warehouse" disabled="true" >
										
										<?php foreach($warehouses as $warehouse):?>
											<?php $wselected = ($order->order->warehouse->id == $warehouse->id ? "selected" : "");?>
											<option value="<?php echo $warehouse->id ?>"
										<?php echo $wselected;?>><?php echo $warehouse->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Dział</label>
							<div class="col-md-4">
								<select class="form-control" name="division" disabled="true" >
										<?php foreach($divisions as $division):?>
											<?php $dselected = ($order->order->division->id == $division->id ? "selected" : "");?>
											<option value="<?php echo $division->id ?>"
										<?php echo $dselected;?>><?php echo $division->name?></option>
										<?php endforeach;?>
									</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Pudła</label>
							<div class="col-md-6">
								<select multiple class="form-control" name="boxes[]" disabled="true" >
										<?php foreach($boxes as $box):?>
											<?php $bselected = ($order->order->has('boxes',ORM::factory('Box',$box->id)) ? "selected" : "");?>
											<option value="<?php echo $box->id ?>" <?php echo $bselected?> ><?php echo sprintf('%012d',$box->barcode);?> -
										<span style="margin-left: 120px;"> <?php echo $box->place->barcode."-".$box->place->description."-".$box->warehouse->name; ?> </span>
										</option>
										<?php endforeach;?>
									</select>
							</div>
						</div>
						
						<h3 class="block">Adres</h3>
						
						<div class="form-group">
							<label class="control-label  col-md-3">Ulica <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="ul. Pana Jana " disabled="true" 
									class="form-control" name="street"
									value="<?php echo $order->order->address->street ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Numer <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="1" disabled="true" 
									class="form-control" name="number"
									value="<?php echo $order->order->address->number ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Lokal </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="1" disabled="true" 
									class="form-control" name="flat"
									value="<?php echo $order->order->address->flat ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Miasto <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="Warszawa" disabled="true" 
									class="form-control" name="city"
									value="<?php echo $order->order->address->city ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kod pocztowy <span
								class="required" aria-required="true"> * </span>
							</label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="00-001" disabled="true" 
									class="form-control" name='postal'
									value="<?php echo $order->order->address->postal ?>" /> <span
									class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Kraj </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="" disabled="true" 
									class="form-control" name="country"
									value="<?php echo $order->order->address->country ?>" /> <span
									class="help-block"></span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3">Telefon </label>
							<div class="col-md-4">
								<input disabled="true" type="text" placeholder="+48666999000" disabled="true" 
									class="form-control" name="telephone"
									value="<?php echo $order->order->address->telephone ?>" /> <span
									class="help-block"></span>
							</div>
						</div>			
									
						<?php else:?>
						<?php endif;?>
					</div>
					<br />
					<div class="form-actions fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-offset-3 col-md-9">
									<a href="javascript:history.back(-1);" class="btn default button-previous"> <i
										class="m-icon-swapleft"></i> Wróć
									</a> 
									<a href="javascript:print();" class="btn blue button-primary"> <i
										class="glyphicon glyphicon-print"></i> Drukuj
									</a> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>