				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab_2_2">
									Dodaj pozycję</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_3">
									Dodaj dokument </a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_4">
									Dodaj listę kokumentów</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_5">
									Dodaj opakowanie zbiorcze</a>
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
												<label class="control-label">Kategoria przechowywania
													<span class="required" aria-required="true"> * </span>
												</label>
												<span class="help-block"></span>
												<div class="input-icon right">
													<select class="form-control" name="storage_category_id">
														<option>-- Wybierz kategorię --</option>
														<?php foreach ($storagecategories as $storagecategory):?>
														<?php 
																	echo "<option value=\"".$storagecategory->id."\">".$storagecategory->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Data początku magazynowania
													<span class="required" aria-required="true"> * </span>
												</label>
													<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
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
													<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
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
													<div class="input-group input-medium date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
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
														<option>-- Wybierz magazyn --</option>
														<?php foreach ($warehouses as $warehouse):?>
														<?php 
																	echo "<option value=\"".$warehouse->id."\">".$warehouse->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>				
											<div class="form-group">
												<label class="control-label">Status blokady
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon">
													<i class="fa fa-lock fa-fw"></i>
													<input id="lock" class="form-control" type="text" name="lock" placeholder="">
												</div>
											</div>
								
											<div class="form-group">
												<label class="control-label">Status plomby
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon">
													<i class="fa fa-lock fa-fw"></i>
													<input id="seal" class="form-control" type="text" name="seal" placeholder="">
												</div>
											</div>		
											<br/>
											<br/>
											<div class="margiv-top-10">
												<a href="/warehouse/boxes" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/warehouse/boxes" class="btn default" id="cancel">
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
															<label class="control-label">Wybór pozycji
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="box_id">
																	<option>-- Wybierz pozycję dla dokumentu --</option>
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
															<a href="/warehouse/documents" class="btn default" id="cancel">
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
															<label class="control-label">Wybór pozycji
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="box_id">
																	<option>-- Wybierz pozycję dla listy dokumentów --</option>
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
															<a href="/warehouse/documentlists" class="btn default" id="cancel">
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
															<label class="control-label">Wybór pozycji
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="box_id">
																	<option>-- Wybierz pozycję dla opakowania --</option>
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
															<a href="/warehouse/bulkpackagings" class="btn default" id="cancel">
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
															<div class="input-icon right">
																<select class="form-control" name="division_id">
																	<option>-- Wybierz dział --</option>
																	<?php foreach ($divisions as $division):?>
																	<?php 
																				echo "<option value=\"".$division->id."\">".$division->name."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block"></span>
														</div>
														<br/>
														<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
														<div class="margiv-top-10">
															<a href="/virtualbriefcase/virtualbriefcases" class="btn green" id="submit">
															Zapisz zmiany</a>
															<a href="/virtualbriefcase/virtualbriefcases" class="btn default" id="cancel">
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
							
							