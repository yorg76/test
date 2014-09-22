				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="">
									<a data-toggle="tab" href="#box">
									Dodaj pozycję</a>
								</li>
								<li>
									<a data-toggle="tab" href="#document">
									Dodaj dokument </a>
								</li>
								<li>
									<a data-toggle="tab" href="#documentlist">
									Dodaj listę dokumentów</a>
								</li>
								<li>
									<a data-toggle="tab" href="#bulkpackaging">
									Dodaj opakowanie zbiorcze</a>
								</li>
								<li>
									<a data-toggle="tab" href="#virtualbriefcase">
									Dodaj wirtualną teczkę</a>
								</li>
							</ul>
							
						<div class="tab-content">
							<div id="box" class="tab-pane active">
								<div class="row">
									<div class="col-md-8">
										<form role="form" action="/virtualbriefcase/box_add" method="POST" id="add_box_form">
											<div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
												<span>Popraw błędy w formularzu</span>
											</div>
											<div class="form-group">
											
												<label class="control-label">Wybór pozycji
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="box_id">
														<option>-- Wybierz pozycję --</option>
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
											<span class="help-block"></span>
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option>-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													
												</div>
											</div>				
											<br/>
											<br/>
											
											<div class="margiv-top-10">
											
												<a href="/virtualbriefcase/virtualbriefcases" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/virtualbriefcases" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
										</div>
									</div>
								</div>
						
							
							<!--end tab-pane-->
						
							<div id="document" class="tab-pane">
								<div class="row">
									<div class="col-md-8">
										<form role="form" action="/virtualbriefcase/document_add" method="POST" id="add_document_form">
											<div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
												<span>Popraw błędy w formularzu</span>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór dokumentu
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="document_id">
														<option>-- Wybierz dokument --</option>
														<?php foreach ($documents as $document):?>
														<?php 
															echo "<option value=\"".$document->id."\">".$document->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option>-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/documents" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/documents" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
										</div>
									</div>
								</div>
						
							<!--end tab-pane-->
					
							<div id="documentlist" class="tab-pane">
								<div class="row">
									<div class="col-md-8">
										<form role="form" action="/virtualbriefcase/documentlist_add" method="POST" id="add_documentlist_form">
											<div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
												<span>Popraw błędy w formularzu</span>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór listy dokumentów
													<span class="required" aria-required="true"> * </span>
												</label>
												<span class="help-block"></span>
												<div class="input-icon right">
													<select class="form-control input-large" name="documentlist_id">
														<option>-- Wybierz listę --</option>
														<?php foreach ($documentlists as $documentlist):?>
														<?php 
															echo "<option value=\"".$documentlist->id."\">".$documentlist->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option>-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/documentlists" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/documentlists" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
										</div>
									</div>
								</div>
					
									
							<!--end tab-pane-->
						
							<div id="bulkpackaging" class="tab-pane">
								<div class="row">
									<div class="col-md-8">
										<form role="form" action="/virtualbriefcase/bulkpackaging_add" method="POST" id="add_bulkpackaging_form">
											<div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
												<span>Popraw błędy w formularzu</span>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór opakowania zbiorczego
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="bulkpackaging_id">
														<option>-- Wybierz opakowanie --</option>
														<?php foreach ($bulkpackagings as $bulkpackaging):?>
														<?php 
															echo "<option value=\"".$bulkpackaging->id."\">".$bulkpackaging->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option>-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/bulkpackagings" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/bulkpackagings" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
										</div>
									</div>
								</div>
						
							
		
							<!--end tab-pane-->
						
							<div id="virtualbriefcase" class="tab-pane">
								<div class="row">
									<div class="col-md-8">
											<form role="form" action="/virtualbriefcase/virtualbriefcase_add" method="POST" id="add_virtualbriefcase_form">
											<div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
												<span>Popraw błędy w formularzu</span>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option>-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option>-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block"></span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/virtualbriefcases" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/virtualbriefcases" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						</div>
							<!--end tab-pane-->
	
							