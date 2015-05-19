
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
												 Plik dodany tutaj powinien zawierać w pierwszej kolumnie, numery kodów kreskowycg pudeł przeznaczonych do zniszczenia.
											</p>
										</div>
								</div>
								