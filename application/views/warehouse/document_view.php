﻿<div class="row profile-account">	
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
							<input readonly="true" type="text" placeholder="Nazwa" class="form-control" name="name" value="<?php echo $document->name; ?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea readonly="true" class="form-control" name="description"><?php echo $document->description; ?>
						</textarea>
						<span class="help-block"></span>
					</div>
					<div class="form-group">
						<?php if ($document->document->scan->file != NULL):?>
						<label for="control-label">Skan dokumentu</label>
						<a class="btn default" href="/<?php echo UPLOAD.DIRECTORY_SEPARATOR.$document->document->scan->file?>">Pokaż plik</a>
						<?php endif;?>
					</div>
					<div class="form-group">
						<label class="control-label">Pudło
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select readonly="true" class="form-control" name="box_id">
								<option value="">-- Wybierz pudło dla dokumentu --</option>
								<?php foreach ($boxes as $box):?>
									<?php 
										//$id = $document->box->id;
										//if ($box->id == $id) $checked=" selected=\"true\"";
										if ($document->box->id == $box->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$box->id."\"".$checked." >".sprintf('%012d',$box->barcode)."</option>";
								
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Listy dokumentów
						</label>
						<div class="input-icon right">
							<select readonly="true"  class="form-control" name="documentlist_id">
								<option value="">-- Nie przypisany --</option>
								<?php foreach ($documentlists as $documentlist):?>
									<?php 
										
										if ($document->documentlist->id == $documentlist->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$documentlist->id."\"".$checked." >".$documentlist->name."</option>";
								
								?>
								<?php endforeach;?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Teczki
							</label>
						<div class="input-icon right">
							<select readonly="true" class="form-control" name="bulkpackaging_id">
								<option value="">-- Nie przypisany --</option>
								<?php foreach ($bulkpackagings as $bulkpackaging):?>
									<?php 
										
										if ($document->bulkpackaging->id == $bulkpackaging->id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$bulkpackaging->id."\"".$checked." >".$bulkpackaging->name."</option>";
								
								?>
								<?php endforeach;?>
							</select>

						</div>
					</div>
					
					
					<br/>
					<div class="margiv-top-10">
						<a href="/warehouse/documents" class="btn default" id="cancel">
						Wróć</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
<!--end col-md-9-->
</div>
