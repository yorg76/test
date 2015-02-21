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
		
			<input type="hidden" name="boxes_reception" value="<?php echo $pricetable->boxes_reception;?>">
			<input type="hidden" name="boxes_sending" value="<?php echo $pricetable->boxes_sending;?>">
			<input type="hidden" name="boxes_storage" value="<?php echo $pricetable->boxes_storage;?>">
			<input type="hidden" name="document_scan" value="<?php echo $pricetable->document_scan;?>">
			<input type="hidden" name="document_copy" value="<?php echo $pricetable->document_copy;?>">
			<input type="hidden" name="document_notarial_copy" value="<?php echo $pricetable->document_notarial_copy;?>">
			<input type="hidden" name="position_disposal" value="<?php echo $pricetable->position_disposal;?>">
			
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
								<div class="col-md-6">
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
								<h3 class="block">Zamówienie pustych pudeł i kodów kreskowych</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział<span class="required">	
									* </span></label>
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
									<label class="control-label col-md-3">Ilość pudeł<span class="required">	
									* </span>
									</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="box_quantity_0"/>
										<span class="help-block">
										Podaj ile będziesz potrzebować pudeł</span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data odbioru
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
											<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
												<input type="text" class="form-control form-filter input-sm" readonly name="date_reception_0" placeholder="Termin dostarczenia pudeł" size="16">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<span class="help-block"></span>
										</div>
								</div>								
							</div>
							
							<div class="order_type_1" style="display: none;" >
								<h3 class="block">Zamówienie odbioru i magazynowania pudeł</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział<span class="required">	
									* </span></label>
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
									<label class="col-md-3 control-label">Czy pudła mają plomby ?<span class="required">	
									* </span></label>
									<div class="col-md-4">
										<input type="checkbox" value="sealed_boxes">
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Ilość pudeł<span class="required">	
									* </span>
									</label>
									<div class="col-md-4">
										<input type="text" class="form-control" name="box_quantity_1"/>
										<span class="help-block">
										Podaj ile będzie pudeł do odebrania </span>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data odbioru pudeł
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
											<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
												<input type="text" class="form-control form-filter input-sm" readonly name="date_reception_1" placeholder="Termin odbioru" size="16">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<span class="help-block"></span>
										</div>
								</div>
								
								<div class="margiv-top-10" id="description-container">
								</div>
								
								
								<h4 class="form-section">Opis pudła (opcjonalnie)</h4>
								
								<div class="box_description_template">	
								
									<div class="form-group">
										<label class="control-label col-md-3">Numer paczki
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_id_template"/>
											<span class="help-block">
											Musisz podać numer pudła</span>
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
										<label class="control-label col-md-3">Opis zawartości pudła<span class="required">	
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_description_template"/>
											<span class="help-block">
											Musisz opisać pudło</span>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-md-3">Okres przez jaki pudło ma być magazynowane<span class="required">	
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_date_template"/>
											<span class="help-block">
											Musisz podać jaki okres pudło ma być składowane</span>
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
								<h3 class="block">Zamówienie zniszczenie magazynowanych pudeł</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Numer pudła (kod kreskowy)</label>
									<div class="col-md-4">
										<div class="input-group">
									
											<input id="box_code" class="form-control" type="text" name="box_code" placeholder="Kod pudła"/>
											<span class="input-group-btn">
												<button id="add_box_to_order" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
											</span>
										
											<span class="help-block"></span>
										</div>
									</div>
								</div>
																							
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_2[]" id="boxes_list">
											<?php foreach($boxes as $box):?>
											<option value="<?php echo $box->id;?>"><?php echo $box->barcode?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="order_type_3" style="display: none;" >
								<h3 class="block">Zamówienie skanowania, kopii dokumentów</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Numer pudła (kod kreskowy)</label>
									<div class="col-md-4">
										<div class="input-group">
									
											<input id="box_code_4" class="form-control" type="text" name="box_code_3" placeholder="Kod pudła"/>
											<span class="input-group-btn">
												<button id="add_box_to_order_3" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
											</span>
										
											<span class="help-block"></span>
										</div>
									</div>
								</div>
																							
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_3[]" id="boxes_list">
											<?php foreach($boxes as $box):?>
											<option value="<?php echo $box->id;?>"><?php echo $box->barcode?></option>
											<?php endforeach;?>										
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Zawartość</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="contents_3[]">
										</select>
									</div>
								</div>
								
							</div>
							
							<div class="order_type_4" style="display: none;" >
								<h3 class="block">Zamówienie kopii notarialnej dokumentów</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Numer pudła (kod kreskowy)</label>
									<div class="col-md-4">
										<div class="input-group">
									
											<input id="box_code_4" class="form-control" type="text" name="box_code_4" placeholder="Kod pudła"/>
											<span class="input-group-btn">
												<button id="add_box_to_order_4" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
											</span>
										
											<span class="help-block"></span>
										</div>
									</div>
								</div>
																							
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_4[]" id="boxes_list">
											<?php foreach($boxes as $box):?>
											<option value="<?php echo $box->id;?>"><?php echo $box->barcode?></option>
											<?php endforeach;?>
										
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3">Zawartość</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="contents_4[]">
										</select>
									</div>
								</div>
								
								
							</div>
							<div class="order_type_5" style="display: none;" >
								<h3 class="block">Wypożyczenie pudeł</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Numer pudła (kod kreskowy)</label>
									<div class="col-md-4">
										<div class="input-group">
									
											<input id="box_code_5" class="form-control" type="text" name="box_code_5" placeholder="Kod pudła"/>
											<span class="input-group-btn">
												<button id="add_box_to_order_5" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
											</span>
										
											<span class="help-block"></span>
										</div>
									</div>
								</div>
																							
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<select multiple class="form-control" name="boxes_5[]" id="boxes_list">
											<?php foreach($boxes as $box):?>
											<option value="<?php echo $box->id;?>"><?php echo $box->barcode?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data dostawy pudeł
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
											<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
												<input type="text" class="form-control form-filter input-sm" readonly name="date_reception_5" placeholder="Termin dostawy" size="16">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<span class="help-block"></span>
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
									<label class="control-label col-md-3">Adres dostawy</label>
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
							<input type="hidden" name="final_price" value="0.00" />
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
									<label class="control-label col-md-3">Dział<span class="required">	
									* </span></label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_0"></p>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Ilość pudeł</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="box_quantity_0" > </p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data odbioru</label>
										<div class="col-md-4">											
											<p class="form-control-static" data-display="date_reception_0" > </p>
										</div>
								</div>																					
							</div>
							
							<div class="order_type_1" style="display: none;" >
								<h3 class="block">Zamówienie odbioru i magazynowania pudeł</h3>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dział<span class="required">	
									* </span></label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="division_1">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Ilość pudeł<span class="required">	
									* </span>
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="box_quantity_1">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data odbioru
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
										<p class="form-control-static" data-display="date_reception_1">
										</p>
										</div>
								</div>
								
								<div class="margiv-top-10" id="description-container">
								</div>
							</div>
							
							<div class="order_type_2" style="display: none;" >
								
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
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_3[]">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dokumenty</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="contents_3[]">
										</p>
									</div>
								</div>
								
							</div>
							
							<div class="order_type_4" style="display: none;" >
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_4[]">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Dokumenty</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="contents_4[]">
										</p>
									</div>
								</div>
							</div>
							
							<div class="order_type_5" style="display: none;" >
								
								<input type="hidden" name="box_quantity_5" value="0" />
								
								<div class="form-group">
									<label class="control-label col-md-3">Pudła</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="boxes_5[]">
										</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3">Data dostawy
										<span class="required" aria-required="true"> * </span>
									</label>
										<div class="col-md-4">
										<p class="form-control-static" data-display="date_reception_5">
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
									<label class="control-label col-md-3">Telefon							
									</label>
									<div class="col-md-4">
										<p class="form-control-static" data-display="telephone">
										</p>
									</div>
								</div>					
							</div>		
								
							<h4 class="form-section">Cena</h4>
							
							<div class="form-group">
								<label class="control-label col-md-3">Cena netto							
								</label>
								<div class="col-md-4">
									<p class="form-control-static" id="final_price_netto">
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Cena brutto							
								</label>
								<div class="col-md-4">
									<p class="form-control-static" id="final_price_brutto">
									</p>
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