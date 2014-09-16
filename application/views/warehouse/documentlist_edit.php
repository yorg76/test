<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Edycja listy dokumentów</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/documentlist_edit/<?php echo $documentlist->id ?>" method="POST" id="add_documentlist_form">
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
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="<?php echo $documentlist->name;?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description"><?php echo $documentlist->description;?></textarea>
					<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Wybór pozycji
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="box_id">
								<option>-- Wybierz pozycję dla listy dokumentów --</option>
								<?php foreach ($boxes as $box):?>
									<?php 
										$id = $documentlist->box->id; 
										if ($box->id == $id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$box->id."\"".$checked." >".$box->id."</option>";
								
									?>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label">Wybór opakowania zbiorczego
							</label>
						<div class="input-icon right">
							<select class="form-control" name="bulkpackaging_id">
								<option>-- Nie przypisany --</option>
								<?php foreach ($bulkpackagings as $bulkpackaging):?>
									<?php 
										$id = $documentlist->bulkpackaging->id;
										if ($bulkpackaging->id == $id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$bulkpackaging->id."\"".$checked." >".$bulkpackaging->name."</option>";
								
								?>
								<?php endforeach;?>
							</select>
							<span class="help-block">Wybierz opakowanie zbiorcze, do którgo chcesz dodać listę dokumentów</span>
						</div>
					</div>
					<br/>
					<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
					<div class="margiv-top-10">
						<a href="/warehouse/documentlists" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/warehouse/documentlists" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>