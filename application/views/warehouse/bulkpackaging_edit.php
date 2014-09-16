<div class="row profile-account">	
	<div class="col-md-3">
		<ul class="ver-inline-menu tabbable margin-bottom-10">
			<li class="active">
				<a data-toggle="tab" href="#tab_1-1">
				<i class="fa fa-cog"></i>Edycja opakowania zbiorczego</a>
				<span class="after">
				</span>
			</li>

		</ul>
	</div>
	<div class="col-md-9">
		<form role="form" action="/warehouse/bulkpackaging_edit/<?php echo $bulkpackaging->id ?>" method="POST" id="add_bulkpackaging_form">
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
							<input type="text" placeholder="Nazwa" class="form-control" name="name" value="<?php echo $bulkpackaging->name;?>" />
							<span class="help-block"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Opis
							<span class="required" aria-required="true"> * </span>
						</label>
						<textarea class="form-control" name="description"><?php echo $bulkpackaging->description;?></textarea>
					<span class="help-block"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Wybór pozycji
							<span class="required" aria-required="true"> * </span>
						</label>
						<div class="input-icon right">
							<select class="form-control" name="box_id">
								<option>-- Wybierz pozycję dla opakowania --</option>
								<?php foreach ($boxes as $box):?>
									<?php 
										$id=$bulkpackaging->bulkpackaging->box->id;
										if ($box->id == $id) $checked=" selected=\"true\"";
											else $checked="";
										echo "<option value=\"".$box->id."\"".$checked." >".$box->id."</option>";
								
									?>
								<?php endforeach;?>
							</select>
						</div>
					</div>		
					<br/>
					<input type="hidden" value="<?php echo $box->id ?>" name="box_id" />
					<div class="margiv-top-10">
						<a href="/warehouse/bulkpackagings" class="btn green" id="submit">
						Zapisz zmiany</a>
						<a href="/warehouse/bulkpackagings" class="btn default" id="cancel">
						Anuluj</a>
					</div>
				</div>	
			</div>
		</form>
	</div>
	<!--end col-md-9-->
</div>