				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab_2_2">
									Dodaj pudło</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_3">
									Dodaj dokument </a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_4">
									Dodaj listę dokumentów</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_5">
									Dodaj teczkę</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_6">
									Dodaj wirtualną teczkę</a>
								</li>
							</ul>
							
						<div class="tab-content">
							<div id="tab_2_2" class="tab-pane active">
								<div class="row">
									<div class="col-md-8">
										<div class="booking-search">
											<form role="form" action="/warehouse/box_add" method="POST" id="add_box_form">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										<span>Popraw błędy w formularzu</span>
									</div>
									<div class="tab-content">
										<div id="tab_1-1" class="tab-pane active">
											<div class="form-group">
												<label class="control-label">Klient
												</label>
												<div class="input-icon right">
												
													<select class="form-control" name="customer_id">
														<option value="" >-- Wybierz --</option>
														<?php foreach ($customers as $customer):?>
														<?php 
																echo "<option value=\"".$customer->id."\"".$checked." >".$customer->name."</option>";
														?>
														<?php endforeach;?>
													</select>
												</div>
											</div>
																
											<div class="form-group">
												<label class="control-label">Kod kreskowy
												</label>
												<div class="input-icon">
													<i class="fa fa-lock fa-fw"></i>
													<input id="lock" class="form-control" type="text" name="barcode" placeholder="">
												</div>
											</div>
																										
											<div class="form-group">
												<label class="control-label">Kategoria przechowywania
													<span class="required" aria-required="true"> * </span>
												</label>
												<span class="help-block">Wybierz kategorię magazynowania pudła</span>
												<div class="input-icon right">
													<select class="form-control" name="storage_category_id">
														<option value="">-- Wybierz kategorię --</option>
														<?php foreach ($storagecategories as $storagecategory):?>
														<?php 
																	echo "<option value=\"".$storagecategory->id."\">".$storagecategory->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													
														<?php foreach ($storagecategories as $storagecategory):?>
														
															<input type="hidden" value="<?php echo $storagecategory->period; ?>" name="storage_period_<?php echo $storagecategory->id?>"/>
														
														<?php endforeach;?>
													
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Rok najstarszego dokumentu w pudle
													<span class="required" aria-required="true"> * </span>
												</label>
													<div class="input-group input-medium date date-picker margin-bottom-5" id="document_year" data-date-format="yyyy" data-date-start-view="decade" data-date-min-view-mode="years" data-date-start-date="">
														<input type="text" class="form-control form-filter input-sm" readonly name="document_year" placeholder="Rok">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												<span class="help-block"></span>
											</div>
											
											<div class="form-group">
												<label class="control-label">Data początku magazynowania
													<span class="required" aria-required="true"> * </span>
												</label>
													<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
														<input type="text" class="form-control form-filter input-sm" readonly name="date_from" placeholder="Od">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												<span class="help-block"></span>
											</div>
											<div class="form-group">
												<label class="control-label">Data końca magazynowania
													<span class="required" aria-required="true"> * </span>
												</label>
													<div id="end_date" class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
														<input type="text" class="form-control form-filter input-sm" readonly name="date_to" placeholder="Do" size="16">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
												<span class="help-block"></span>
											</div>					
											<div class="form-group">
												<label class="control-label">Data odbioru
													<span class="required" aria-required="true"> * </span>
												</label>
													<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
														<input type="text" class="form-control form-filter input-sm" readonly name="date_reception" placeholder="Termin odbioru" size="16">
														<span class="input-group-btn">
														<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
														</span>
													</div>
													<span class="help-block"></span>
												</div>
											</div>		
											<div class="form-group">
												<label class="control-label">Magazyn
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control" name="warehouse_id">
														<option value="">-- Wybierz magazyn --</option>
														<?php foreach ($warehouses as $warehouse):?>
														<?php 
																	echo "<option value=\"".$warehouse->id."\">".$warehouse->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz magazyn dla pudła</span>
												</div>
											</div>				
											<div class="form-group">
												<label class="control-label">Status blokady
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon">
													<i class="fa fa-lock fa-fw"></i>
													<select id="lock" class="form-control" type="text" name="lock" placeholder="">
														<option value="0"> Brak blokady </option>
														<option value="1"> Zablokowane </option> 
													</select>
												</div>
											</div>
								
											<div class="form-group">
												<label class="control-label">Plomba 1
												</label>
												<div class="input-icon">
													<i class="fa fa-lock fa-fw"></i>
													<input id="seal" class="form-control" type="text" name="seal1" placeholder="">
												</div>
											</div>		
											<div class="form-group">
												<label class="control-label">Plomba 2</label>
												<div class="input-icon">
													<i class="fa fa-lock fa-fw"></i>
													<input id="seal" class="form-control" type="text" name="seal2" placeholder="">
												</div>
											</div>		
											
											<br/>
											<br/>
											<div class="margiv-top-10">
												<a href="/warehouse/boxes" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/warehouse/add_item" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
										</div>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_1_3" class="tab-pane">
								<div class="row">
									<div class="col-md-8">
										<div class="booking-search">
											<form enctype="multipart/form-data" role="form" action="/warehouse/document_add" method="POST" id="add_document_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
														<div class="form-group">
															<label class="control-label">Wybór pudła
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="box_id">
																	<option value="">-- Wybierz pudło dla dokumentu --</option>
																	<?php foreach ($boxes as $box):?>
																	<?php 
																				echo "<option value=\"".$box->id."\">".$box->id."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block"></span>
														</div>
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
															<textarea class="form-control" name="description"></textarea>
															<span class="help-block"></span>
														</div>
														<div class="form-group">
															<label for="control-label">Skan dokumentu</label>
															<input name="plik" type="file" id="upload">
															<!-- TODO UPLOAD (CZY AN FILESYSTEM CZY DO BAZY?)  -->
															<span class="help-block"></span>
														</div>
														<br/>
														<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
														<div class="margiv-top-10">
															<a href="/warehouse/documents" class="btn green" id="submit">
															Zapisz zmiany</a>
															<a href="/warehouse/add_item" class="btn default" id="cancel">
															Anuluj</a>
														</div>
													</div>	
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_1_4" class="tab-pane">
								<div class="row">	
									<div class="col-md-8">
										<div class="booking-search">
											<form role="form" action="/warehouse/documentlist_add" method="POST" id="add_documentlist_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
													<div class="form-group">
															<label class="control-label">Wybór pudła
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="box_id">
																	<option value="">-- Wybierz pudło dla listy dokumentów --</option>
																	<?php foreach ($boxes as $box):?>
																	<?php 
																				echo "<option value=\"".$box->id."\">".$box->id."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block"></span>
														</div>	
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
															<textarea class="form-control" name="description">
															</textarea>
															<span class="help-block"></span>
														</div>
														<br/>
														<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
														<div class="margiv-top-10">
															<a href="/warehouse/documentlists" class="btn green" id="submit">
															Zapisz zmiany</a>
															<a href="/warehouse/add_item" class="btn default" id="cancel">
															Anuluj</a>
														</div>
													</div>	
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							
							<!--end tab-pane-->
							<div id="tab_1_5" class="tab-pane">
								<div class="row">
									<div class="col-md-8">
										<div class="booking-search">
											<form role="form" action="/warehouse/bulkpackaging_add" method="POST" id="add_bulkpackaging_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
														<div class="form-group">
															<label class="control-label">Wybór pudła
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="box_id">
																	<option value="">-- Wybierz pudło dla teczki --</option>
																	<?php foreach ($boxes as $box):?>
																	<?php 
																				echo "<option value=\"".$box->id."\">".$box->id."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block"></span>
														</div>	
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
															<textarea class="form-control" name="description">
															</textarea>
															<span class="help-block"></span>
														</div>
														<br/>
														<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
														<div class="margiv-top-10">
															<a href="/warehouse/bulkpackagings" class="btn green" id="submit">
															Zapisz zmiany</a>
															<a href="/warehouse/add_item" class="btn default" id="cancel">
															Anuluj</a>
														</div>
													</div>	
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_1_6" class="tab-pane">
								<div class="row">	
									<div class="col-md-8">
										<div class="booking-search">
											<form role="form" action="/virtualbriefcase/virtualbriefcase_add" method="POST" id="add_virtualbriefcase_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
														
														<div class="form-group">
															<label class="control-label">Nazwa
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<input type="text" placeholder="Nazwa wirtualnej teczki" class="form-control" name="name" value="" />
																<span class="help-block"></span>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label">Opis
																<span class="required" aria-required="true"> * </span>
															</label>
															<textarea class="form-control" placeholder="Opis wirtualnej teczki" name="description">
															</textarea>
															<span class="help-block"></span>
														</div>
														<div class="form-group">
															<label class="control-label">Dział
																<span class="required" aria-required="true"> * </span>
															</label>
															<span class="help-block"></span>
															<div class="input-icon right">
																<select class="form-control" name="division_id">
																	<option value="">-- Wybierz dział --</option>
																	<?php foreach ($divisions as $division):?>
																	<?php 
																				echo "<option value=\"".$division->id."\">".$division->name."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															
														</div>
														<br/>
														<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
														<div class="margiv-top-10">
															<a href="/virtualbriefcase/virtualbriefcases" class="btn green" id="submit">
															Zapisz zmiany</a>
															<a href="/warehouse/add_item" class="btn default" id="cancel">
															Anuluj</a>
														</div>
													</div>	
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
				</div>
			</div>
							
							