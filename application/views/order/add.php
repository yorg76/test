<div class="portlet box blue" id="form_wizard_1">
<div class="portlet-title">
	<div class="caption">
		<i class="fa fa-gift"></i> Dodaj zamówienie - <span class="step-title">
		Krok 1 z 4 </span>
	</div>
	<div class="tools hidden-xs">
		<a href="javascript:;" class="collapse">
		</a>
	</div>
</div>
<div class="portlet-body form">
		<form action="/order/add" class="form-horizontal" id="submit_form" method="POST">
			<div class="form-wizard">
				<div class="form-body">
					<ul class="nav nav-pills nav-justified steps">
						<li>
							<a href="#tab1" data-toggle="tab" class="step step1">
							<span class="number">
							1 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Rodzaj zamówienia</span>
							</a>
						</li>
						<li>
							<a href="#tab2" data-toggle="tab" class="step step2">
							<span class="number">
							2 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Wybór zawartości </span>
							</a>
						</li>
						<li>
							<a href="#tab3" data-toggle="tab" class="step active step3">
							<span class="number">
							3 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Adres</span>
							</a>
						</li>
						<li>
							<a href="#tab4" data-toggle="tab" class="step step4">
							<span class="number">
							4 </span>
							<span class="desc">
							<i class="fa fa-check"></i> Potwierdzenie </span>
							</a>
						</li>
					</ul>
					<div id="bar" class="progress progress-striped" role="progressbar">
						<div class="progress-bar progress-bar-success">
						</div>
					</div>
					<div class="tab-content">
						<div class="alert alert-danger display-none">
							<button class="close" data-dismiss="alert"></button>
							W formularzu są błędy, proszę spójrz poniżej.
						</div>
						<div class="alert alert-success display-none">
							<button class="close" data-dismiss="alert"></button>
							Twoje zamówienie zostało pomyślnie dodane.
						</div>
						<div class="tab-pane active" id="tab1">
							<h3 class="block">Rodzaj zamówienia</h3>
							
							<div class="form-group">
								<label class="control-label col-md-3">Rodzaj zamówienia</label>
								<div class="col-md-4">
								<select class="form-control" name="order_type">
										<option value="" > -- Wybierz -- </option>
									<?php foreach($order_types as $kt=>$ot):?>
										<option value="<?php echo $kt ?>" ><?php echo $ot?></option>
									<?php endforeach;?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="tab2">
						
							<div class="order_type_0" style="display: none;" >
								<h3 class="block">Zamówienie pudeł i kodów kreskowych</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<select class="form-control" name="warehouse_0">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($warehouses as $warehouse):?>
												<option value="<?php echo $warehouse->id ?>" ><?php echo $warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<select class="form-control" name="division_0">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($divisions as $division):?>
												<option value="<?php echo $division->id ?>" ><?php echo $division->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_0[]">
											<?php foreach($boxes as $box):?>
												<option value="<?php echo $box->id ?>" ><?php echo $box->id ."-".$box->storagecategory->name."-".$box->warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="order_type_1" style="display: none;" >
								<h3 class="block">Zamówienie odbioru i magazynowania pudeł</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<select class="form-control" name="warehouse_1">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($warehouses as $warehouse):?>
												<option value="<?php echo $warehouse->id ?>" ><?php echo $warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<select class="form-control" name="division_1">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($divisions as $division):?>
												<option value="<?php echo $division->id ?>" ><?php echo $division->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Ilość pozycji<span class="required">	
									* </span>
									</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="box_quantity"/>
										<span class="help-block">
										Podaj ile będzie pudeł do odebrania </span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data odbioru
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
											<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
												<input type="text" class="form-control form-filter input-sm" readonly name="date_reception" placeholder="Termin odbioru" size="16">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<span class="help-block"></span>
										</div>
								</div>
								
								<div class="margiv-top-10" id="description-container">
								</div>
								
								
								<h4 class="form-section">Opis pozycji</h4>
								
								<div class="box_description_template">	
								
									<div class="form-group">
										<label class="control-label col-md-3">Numer paczki<span class="required">	
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_id_template"/>
											<span class="help-block">
											Musisz podać numer pozycji</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Kategoria magazynowania</label>
										<div class="col-md-4">
											<select class="form-control" name="box_storagecategory_template" id="box_storagecategory_template">
													<option value="" > -- Wybierz -- </option>
												<?php foreach($storagecategories as $storagecategory):?>
													<option value="<?php echo $storagecategory->id ?>" ><?php echo $storagecategory->name?></option>
												<?php endforeach;?>
											</select>
											<span class="help-block">
											Wybierz kategorię magazynowania</span>
										</div>
									</div>							
										
									<div class="form-group">
										<label class="control-label col-md-3">Opis zawartości pozycji<span class="required">	
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_description_template"/>
											<span class="help-block">
											Musisz opisać pozycję</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Okres przez jaki pozycja ma być magazynowana<span class="required">	
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_date_template"/>
											<span class="help-block">
											Musisz podać jaki okres pudło ma być składowane pozycję</span>
										</div>
									</div>
								
								</div>
								
								<div class="margiv-top-10">
									<a href="#" class="btn green" id="add_box_description">
									Dodaj </a>
									<a href="#" class="btn default" id="add_box_cancel">
									Anuluj </a>
								</div>	
							</div>
							
							<div class="order_type_2" style="display: none;" >
								<h3 class="block">Zamówienie zniszczenie magazynowanych pozycji</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<select class="form-control" name="warehouse_2">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($warehouses as $warehouse):?>
												<option value="<?php echo $warehouse->id ?>" ><?php echo $warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<select class="form-control" name="division_2">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($divisions as $division):?>
												<option value="<?php echo $division->id ?>" ><?php echo $division->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_2[]">
											<?php foreach($boxes as $box):?>
												<option value="<?php echo $box->id ?>" ><?php echo $box->id ."-".$box->storagecategory->name."-".$box->warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="order_type_3" style="display: none;" >
								<h3 class="block">Zamówienie skanowania, kopii dokumentów</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<select class="form-control" name="warehouse_3">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($warehouses as $warehouse):?>
												<option value="<?php echo $warehouse->id ?>" ><?php echo $warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<select class="form-control" name="division_3">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($divisions as $division):?>
												<option value="<?php echo $division->id ?>" ><?php echo $division->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_3[]">
											<?php foreach($boxes as $box):?>
												<option value="<?php echo $box->id ?>" ><?php echo $box->id ."-".$box->storagecategory->name."-".$box->warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="order_type_4" style="display: none;" >
								<h3 class="block">Zamówienie kopii notarialnej dokumentów</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<select class="form-control" name="warehouse_4">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($warehouses as $warehouse):?>
												<option value="<?php echo $warehouse->id ?>" ><?php echo $warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<select class="form-control" name="division_4">
												<option value="" > -- Wybierz -- </option>
											<?php foreach($divisions as $division):?>
												<option value="<?php echo $division->id ?>" ><?php echo $division->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_4[]">
											<?php foreach($boxes as $box):?>
												<option value="<?php echo $box->id ?>" ><?php echo $box->id ."-".$box->storagecategory->name."-".$box->warehouse->name?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
							</div>
						</div>

						<div class="tab-pane" id="tab3">
							<div id="skip" style="display:none">
								<div class="margiv-top-10">
									<p class="btn green">W tym rodzaju zamówienia adres pobierany jest z ustawień firmy, 
									proszę wcisnąć dalej.
									</p>
								</div>								
							</div>		
							<div id="doc" style="display:none">
								<div class="margiv-top-10">
									<!--  <a href="#" class="btn green" id="show_utilisation_document" data-toggle="modal" data-target="#long">
									Pokaż dokument utylizacji</a>
									<a href="#" class="btn default" id="print_utilisation_document">
									Drukuj do PDF</a>
									-->
									<p class="btn green">Po złożeniu zamówienia dokument utylizacji zostanie przesłany za pomocą poczty elektornicznej, proszę wcisnąć dalej.
									</p>
								</div>		
								
								<div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true" aria-hidden="true" style="display: none; margin-top: -475px;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title">Dokument utylizacji</h4>
									</div>
									<div class="modal-body">
										<img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg">
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-default">Zamknij</button>
									</div>
								</div>
								
														
							</div>		
											
							<div id="pickup_address" style="display:none">						
								
								<div class="form-group">
									<label class="control-label col-md-3">Adres odbioru</label>
									<div class="col-md-4">
										<select class="form-control" name="pickup_address">
												<option value="" > -- Wybierz -- </option>
											<?php foreach ($pickup_addresses as $pa):?>
												<option value="<?php echo $pa->id ?>" ><?php echo $pa->street." ".$pa->number."/".$pa->flat.", ".$pa->postal.", ".$pa->city; ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>				
								<div class="form-group">
									<label class="control-label  col-md-3">Ulica
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="ul. Pana Jana " class="form-control" name="street"   />
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Numer <span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="1" class="form-control" name="number"  />
										<span class="help-block"></span>
									</div>
								</div>					
								<div class="form-group">
									<label class="control-label col-md-3">Lokal							
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="1" class="form-control" name="flat"  />
										<span class="help-block"></span>
									</div>
								</div>					
																		
								<div class="form-group">
									<label class="control-label col-md-3">Miasto
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="Warszawa" class="form-control" name="city"   />
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Kod pocztowy
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="00-001" class="form-control" name='postal'  />
										<span class="help-block"></span>
									</div>
								</div>															
								<div class="form-group">
									<label class="control-label col-md-3">Kraj							
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="" class="form-control" name="country"  />
										<span class="help-block"></span>
									</div>
								</div>					
								
								<div class="form-group">
									<label class="control-label col-md-3">Telefon							
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="+48666999000" class="form-control" name="telephone"  />
										<span class="help-block"></span>
									</div>
								</div>					
							</div>
							
							<div id="delivery_address" style="display:none">
								<div class="form-group">
									<label class="control-label col-md-3">Adres odbioru</label>
									<div class="col-md-4">
										<select class="form-control" name="delivery_address">
											<option value="" > -- Wybierz -- </option>
											<?php foreach ($delivery_addresses as $da):?>
												<option value="<?php echo $da->id ?>" ><?php echo $da->street." ".$da->number."/".$da->flat.", ".$da->postal.", ".$da->city; ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Ulica
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="ul. Pana Jana " class="form-control" name="street"  />
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Numer
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="1" class="form-control" name="number"  />
										<span class="help-block"></span>
									</div>
								</div>					
								<div class="form-group">
									<label class="control-label col-md-3">Lokal							
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="1" class="form-control" name="flat"  />
										<span class="help-block"></span>
									</div>
								</div>					
																		
								<div class="form-group">
									<label class="control-label col-md-3">Miasto
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="Warszawa" class="form-control" name="city"   />
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Kod pocztowy
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="00-001" class="form-control" name='postal'  />
										<span class="help-block"></span>
									</div>
								</div>															
								<div class="form-group">
									<label class="control-label col-md-3">Kraj							
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="" class="form-control" name="country"  />
										<span class="help-block"></span>
									</div>
								</div>					
								
								<div class="form-group">
									<label class="control-label col-md-3">Telefon							
									</label>
									<div class="col-md-4">
										<input  type="text" placeholder="+48666999000" class="form-control" name="telephone"  />
										<span class="help-block"></span>
									</div>
								</div>					
							</div>						
						</div>
							
						<div class="tab-pane" id="tab4">
							<h3 class="block">Potwierdzenie zamówienia</h3>
							
							<h4 class="form-section">Rodzaj zamówienia</h4>
							
							<div class="form-group">
								<label class="control-label col-md-3">Rodzaj:</label>
								<div class="col-md-4">
									<p class="form-control-static" data-display="order_type">
									</p>
								</div>
							</div>
							
													
							<h4 class="form-section">Zawartość</h4>
							
							<div class="order_type_0" style="display: none;" >
								
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="warehouse_0"></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_0"></p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_0[]"></p>
									</div>
								</div>
								
							</div>
							
							<div class="order_type_1" style="display: none;" >
								<h3 class="block">Zamówienie odbioru i magazynowania pudeł</h3>
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="warehouse_1">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_1">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Ilość pozycji<span class="required">	
									* </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="box_quantity">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data odbioru
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
										<p class="form-control-static" data-display="date_reception">
										</p>
										</div>
								</div>
								
								<div class="margiv-top-10" id="description-container">
								</div>
							</div>
							
							<div class="order_type_2" style="display: none;" >
								
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="warehouse_2">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_2">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_2[]">
										</p>
									</div>
								</div>
							</div>
							
							<div class="order_type_3" style="display: none;" >
								
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="warehouse_3">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_3">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_3[]">
										</p>
									</div>
								</div>
								
							</div>
							
							<div class="order_type_4" style="display: none;" >
								
								<div class="form-group">
									<label class="control-label col-md-3">Magazyn</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="warehouse_4">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_4">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_4[]">
										</p>
									</div>
								</div>
								
							</div>
							
							
							<h4 class="form-section">Adres / Dokumenty</h4>
							
							<div id="skip" style="display:none">
								<div class="margiv-top-10">
									<p class="btn green">W tym rodzaju zamówienia adres pobierany jest z ustawień firmy, 
									proszę wcisnąć dalej.
									</p>
								</div>								
							</div>		
							<div id="doc" style="display:none">
									<p class="btn green">Wciśnij prześlij aby otrzymać dokument utlizacji.
									</p>		
							</div>		
											
							<div id="pickup_address" style="display:none">						
								
								<div class="form-group">
									<label class="control-label col-md-3">Adres odbioru</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="pickup_address">
										</p>
									</div>
								</div>				
								<div class="form-group">
									<label class="control-label  col-md-3">Ulica
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="street">
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Numer <span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="number">
										</p>
									</div>
								</div>					
								<div class="form-group">
									<label class="control-label col-md-3">Lokal							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="flat">
										</p>
									</div>
								</div>					
																		
								<div class="form-group">
									<label class="control-label col-md-3">Miasto
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="city">
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Kod pocztowy
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="postal">
										</p>
									</div>
								</div>															
								<div class="form-group">
									<label class="control-label col-md-3">Kraj							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="caountry">
										</p>
									</div>
								</div>					
								
								<div class="form-group">
									<label class="control-label col-md-3">Telefon							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="telephone">
										</p>
									</div>
								</div>					
							</div>
							
							<div id="delivery_address" style="display:none">
								<div class="form-group">
									<label class="control-label col-md-3">Adres odbioru</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="delivery_address">
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Ulica
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="street">
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Numer
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="number">
										</p>
									</div>
								</div>					
								<div class="form-group">
									<label class="control-label col-md-3">Lokal							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="flat">
										</p>
									</div>
								</div>					
																		
								<div class="form-group">
									<label class="control-label col-md-3">Miasto
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="city">
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Kod pocztowy
										<span class="required" aria-required="true"> * </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="postal">
										</p>
									</div>
								</div>															
								<div class="form-group">
									<label class="control-label col-md-3">Kraj							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="country">
										</p>
									</div>
								</div>					
								
								<div class="form-group">
									<label class="control-label col-md-3">Telefon							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="telephone">
										</p>
									</div>
								</div>					
							</div>		
								
						</div>
					</div>
				</div>
				<div class="form-actions fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-offset-3 col-md-9">
								<a href="javascript:;" class="btn default button-previous">
								<i class="m-icon-swapleft"></i> Wróć </a>
								<a href="javascript:;" class="btn blue button-next">
								Dalej <i class="m-icon-swapright m-icon-white"></i>
								</a>
								<a href="javascript:;" class="btn green button-submit">
								Prześlij <i class="m-icon-swapright m-icon-white"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>