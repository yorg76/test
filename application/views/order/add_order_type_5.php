
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
											<option value="<?php echo $box->id;?>"><?php echo sprintf('%012d',$box->barcode);?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
										<label for="boxes_file" class="control-label col-md-3">Pobierz CSV z pudłami</label>
										<div class="col-md-4">
											<span class="input-group-btn">
												<a id="get_boxes_file" class="btn btn-success" href="/ajax/get_boxes_file" target="_new"><i class="fa fa-arrow-left fa-fw"/></i> Pobierz plik</a>
											</span>
										</div>
								</div>
								<div class="form-group">
										<label for="boxes_file" class="control-label col-md-3">Dodaj CSV z pudłami</label>
										<div class="col-md-4">
											<input type="file" id="boxes_file">
											<p class="help-block">
												 Plik dodany tutaj powinien zawierać w pierwszej kolumnie, numery kodów kreskowycg pudeł przeznaczonych do wypożyczenia.
											</p>
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
								
			