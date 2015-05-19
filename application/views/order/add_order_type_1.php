
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
									<label class="control-label col-md-3">Czy pudła mają plomby ?
									</label>
									<div class="checkbox-list col-md-4">
										<label class="checkbox-inline">
										<input type="checkbox" id="sealed_boxes" name="sealed_boxes" value="1" onClick="javascript:$('input[name=sealed_boxes_n]').attr('checked',false);"> Tak </label>
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
								
								<div class="form-group">
									<label class="control-label col-md-3">Dodać opis pudeł ?
									</label>
									<div class="checkbox-list col-md-4">
										<label class="checkbox-inline">
										<input type="checkbox" id="boxes_description" name="boxes_description" value="1" onClick="javascript:$('input[name=boxes_description_n]').attr('checked',false);"> Tak </label>
									</div>
								</div>
																
								<div class="margiv-top-10" id="description-container">
								</div>
								
								
								<h4 class="form-section">Opis pudła (opcjonalnie)</h4>
								<div id="box_description_form" style="display:none;">
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
										<label class="control-label col-md-3">Kategoria magazynowania<span class="required">	
										* </span></label>
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
										<label class="control-label col-md-3">Rok najstarszego dokumentu w pudełku<span class="required">	
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" class="form-control" name="box_date_template"/>
											<span class="help-block">
											Musisz podać jaki jest rok sporządzenia najstarszego dokumentu.</span>
										</div>
									</div>
								</div>
								
								<div class="margiv-top-10">
									<a href="#" class="btn red" id="add_box_description">
									Dodaj kolejne pudło </a>
									<a href="#" class="btn default" id="add_box_cancel">
									Anuluj </a>
								</div>	
								</div>
								
							
							