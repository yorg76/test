				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#box">
									Dodaj pudło</a>
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
									Dodaj teczkę</a>
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
											
												<label class="control-label">Wybór pudła
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="box_id">
														<option value="">-- Wybierz pudło --</option>
														<?php foreach ($boxes as $box):?>
														<?php 
															echo "<option value=\"".$box->id."\">".$box->id."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz pudło do dodania.</span>
												</div>
												
											</div>
											<div class="form-group">
											
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz docelową wirtualną teczkę.</span>
												</div>
											</div>				
											<br/>
											<br/>
											
											<div class="margiv-top-10">
											
												<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/add_item_vb" class="btn default" id="cancel">
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
														<option value="">-- Wybierz dokument --</option>
														<?php foreach ($documents as $document):?>
														<?php 
															echo "<option value=\"".$document->id."\">".$document->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz dokument do dodania.</span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz docelową wirtualną teczkę.</span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/add_item_vb" class="btn default" id="cancel">
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
												
												<div class="input-icon right">
													<select class="form-control input-large" name="documentlist_id">
														<option value="">-- Wybierz listę --</option>
														<?php foreach ($documentlists as $documentlist):?>
														<?php 
															echo "<option value=\"".$documentlist->id."\">".$documentlist->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz listę dokumentów do dodania.</span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz docelową wirtualną teczkę.</span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/add_item_vb" class="btn default" id="cancel">
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
												<label class="control-label">Wybór teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="bulkpackaging_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($bulkpackagings as $bulkpackaging):?>
														<?php 
															echo "<option value=\"".$bulkpackaging->id."\">".$bulkpackaging->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz teczki do dodania.</span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz docelową wirtualną teczkę.</span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												
												<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/add_item_vb" class="btn default" id="cancel">
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
											<form role="form" action="/virtualbriefcase/childvirtualbriefcase_add" method="POST" id="add_childvirtualbriefcase_form">
											<div class="alert alert-danger display-hide">
												<button class="close" data-close="alert"></button>
												<span>Popraw błędy w formularzu</span>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase2_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz wirtualną teczkę do dodania.</span>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Wybór wirtualnej teczki
													<span class="required" aria-required="true"> * </span>
												</label>
												<div class="input-icon right">
													<select class="form-control input-large" name="virtualbriefcase1_id">
														<option value="">-- Wybierz teczkę --</option>
														<?php foreach ($virtualbriefcases as $virtualbriefcase):?>
														<?php 
															echo "<option value=\"".$virtualbriefcase->id."\">".$virtualbriefcase->name."</option>";
														?>
														<?php endforeach;?>
													</select>
													<span class="help-block">Wybierz docelową wirtualną teczkę.</span>
												</div>
											</div>				
											<br/>
											<br/>
											<div class="margiv-top-10">
												<a href="/virtualbriefcase/virtualbriefcase_view/<?php echo $virtualbriefcase->id; ?>" class="btn green" id="submit">
												Zapisz zmiany</a>
												<a href="/virtualbriefcase/add_item_vb" class="btn default" id="cancel">
												Anuluj</a>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						</div>
							<!--end tab-pane-->
	
							