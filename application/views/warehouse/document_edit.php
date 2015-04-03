<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Edycja dokumentu</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form enctype="multipart/form-data" role="form" action="/warehouse/document_edit/<?php echo $document->id; ?>" method="POST" id="edit_document_form">
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
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="<?php echo $document->name; ?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description"><?php echo $document->description; ?>
						</textarea>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label for="control-label">Skan dokumentu</label>
						<input name="plik" type="file" id="upload">
						<span class="help-block">Załącz plik ze skanem dokumentu</span>
					</div>
									
					<div class="form-group">
						<label class="control-label">Wybór pudła
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="box_id">
								<option value="">-- Wybierz pudło dla dokumentu --</option>
								<?php foreach ($boxes as $box):?>
									<?php 
										//$id = $document->box->id;
										//if ($box->id == $id) $checked=" selected=\"true\"";
										if ($document->box->id == $box->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$box->id."\"".$checked." >".$box->id."</option>";
								
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label>Dodaj do:</label>
						<div class="radio-list">
							<label class="radio-inline" for="list">
							<input type="radio" name="radio" id="list" value="list" checked> Listy dokumentów </label>
							<label class="radio-inline" for="bulk">
							<input type="radio" name="radio" id="bulk" value="bulk"> Teczki </label>
						</div>
						<span class="help-block">Możesz dodać dokument do istniejącej listy lub teczki</span>
					</div>
					<div class="form-group">
						<label class="control-label">Wybór listy dokumentów
						</label>
						<div class="input-icon right">
							<select class="form-control" name="documentlist_id">
								<option value="">-- Nie przypisany --</option>
								<?php foreach ($documentlists as $documentlist):?>
									<?php 
										
										if ($document->documentlist->id == $documentlist->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$documentlist->id."\"".$checked." >".$documentlist->name."</option>";
								
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block">Wybierz listę dokumentów, do której chcesz dodać dokument</span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Wybór teczki
							</label>
						<div class="input-icon right">
							<select class="form-control" name="bulkpackaging_id">
								<option value="">-- Nie przypisany --</option>
								<?php foreach ($bulkpackagings as $bulkpackaging):?>
									<?php 
										
										if ($document->bulkpackaging->id == $bulkpackaging->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$bulkpackaging->id."\"".$checked." >".$bulkpackaging->name."</option>";
								
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block">Wybierz teczkę, do której chcesz dodać dokument</span>
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

