				<div class="row">
					<div class="col-md-12">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab_2_2">
									Wybierz pudło</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_5">
									Wybierz teczkę</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab_1_6">
									Wybierz wirtualną teczkę</a>
								</li>
							</ul>
							
						<div class="tab-content">
							<div id="tab_2_2" class="tab-pane active">
								<div class="portlet box blue">
									<div class="portlet-title">
									</div>
									<div class="portlet-body form">
										<form action="#" class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Numer pudła (kod kreskowy)</label>
													<div class="col-md-4">
														<div class="input-group">
													
															<input id="box_code" class="form-control" type="text" name="box_code" placeholder="Kod pudła"/>
															<span class="input-group-btn">
																<button id="add_box_to_chosen" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
															</span>
														
															<span class="help-block"></span>
														</div>
													</div>
												</div>
																											
												<div class="form-group">
													<label class="control-label col-md-3">Pudła</label>
													<div class="col-md-4">
														<select class="form-control" name="chosen_box" id="chosen_box">
															<option value=""> -- Wybierz -- </option>
															<?php foreach($boxes as $box):?>
															<option value="<?php echo $box->id;?>"><?php echo sprintf('%012d',$box->barcode);?></option>
															<?php endforeach;?>										
														
														</select>
													</div>
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-offset-3 col-md-9">
															<a href="javascript:;" class="btn green button-next" id="choose_box">
															Ustaw <i class="fa fa-check"></i>
															</a>
															<a href="javascript:;" class="btn red button-submit" id="clear_chosen_box">
															Wyczyść <i class="fa fa-ban"></i>
															</a>
														</div>
													</div>
												</div>
											</div>											
										</form>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_1_5" class="tab-pane">
								<div class="portlet box blue">
									<div class="portlet-title">
									</div>
									<div class="portlet-body form">
										<form action="#" class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Numer teczki</label>
													<div class="col-md-4">
														<div class="input-group">
													
															<input id="bulckpacking_id" class="form-control" type="text" name="bulckpacking_id" placeholder="Numer teczki"/>
															<span class="input-group-btn">
																<button id="add_bulkpacking_to_chosen" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
															</span>
														
															<span class="help-block"></span>
														</div>
													</div>
												</div>
																											
												<div class="form-group">
													<label class="control-label col-md-3">Teczki</label>
													<div class="col-md-4">
														<select class="form-control" name="chosen_bulckpacking" id="chosen_bulckpacking">
															<option value=""> -- Wybierz -- </option>
															<?php foreach($bulkpackagings as $bulkpackaging):?>
															<option value="<?php echo $bulkpackaging->id;?>"><?php echo sprintf('%012d',$bulkpackaging->id);?></option>
															<?php endforeach;?>	
														</select>
													</div>
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-offset-3 col-md-9">
															<a href="javascript:;" class="btn green button-next" id="choose_bulkpacking">
															Ustaw <i class="fa fa-check"></i>
															</a>
															<a href="javascript:;" class="btn red button-submit" id="clear_chosen_bulkpacking">
															Wyczyść <i class="fa fa-ban"></i>
															</a>
														</div>
													</div>
												</div>
											</div>											
										</form>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							<div id="tab_1_6" class="tab-pane">
								<div class="portlet box blue">
									<div class="portlet-title">
									</div>
									<div class="portlet-body form">
										<form action="#" class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Numer wirtualnej teczki</label>
													<div class="col-md-4">
														<div class="input-group">
													
															<input id="virtualbriefcase_id" class="form-control" type="text" name="virtualbriefcase_id" placeholder="Numer wirtualnej teczki"/>
															<span class="input-group-btn">
																<button id="add_virtualbriefcase_to_chosen" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"/></i> Dodaj</button>
															</span>
														
															<span class="help-block"></span>
														</div>
													</div>
												</div>
																											
												<div class="form-group">
													<label class="control-label col-md-3">Wirtualne teczki</label>
													<div class="col-md-4">
														<select class="form-control" name="chosen_virtualbriefcase" id="chosen_virtualbriefcase">
															<option value=""> -- Wybierz -- </option>
															<?php foreach($virtualbriefcases as $virtualbriefcase):?>
															<option value="<?php echo $virtualbriefcase->id;?>"><?php echo sprintf('%012d',$virtualbriefcase->id);?></option>
															<?php endforeach;?>	
														</select>
													</div>
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-offset-3 col-md-9">
															<a href="javascript:;" class="btn green button-next" id="choose_virtualbriefcase">
															Ustaw <i class="fa fa-check"></i>
															</a>
															<a href="javascript:;" class="btn red button-submit" id="clear_chosen_virtualbriefcase">
															Wyczyść <i class="fa fa-ban"></i>
															</a>
														</div>
													</div>
												</div>
											</div>											
										</form>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
							</div>
						</div>
					</div>
				</div>
							
							