<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Nowy dokument</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form enctype="multipart/form-data" role="form" action="/warehouse/document_add" method="POST" id="add_document_form">
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
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description" placeholder="Opis dokumentu"></textarea>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="control-label">Skan dokumentu</label>
						<input name="plik" type="file" id="upload">
						<!-- TODO UPLOAD (CZY AN FILESYSTEM CZY DO BAZY?)  -->
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Wybór pudła
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							
							<select class="form-control" name="box_id">
								<option>-- Wybierz pudło dla dokumentu --</option>
								<?php foreach ($boxes as $box):?>
									<?php 
										if($box->id == $box_id) {
											$checked = "selected=\"true\""; 
										}else {
											$checked = "";
										}
										
										echo "<option value=\"".$box->id."\" ".$checked.">".$box->id."</option>";
									?>
								<?php endforeach;?>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
					
					<br/>

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
<!--end col-md-9-->
</div>
