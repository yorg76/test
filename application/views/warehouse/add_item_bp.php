				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
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
									Dodaj opakowanie zbiorcze</a>
								</li>
							</ul>
							
						<div class="tab-content">
							<div id="tab_1_3" class="tab-pane active">
							<h4>Opakowanie zbiorcze: <?php echo $bulkpackaging->name ?></h4>
								<div class="row">
									<div class="col-md-8">
										<div class="booking-search">
											<form enctype="multipart/form-data" role="form" action="/warehouse/document_add_bp" method="POST" id="add_document_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
														<div class="form-group">
															<label class="control-label">Wybór dokumentu
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="document_id">
																	<option value="">-- Wybierz dokument --</option>
																	<?php foreach ($documents as $document):?>
																	<?php 
																				echo "<option value=\"".$document->id."\">".$document->name."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block">Wybierz dodawany dokument do opakowania zbiorczego.</span>
														</div>
														
														<br/>
														<input type="hidden" value="<?php echo $bulkpackaging->id ?>" name="bulkpackaging_id" />
														<div class="margiv-top-10">
															<a href="/warehouse/bulkpackagings" class="btn green" id="submit">
															Dodaj dokument</a>
															<a href="/warehouse/add_item_bp" class="btn default" id="cancel">
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
							<h4>Opakowanie zbiorcze: <?php echo $bulkpackaging->name ?></h4>
								<div class="row">	
									<div class="col-md-8">
										<div class="booking-search">
											<form role="form" action="/warehouse/documentlist_add_bp" method="POST" id="add_documentlist_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
													<div class="form-group">
															<label class="control-label">Wybór listy dokumentów
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="documentlist_id">
																	<option value="">-- Wybierz listę dokumentów --</option>
																	<?php foreach ($documentlists as $documentlist):?>
																	<?php 
																				echo "<option value=\"".$documentlist->id."\">".$documentlist->name."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block">Wybierz dodawaną listę dokumentów do opakowania zbiorczego.</span>
														</div>	
														<br/>
														<input type="hidden" value="<?php echo $bulkpackaging->id ?>" name="bulkpackaging_id" />
														<div class="margiv-top-10">
															<a href="/warehouse/bulkpackagings" class="btn green" id="submit">
															Dodaj listę</a>
															<a href="/warehouse/add_item_bp" class="btn default" id="cancel">
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
							<h4>Opakowanie zbiorcze: <?php echo $bulkpackaging->name ?></h4>
								<div class="row">
									<div class="col-md-8">
										<div class="booking-search">
											<form role="form" action="/warehouse/childbulkpackaging_add" method="POST" id="add_childbulkpackaging_form">
												<div class="alert alert-danger display-hide">
													<button class="close" data-close="alert"></button>
													<span>Popraw błędy w formularzu</span>
												</div>
												<div class="tab-content">
												
													<div id="tab_1-1" class="tab-pane active">
														<div class="form-group">
															<label class="control-label">Wybór opakowania zbiorczego
																<span class="required" aria-required="true"> * </span>
															</label>
															<div class="input-icon right">
																<select class="form-control" name="bulkpackaging2_id">
																	<option value="">-- Wybierz opakowanie --</option>
																	<?php foreach ($childbulkpackagings as $childbulkpackaging):?>
																	<?php 
																				echo "<option value=\"".$childbulkpackaging->id."\">".$childbulkpackaging->name."</option>";
																	?>
																	<?php endforeach;?>
																</select>
															</div>
															<span class="help-block">Wybierz opakowanie zbiorcze do dodania.</span>
														</div>	
														<br/>
														<input type="hidden" value="<?php echo $bulkpackaging->id ?>" name="bulkpackaging1_id" />
														<div class="margiv-top-10">
															<a href="/warehouse/bulkpackaging_view/<?php echo $bulkpackaging->id; ?>" class="btn green" id="submit">
															Dodaj opakowanie</a>
															<a href="/warehouse/add_item_bp" class="btn default" id="cancel">
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
			
							
							