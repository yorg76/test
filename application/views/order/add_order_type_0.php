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
